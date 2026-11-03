<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $validOrders = Order::where('status', '!=', 'cancelled');

        $totalRevenue = (int) (clone $validOrders)->sum('total');
        $completedRevenue = (int) Order::where('status', 'completed')->sum('total');
        $todayRevenue = (int) (clone $validOrders)->whereDate('created_at', now()->toDateString())->sum('total');
        $monthRevenue = (int) (clone $validOrders)
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->sum('total');

        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $processingOrders = Order::where('status', 'processing')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();

        $totalBookings = Booking::count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $totalMenuItems = MenuItem::count();
        $availableMenuItems = MenuItem::where('is_available', true)->count();

        // Top selling menu items
        $topItems = OrderItem::query()
            ->select(
                'name',
                DB::raw('SUM(quantity) as total_qty'),
                DB::raw('SUM(price * quantity) as total_sales')
            )
            ->whereHas('order', fn ($q) => $q->where('status', '!=', 'cancelled'))
            ->groupBy('name')
            ->orderByDesc('total_qty')
            ->limit(8)
            ->get();

        // Breakdown by service type
        $serviceStats = Order::query()
            ->select('service_type', DB::raw('COUNT(*) as count'), DB::raw('SUM(total) as revenue'))
            ->where('status', '!=', 'cancelled')
            ->groupBy('service_type')
            ->get()
            ->keyBy('service_type');

        // Breakdown by payment method
        $paymentStats = Order::query()
            ->select('payment_method', DB::raw('COUNT(*) as count'), DB::raw('SUM(total) as revenue'))
            ->where('status', '!=', 'cancelled')
            ->groupBy('payment_method')
            ->get()
            ->keyBy('payment_method');

        // Daily revenue for the last 7 days
        $dailyStats = collect();
        for ($i = 6; $i >= 0; $i--) {
            $day = now()->subDays($i);
            $dateStr = $day->toDateString();
            $dayOrders = Order::whereDate('created_at', $dateStr)->where('status', '!=', 'cancelled');

            $dailyStats->push([
                'date' => $dateStr,
                'label' => $day->translatedFormat('d M'),
                'orders' => (clone $dayOrders)->count(),
                'revenue' => (int) (clone $dayOrders)->sum('total'),
            ]);
        }

        return view('admin.reports.index', compact(
            'totalRevenue',
            'completedRevenue',
            'todayRevenue',
            'monthRevenue',
            'totalOrders',
            'pendingOrders',
            'processingOrders',
            'completedOrders',
            'cancelledOrders',
            'totalBookings',
            'confirmedBookings',
            'totalMenuItems',
            'availableMenuItems',
            'topItems',
            'serviceStats',
            'paymentStats',
            'dailyStats'
        ));
    }
}
