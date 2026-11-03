<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login_page_renders_successfully(): void
    {
        $response = $this->get('/admin/login');
        $response->assertOk();
        $response->assertSee('Login Admin');
    }

    public function test_admin_pages_render_for_authenticated_admin(): void
    {
        $session = ['admin_authenticated' => true];

        $routes = [
            '/admin/orders' => 'Pesanan',
            '/admin/menu' => 'Kelola Menu',
            '/admin/menu/availability' => 'Atur Ketersediaan',
            '/admin/categories' => 'Kategori Menu',
            '/admin/bookings' => 'Booking Meja',
            '/admin/reports' => 'Laporan',
        ];

        foreach ($routes as $route => $expectedText) {
            $response = $this->withSession($session)->get($route);
            $response->assertOk();
            $response->assertSee($expectedText);
        }
    }

    public function test_admin_can_update_order_and_booking_status(): void
    {
        $session = ['admin_authenticated' => true];

        $order = Order::create([
            'customer_name' => 'Pelanggan Uji',
            'customer_phone' => '08123456789',
            'service_type' => 'dine_in',
            'payment_method' => 'cash',
            'total' => 30000,
            'status' => 'pending',
            'reference_code' => 'INV-UJI001',
        ]);

        $this->withSession($session)
            ->put("/admin/orders/{$order->id}/status", ['status' => 'completed'])
            ->assertRedirect();

        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'status' => 'completed',
        ]);

        $booking = Booking::create([
            'name' => 'Tamu Reservasi',
            'phone' => '08123456789',
            'date' => now()->addDay()->toDateString(),
            'time' => '19:00',
            'guests' => 4,
            'status' => 'pending',
        ]);

        $this->withSession($session)
            ->put("/admin/bookings/{$booking->id}/status", ['status' => 'confirmed'])
            ->assertRedirect();

        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'status' => 'confirmed',
        ]);
    }

    public function test_booking_validates_hourly_seat_capacity(): void
    {
        $date = now()->addDay()->toDateString();

        Booking::create([
            'name' => 'Rombongan Pertama',
            'phone' => '08123456789',
            'date' => $date,
            'time' => '18:00',
            'guests' => 35,
            'status' => 'confirmed',
        ]);

        $response = $this->postJson('/booking', [
            'name' => 'Rombongan Kedua',
            'phone' => '08129876543',
            'date' => $date,
            'time' => '18:00',
            'guests' => 10,
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'remaining_seats' => 5,
        ]);
    }
}
