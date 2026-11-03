<?php

namespace Tests\Feature;

use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_order_and_items()
    {
        $item = MenuItem::create([
            'name' => 'Nasi Campur Jawa',
            'description' => 'Nasi campur dengan lauk lengkap khas Jawa.',
            'price' => 25000,
            'is_available' => true,
        ]);

        $payload = [
            'items' => [
                ['id' => (string) $item->id, 'name' => $item->name, 'price' => 25000, 'quantity' => 2],
            ],
            'total' => 25000 * 2,
            'customer_name' => 'Budi Santoso',
            'customer_phone' => '08123456789',
            'service_type' => 'takeaway',
        ];

        $response = $this->postJson('/checkout', $payload);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $this->assertDatabaseCount('orders', 1);
        $this->assertDatabaseCount('order_items', 1);

        $this->assertDatabaseHas('orders', [
            'customer_name' => 'Budi Santoso',
            'customer_phone' => '08123456789',
            'service_type' => 'takeaway',
            'payment_method' => 'cash',
            'total' => 50000,
        ]);
    }

    public function test_store_recalculates_price_from_database_preventing_tampering()
    {
        $item = MenuItem::create([
            'name' => 'Ayam Bakar Madu',
            'description' => 'Ayam bakar bumbu madu khas.',
            'price' => 30000,
            'is_available' => true,
        ]);

        // Client attempts to tamper price to Rp 100
        $payload = [
            'items' => [
                ['id' => (string) $item->id, 'name' => $item->name, 'price' => 100, 'quantity' => 2],
            ],
            'total' => 200,
            'customer_name' => 'Siti Aminah',
            'customer_phone' => '081299998888',
            'service_type' => 'dine_in',
            'payment_method' => 'qris',
        ];

        $response = $this->postJson('/checkout', $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'order' => [
                'total' => 60000,
                'payment_method' => 'qris',
            ],
        ]);

        $this->assertDatabaseHas('orders', [
            'customer_name' => 'Siti Aminah',
            'total' => 60000,
            'payment_method' => 'qris',
        ]);

        $this->assertDatabaseHas('order_items', [
            'product_id' => (string) $item->id,
            'price' => 30000,
            'quantity' => 2,
        ]);
    }

    public function test_order_tracking_page_finds_order_by_reference_code()
    {
        $order = Order::create([
            'customer_name' => 'Andi Pratama',
            'customer_phone' => '081377776666',
            'service_type' => 'delivery',
            'payment_method' => 'transfer',
            'total' => 45000,
            'status' => 'processing',
            'reference_code' => 'INV-TEST1234',
        ]);

        $response = $this->get('/order/track?ref=INV-TEST1234');

        $response->assertOk();
        $response->assertSee('INV-TEST1234');
        $response->assertSee('Andi Pratama');
        $response->assertSee('Sedang Dimasak');
    }

    public function test_store_requires_customer_name_and_service_type()
    {
        $item = MenuItem::create([
            'name' => 'Soto Ayam',
            'description' => 'Soto ayam hangat dengan kuah gurih.',
            'price' => 18000,
            'is_available' => true,
        ]);

        $payload = [
            'items' => [
                ['id' => (string) $item->id, 'name' => $item->name, 'price' => 18000, 'quantity' => 1],
            ],
            'total' => 18000,
        ];

        $response = $this->postJson('/checkout', $payload);

        $response->assertStatus(422);
        $this->assertDatabaseCount('orders', 0);
    }
}
