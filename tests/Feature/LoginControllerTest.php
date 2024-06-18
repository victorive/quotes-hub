<?php


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetLoginFormReturnsView(): void
    {
        $response = $this->get(route('login'));
        $response->assertViewIs('auth.login');
    }

    public function testLoginWithValidCredentialsRedirectsToQuotes(): void
    {
        $user = User::factory()->create();
        $response = $this->post(route('auth.login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $response->assertRedirect(route('quotes'));
    }

    public function testLoginWithInvalidCredentialsReturnsError(): void
    {
        $user = User::factory()->create();
        $response = $this->post(route('auth.login'), [
            'email' => $user->email,
            'password' => 'incorrect'
        ]);
        $response->assertRedirect(route('login'));
        $response->assertSessionHas('error');
    }
}
