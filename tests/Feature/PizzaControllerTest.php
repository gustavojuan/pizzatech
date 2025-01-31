<?php

namespace Tests\Feature;

use App\Models\Ingredient;
use App\Models\Pizza;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\AuthenticatedUsers;
use Tests\Traits\AuthenticatesUser;

class PizzaControllerTest extends TestCase
{

    use AuthenticatedUsers;
    /**
     * A basic feature test example.
     */
    public function test_authenticated_user_can_access_pizza_index_page()
    {
        $this->authenticateUser();  
        $ingredient1 = Ingredient::create(['name' => 'Tomato', 'price' => 1.50]);
        $ingredient2 = Ingredient::create(['name' => 'Cheese', 'price' => 2.00]);


        $pizza1 = Pizza::create(['name' => 'Margherita']);
        $pizza1->ingredients()->attach([$ingredient1->id, $ingredient2->id]);

         $response = $this->get(route('pizzas.index'));

         $response->assertStatus(200);
         $response->assertViewHas('pizzas');
         $response->assertViewHas('pizzas', function ($viewPizzas) use ($pizza1) {
            return $viewPizzas->contains($pizza1); 
        });
    }


    public function test_it_returns_create_form_with_all_ingredients(){
        $this->authenticateUser();  
        $ingredient1 = Ingredient::create(['name' => 'Tomato', 'price' => 1.50]);
        $ingredient2 = Ingredient::create(['name' => 'Cheese', 'price' => 2.00]);

        $response = $this->get(route('pizzas.create'));
        $response->assertStatus(200);
        $response->assertViewIs('pizzas.create');
        $response->assertViewHas('ingredients');  // Los ingredientes deben estar presentes en la vista


    }

    



}
