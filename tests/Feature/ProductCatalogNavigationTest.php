<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCatalogNavigationTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_catalog_links_directly_to_cashier(): void
    {
        $this->get('/products')
            ->assertOk()
            ->assertSeeText('Buka kasir')
            ->assertSeeText('Ke kasir')
            ->assertSee(route('kasir'), false);
    }
}
