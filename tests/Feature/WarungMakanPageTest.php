<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WarungMakanPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_warung_makan_page_renders_successfully(): void
    {
        $response = $this->get('/warung-makan-mba-neni');

        $response->assertOk();
        $response->assertSee('Warung Makan Mba Neni', false);
        $response->assertSee('Authentic Javanese Flavors, Served 24 Hours', false);
        $response->assertSee('Our Signature Menu', false);
    }
}
