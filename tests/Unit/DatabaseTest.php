<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Pizza;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{   use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_it_can_insert_a_pizza_into_database(): void
    {
        $pizza = Pizza::create([
            'name' => 'Margarita',
            'image_url' => 'margarita.jpg',
        ]);

        // Verificar si la pizza fue insertada correctamente
        $this->assertDatabaseHas('pizzas', [
            'name' => 'Margarita',
            'image_url' => 'margarita.jpg',
        ]);
    }
}
