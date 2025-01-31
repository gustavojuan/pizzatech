<?php

namespace Tests\Feature;

use App\Models\Ingredient;
use Tests\TestCase;
use App\Models\Pizza;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PizzaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_it_calculates_the_correct_price_for_a_pizza()
    {
       
        $ingredient1 = Ingredient::create(['name' => 'Tomato', 'price' => 1.50]);
        $ingredient2 = Ingredient::create(['name' => 'Cheese', 'price' => 2.00]);        
        $pizza = Pizza::create([
            'name' => 'Margherita',
        ]);
        $pizza->ingredients()->attach([$ingredient1->id, $ingredient2->id]);

   
        $calculatedPrice = $pizza->calculatedPrice; 
        
        $expectedPrice = (1.50 + 2.00) + ((1.50 + 2.00) * 0.5); // 50% de markup
        $this->assertEquals($expectedPrice, $calculatedPrice, "El precio calculado de la pizza no es correcto.");
    }
    

   
}
