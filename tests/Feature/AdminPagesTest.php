<?php

namespace Tests\Feature;

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
        ];

        foreach ($routes as $route => $expectedText) {
            $response = $this->withSession($session)->get($route);
            $response->assertOk();
            $response->assertSee($expectedText);
        }
    }
}