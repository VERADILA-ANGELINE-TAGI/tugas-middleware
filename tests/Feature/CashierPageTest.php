<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CashierPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_cashier_page_requires_authentication(): void
    {
        $this->get('/kasir')
            ->assertRedirect(route('login'));
    }

    public function test_cashier_and_admin_can_open_the_cashier_page(): void
    {
        foreach (['kasir', 'admin'] as $role) {
            $user = User::factory()->create();
            $user->role = $role;
            $user->save();

            $this->actingAs($user)
                ->get('/kasir')
                ->assertOk()
                ->assertHeader('Content-Type', 'text/html; charset=UTF-8');
        }
    }

    public function test_cashier_page_uses_the_products_from_the_catalog_database(): void
    {
        $admin = User::factory()->create();
        $admin->role = 'admin';
        $admin->save();

        Product::factory()->create([
            'name' => 'Produk katalog yang sama',
            'price' => 12750,
            'stock' => 23,
        ]);

        $cashierResponse = $this->actingAs($admin)
            ->get('/kasir');

        $cashierResponse
            ->assertOk()
            ->assertSee('Produk katalog yang sama', false)
            ->assertSee('"price":12750', false)
            ->assertSee('"stock":23', false)
            ->assertDontSee('Indomie Goreng', false)
            ->assertDontSee('__CASHIER_PRODUCTS_JSON__', false);

        $this->get('/products')
            ->assertOk()
            ->assertSeeText('Produk katalog yang sama');
    }

    public function test_other_roles_cannot_open_the_cashier_page(): void
    {
        $user = User::factory()->create();
        $user->role = 'user';
        $user->save();

        $this->actingAs($user)
            ->get('/kasir')
            ->assertForbidden();
    }

    public function test_cashier_page_is_not_exposed_as_a_public_file(): void
    {
        $this->get('/kasir.html')
            ->assertNotFound();
    }
}
