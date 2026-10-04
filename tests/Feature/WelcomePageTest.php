<?php

namespace Tests\Feature;

use Tests\TestCase;

class WelcomePageTest extends TestCase
{
    public function test_homepage_shows_product_catalog_navigation(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSeeText('Belanja lebih mudah')
            ->assertSeeText('Jelajahi produk')
            ->assertSee(route('products.index'), false);
    }
}
