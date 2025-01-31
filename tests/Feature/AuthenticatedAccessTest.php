<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticatedAccessTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_authenticated_user_can_access_protected_routes(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('pizzas.create'));
        $response->assertStatus(200);


    }

    public function test_non_authenticated_user_cannot_access_protected_routes(){
        $response= $this->get(route('pizzas.create'));
        $response->assertRedirect(route('login'));


    }
}
