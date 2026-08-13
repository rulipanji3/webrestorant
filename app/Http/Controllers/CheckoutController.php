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

        $orders = Order::with('items')
            ->when($q, function ($query) use ($q) {
                $query->where('customer_name', 'like', '%'.$q.'%')
                    ->orWhere('reference_code', 'like', '%'.$q.'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20)
            ->withQueryString();

        return view('admin.orders.index', compact('orders', 'q'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'items' => 'required|array|min:1|max:100',
            'items.*.id' => 'nullable|string',
            'items.*.name' => 'required|string|max:255',
            'items.*.price' => 'required|integer|min:0',
            'items.*.quantity' => 'required|integer|min:1|max:999',
            'total' => 'required|integer|min:0',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'nullable|string|max:30',
            'service_type' => 'required|in:dine_in,takeaway,delivery',
        ]);

        try {
            $availableIds = MenuItem::where('is_available', true)->pluck('id')->map(fn ($id) => (string) $id);
            $unavailable = [];

            foreach ($data['items'] as $it) {
                if (isset($it['id']) && $it['id'] !== '' && ! $availableIds->contains($it['id'])) {
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

            $refCode = 'INV-'.now()->format('ymd').'-'.strtoupper(Str::random(6));

            $order = Order::create([
                'total' => $data['total'],
                'status' => 'pending',
                'reference_code' => $refCode,
                'customer_name' => $data['customer_name'],
                'customer_phone' => $data['customer_phone'] ?? null,
                'service_type' => $data['service_type'],
            ]);

            foreach ($data['items'] as $it) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $it['id'] ?? null,
                    'name' => $it['name'],
                    'price' => $it['price'],
                    'quantity' => $it['quantity'],
                ]);
            }

            // attempt to send notification email to configured address (mail.from.address)
            try {
                $notifyTo = config('mail.from.address') ?: env('ORDER_NOTIFICATION_EMAIL', null);
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
