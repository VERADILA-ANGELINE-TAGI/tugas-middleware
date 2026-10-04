<?php

namespace Tests\Feature\Http\Middleware;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class EnsureUserHasRoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_with_required_role_can_access_route(): void
    {
        Route::get('/test/role', fn () => 'Role granted')->middleware(['auth', 'role:kasir']);

        $user = User::factory()->create();
        $user->role = 'kasir';
        $user->save();

        $this->actingAs($user)
            ->get('/test/role')
            ->assertOk()
            ->assertSeeText('Role granted');
    }

    public function test_user_without_required_role_is_forbidden(): void
    {
        Route::get('/test/role', fn () => 'Role granted')->middleware(['auth', 'role:kasir']);

        $user = User::factory()->create();
        $user->role = 'user';
        $user->save();

        $this->actingAs($user)
            ->get('/test/role')
            ->assertForbidden();
    }

    public function test_unauthenticated_user_is_redirected_to_login(): void
    {
        Route::get('/test/role', fn () => 'Role granted')->middleware(['auth', 'role:kasir']);

        $this->get('/test/role')
            ->assertRedirect(route('login'));
    }

    public function test_kasir_middleware_allows_kasir_role_only(): void
    {
        Route::get('/test/kasir', fn () => 'Kasir granted')->middleware(['auth', 'kasir']);

        $cashier = User::factory()->create();
        $cashier->role = 'kasir';
        $cashier->save();

        $this->actingAs($cashier)
            ->get('/test/kasir')
            ->assertOk()
            ->assertSeeText('Kasir granted');

        $user = User::factory()->create();
        $user->role = 'user';
        $user->save();

        $this->actingAs($user)
            ->get('/test/kasir')
            ->assertForbidden();
    }

    public function test_admin_middleware_allows_admin_role_only(): void
    {
        Route::get('/test/admin', fn () => 'Admin granted')->middleware(['auth', 'admin']);

        $admin = User::factory()->create();
        $admin->role = 'admin';
        $admin->save();

        $this->actingAs($admin)
            ->get('/test/admin')
            ->assertOk()
            ->assertSeeText('Admin granted');

        $cashier = User::factory()->create();
        $cashier->role = 'kasir';
        $cashier->save();

        $this->actingAs($cashier)
            ->get('/test/admin')
            ->assertForbidden();
    }
}
