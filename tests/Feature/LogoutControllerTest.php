<?php


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogoutControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testLogoutRedirectsToLogin(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('auth.logout'));
        $response->assertRedirect(route('login'));
    }

    public function testLogoutLogsOutUser(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)->post(route('auth.logout'));
        $this->assertGuest();
    }
}
