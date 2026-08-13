<?php

namespace Tests\Feature;

use App\Models\MenuItem;
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
        ]);
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
