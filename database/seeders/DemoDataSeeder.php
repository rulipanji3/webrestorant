<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        Order::query()->delete();
        Booking::query()->delete();

        $o1 = Order::create([
            'reference_code' => 'WBN-20261006-01',
            'customer_name' => 'Dimas Pratama',
            'customer_phone' => '081234567890',
            'service_type' => 'dine-in',
            'status' => 'completed',
            'total' => 42000,
        ]);
        $o1->items()->create(['name' => 'Soto Sutri', 'quantity' => 2, 'price' => 15000, 'product_id' => '1']);
        $o1->items()->create(['name' => 'Es Teh Manis', 'quantity' => 3, 'price' => 4000, 'product_id' => '6']);

        $o2 = Order::create([
            'reference_code' => 'WBN-20261006-02',
            'customer_name' => 'Siti Nurhaliza',
            'customer_phone' => '085712349999',
            'service_type' => 'delivery',
            'status' => 'pending',
            'total' => 68000,
        ]);
        $o2->items()->create(['name' => 'Ayam Bakar', 'quantity' => 2, 'price' => 20000, 'product_id' => '4']);
        $o2->items()->create(['name' => 'Es Teler', 'quantity' => 2, 'price' => 12000, 'product_id' => '10']);
        $o2->items()->create(['name' => 'Es Jeruk', 'quantity' => 1, 'price' => 4000, 'product_id' => '8']);

        Booking::create([
            'name' => 'Budi Santoso',
            'phone' => '081987654321',
            'date' => now()->addDay()->toDateString(),
            'time' => '19:00',
            'guests' => 4,
            'table_type' => 'indoor',
            'notes' => 'Ulang tahun keluarga, mohon meja dekat jendela',
            'status' => 'confirmed',
        ]);

        Booking::create([
            'name' => 'Anisa Rahmawati',
            'phone' => '082133445566',
            'date' => now()->addDays(2)->toDateString(),
            'time' => '13:00',
            'guests' => 2,
            'table_type' => 'outdoor',
            'notes' => 'Acara santai makan siang',
            'status' => 'pending',
        ]);
    }
}
