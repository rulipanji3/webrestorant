<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $statusFilter = $request->query('status');

        $orders = Order::with('items')
            ->when($q, function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('customer_name', 'like', '%'.$q.'%')
                        ->orWhere('reference_code', 'like', '%'.$q.'%')
                        ->orWhere('customer_phone', 'like', '%'.$q.'%');
                });
            })
            ->when($statusFilter && in_array($statusFilter, ['pending', 'processing', 'completed', 'cancelled']), function ($query) use ($statusFilter) {
                $query->where('status', $statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20)
            ->withQueryString();

        $statusCounts = [
            'all' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'processing' => Order::where('status', 'processing')->count(),
            'completed' => Order::where('status', 'completed')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
        ];

        return view('admin.orders.index', compact('orders', 'q', 'statusFilter', 'statusCounts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'items' => 'required|array|min:1|max:100',
            'items.*.id' => 'nullable|string',
            'items.*.name' => 'required|string|max:255',
            'items.*.price' => 'required|integer|min:0',
            'items.*.quantity' => 'required|integer|min:1|max:999',
            'total' => 'nullable|integer|min:0',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'nullable|string|max:30',
            'service_type' => 'required|in:dine_in,takeaway,delivery',
            'payment_method' => 'nullable|in:cash,qris,transfer',
        ]);

        try {
            $availableIds = MenuItem::where('is_available', true)->pluck('id')->map(fn ($id) => (string) $id);
            $unavailable = [];

            foreach ($data['items'] as $it) {
                if (isset($it['id']) && $it['id'] !== '' && ! $availableIds->contains((string) $it['id'])) {
                    $unavailable[] = $it['name'];
                }
            }

            if (! empty($unavailable)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Item berikut tidak tersedia: '.implode(', ', $unavailable),
                    'unavailable_items' => $unavailable,
                ], 409);
            }

            // Fetch authoritative prices from database to prevent client-side price tampering
            $requestedIds = collect($data['items'])
                ->pluck('id')
                ->filter(fn ($id) => $id !== null && $id !== '')
                ->values();

            $dbMenuItems = MenuItem::whereIn('id', $requestedIds)->get()->keyBy(fn ($item) => (string) $item->id);

            $normalizedItems = [];
            $calculatedTotal = 0;

            foreach ($data['items'] as $it) {
                $itemId = isset($it['id']) && $it['id'] !== '' ? (string) $it['id'] : null;
                $dbItem = $itemId ? $dbMenuItems->get($itemId) : null;

                $unitPrice = $dbItem ? (int) $dbItem->price : (int) $it['price'];
                $itemName = $dbItem ? $dbItem->name : $it['name'];
                $quantity = (int) $it['quantity'];

                $calculatedTotal += $unitPrice * $quantity;

                $normalizedItems[] = [
                    'product_id' => $itemId,
                    'name' => $itemName,
                    'price' => $unitPrice,
                    'quantity' => $quantity,
                ];
            }

            $refCode = 'INV-'.now()->format('ymd').'-'.strtoupper(Str::random(6));
            $paymentMethod = $data['payment_method'] ?? 'cash';

            $order = DB::transaction(function () use ($data, $calculatedTotal, $refCode, $paymentMethod, $normalizedItems) {
                $newOrder = Order::create([
                    'total' => $calculatedTotal,
                    'status' => 'pending',
                    'reference_code' => $refCode,
                    'customer_name' => $data['customer_name'],
                    'customer_phone' => $data['customer_phone'] ?? null,
                    'service_type' => $data['service_type'],
                    'payment_method' => $paymentMethod,
                ]);

                foreach ($normalizedItems as $itemData) {
                    OrderItem::create([
                        'order_id' => $newOrder->id,
                        'product_id' => $itemData['product_id'],
                        'name' => $itemData['name'],
                        'price' => $itemData['price'],
                        'quantity' => $itemData['quantity'],
                    ]);
                }

                return $newOrder;
            });

            // Attempt to send notification email to configured address
            try {
                $notifyTo = config('mail.from.address') ?: config('services.order_notification_email');
                if ($notifyTo) {
                    Mail::to($notifyTo)->send(new OrderPlaced($order));
                }
            } catch (\Throwable $e) {
                Log::error('Order email failed: '.$e->getMessage());
            }

            $order->load('items');

            $barcodeUrl = 'https://barcode.tec-it.com/barcode.ashx?data='.urlencode($refCode).'&code=Code128&translate-esc=true&dpi=96&imagetype=png';

            return response()->json([
                'success' => true,
                'order_id' => $order->id,
                'reference_code' => $refCode,
                'barcode_url' => $barcodeUrl,
                'order' => $order,
            ]);
        } catch (\Throwable $e) {
            Log::error('Checkout error: '.$e->getMessage());

            return response()->json(['success' => false, 'message' => 'Gagal membuat pesanan'], 500);
        }
    }

    public function updateStatus(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order->update([
            'status' => $data['status'],
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'status' => $order->status,
                'status_label' => Order::statusLabel($order->status),
                'message' => 'Status pesanan #'.$order->id.' diperbarui menjadi '.Order::statusLabel($order->status).'.',
            ]);
        }

        return redirect()->route('admin.orders.index')->with(
            'success',
            'Status pesanan #'.$order->id.' diperbarui menjadi '.Order::statusLabel($order->status).'.'
        );
    }

    public function poll()
    {
        return response()->json([
            'total_count' => Order::count(),
            'pending_count' => Order::where('status', 'pending')->count(),
            'latest_id' => (int) (Order::max('id') ?? 0),
        ]);
    }

    public function track(Request $request)
    {
        $ref = trim((string) $request->query('ref', ''));
        $phone = trim((string) $request->query('phone', ''));
        $order = null;
        $ordersByPhone = collect();

        if ($ref !== '') {
            $cleanId = ltrim($ref, '#');
            $order = Order::with('items')
                ->where('reference_code', $ref)
                ->when(is_numeric($cleanId), fn ($q) => $q->orWhere('id', (int) $cleanId))
                ->first();
        }

        if ($phone !== '') {
            $ordersByPhone = Order::with('items')
                ->where('customer_phone', 'like', '%'.$phone.'%')
                ->orderByDesc('created_at')
                ->limit(10)
                ->get();

            if (! $order && $ordersByPhone->isNotEmpty()) {
                $order = $ordersByPhone->first();
            }
        }

        return view('order-track', compact('order', 'ordersByPhone', 'ref', 'phone'));
    }

    public function destroyAll()
    {
        Order::query()->delete();

        if (DB::getDriverName() === 'sqlite') {
            DB::statement('DELETE FROM sqlite_sequence WHERE name = ?', ['orders']);
        } else {
            DB::statement('ALTER TABLE orders AUTO_INCREMENT = 1');
        }

        return redirect()->route('admin.orders.index')->with('success', 'Semua pesanan berhasil dihapus.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
