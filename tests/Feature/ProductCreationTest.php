<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_open_product_creation_form(): void
    {
        $admin = User::factory()->create();
        $admin->role = 'admin';
        $admin->save();

        $this->actingAs($admin)
            ->get(route('products.create'))
            ->assertOk()
            ->assertSeeText('Tambah produk baru')
            ->assertSee(route('products.store'), false);
    }

    public function test_admin_can_create_a_product_and_see_it_in_catalog(): void
    {
        $admin = User::factory()->create();
        $admin->role = 'admin';
        $admin->save();

        $response = $this->actingAs($admin)
            ->post(route('products.store'), [
                'nama' => 'Beras Premium 5 kg',
                'harga' => 75000,
                'stok' => 12,
                'deskripsi' => 'Beras pilihan untuk keluarga.',
            ]);

        $response->assertRedirect(route('products.index'))
            ->assertSessionHas('status', 'Produk baru berhasil ditambahkan.');

        $this->assertDatabaseHas('products', [
            'name' => 'Beras Premium 5 kg',
            'price' => 75000,
            'stock' => 12,
            'description' => 'Beras pilihan untuk keluarga.',
        ]);

        $this->actingAs($admin)
            ->get(route('products.index'))
            ->assertOk()
            ->assertSeeText('Beras Premium 5 kg')
            ->assertSeeText('Tambah produk');
    }

    public function test_admin_can_upload_a_product_image_and_see_it_in_catalog(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create();
        $admin->role = 'admin';
        $admin->save();

        $response = $this->actingAs($admin)
            ->post(route('products.store'), [
                'nama' => 'Produk dengan gambar',
                'harga' => 4200,
                'stok' => 7,
                'gambar' => UploadedFile::fake()->image('produk.png'),
            ]);

        $response->assertRedirect(route('products.index'));

        $imagePath = \Illuminate\Support\Facades\DB::table('products')
            ->where('name', 'Produk dengan gambar')
            ->value('image');

        $this->assertIsString($imagePath);
        Storage::disk('public')->assertExists($imagePath);

        $this->actingAs($admin)
            ->get(route('products.index'))
            ->assertOk()
            ->assertSee(Storage::disk('public')->url($imagePath), false);
    }

    public function test_product_creation_rejects_non_image_uploads(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create();
        $admin->role = 'admin';
        $admin->save();

        $this->actingAs($admin)
            ->from(route('products.create'))
            ->post(route('products.store'), [
                'nama' => 'Produk file tidak valid',
                'harga' => 1000,
                'stok' => 2,
                'gambar' => UploadedFile::fake()->create('dokumen.txt', 10, 'text/plain'),
            ])
            ->assertRedirect(route('products.create'))
            ->assertSessionHasErrors('gambar');

        $this->assertDatabaseMissing('products', ['name' => 'Produk file tidak valid']);
    }

    public function test_product_creation_requires_admin_role(): void
    {
        $user = User::factory()->create();
        $user->role = 'kasir';
        $user->save();

        $this->actingAs($user)
            ->get(route('products.create'))
            ->assertForbidden();

        $this->actingAs($user)
            ->post(route('products.store'), [
                'nama' => 'Produk tidak diizinkan',
                'harga' => 1000,
                'stok' => 1,
            ])
            ->assertForbidden();

        $this->assertDatabaseMissing('products', ['name' => 'Produk tidak diizinkan']);
    }

    public function test_product_creation_redirects_guests_to_login(): void
    {
        $this->get(route('products.create'))
            ->assertRedirect(route('login'));

        $this->post(route('products.store'), [
            'nama' => 'Produk tamu',
            'harga' => 1000,
            'stok' => 1,
        ])->assertRedirect(route('login'));
    }

    public function test_product_creation_validates_required_and_nonnegative_fields(): void
    {
        $admin = User::factory()->create();
        $admin->role = 'admin';
        $admin->save();

        $this->actingAs($admin)
            ->from(route('products.create'))
            ->post(route('products.store'), [
                'nama' => '',
                'harga' => -1,
                'stok' => -1,
            ])
            ->assertRedirect(route('products.create'))
            ->assertSessionHasErrors(['nama', 'harga', 'stok']);

        $this->assertDatabaseCount('products', 0);
    }
}
