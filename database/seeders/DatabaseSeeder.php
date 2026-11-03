<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@mbaneni.com'],
            [
                'name' => 'admin',
                'password' => Hash::make(config('services.admin.pass', 'secret')),
            ]
        );

        $this->call([
            MenuItemSeeder::class,
        ]);
    }
}
