<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_admin_login(): void
    {
        $this->get('/admin')
            ->assertRedirect(route('admin.login'));
    }

    public function test_non_admin_user_cannot_access_backend(): void
    {
        $user = User::factory()->create([
            'role' => 'editor',
            'status' => 'active',
        ]);

        $this->actingAs($user)
            ->get('/admin')
            ->assertRedirect(route('admin.login'));

        $this->assertGuest();
    }

    public function test_active_administrator_can_access_backend(): void
    {
        $admin = User::factory()->create([
            'role' => 'administrator',
            'status' => 'active',
        ]);

        $this->actingAs($admin)
            ->get('/admin')
            ->assertOk();
    }

    public function test_active_administrator_can_open_user_edit_page(): void
    {
        $admin = User::factory()->create([
            'role' => 'administrator',
            'status' => 'active',
        ]);

        $user = User::factory()->create([
            'role' => 'editor',
            'status' => 'active',
        ]);

        $this->actingAs($admin)
            ->get(route('admin.users.edit', $user->getKey()))
            ->assertOk()
            ->assertSee($user->email);
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        User::factory()->create([
            'email' => 'admin@example.com',
            'password' => 'password',
            'role' => 'administrator',
            'status' => 'active',
        ]);

        $this->post(route('admin.login.store'), [
            'email' => 'admin@example.com',
            'password' => 'password',
        ])->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticated();
    }

    public function test_editor_login_is_rejected(): void
    {
        User::factory()->create([
            'email' => 'editor@example.com',
            'password' => 'password',
            'role' => 'editor',
            'status' => 'active',
        ]);

        $this->post(route('admin.login.store'), [
            'email' => 'editor@example.com',
            'password' => 'password',
        ])->assertRedirect(route('admin.login'));

        $this->assertGuest();
    }
}
