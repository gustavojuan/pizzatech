<?php

namespace Tests\Feature;

use App\Models\Ingredient;
use App\Models\Pizza;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
        $ingredients = $this->createIngredients();       


        $pizza1 = Pizza::create(['name' => 'Margherita']);
        $pizza1->ingredients()->attach([$ingredients[0]->id, $ingredients[1]->id]);

         $response = $this->get(route('pizzas.index'));

         $response->assertStatus(200);
         $response->assertViewHas('pizzas');
         $response->assertViewHas('pizzas', function ($viewPizzas) use ($pizza1) {
            return $viewPizzas->contains($pizza1); 
        });
    }


    public function test_it_returns_create_form_with_all_ingredients(){
        $this->authenticateUser();  
        $this->createIngredients();

        $response = $this->get(route('pizzas.create'));
        $response->assertStatus(200);
        $response->assertViewIs('pizzas.create');
        $response->assertViewHas('ingredients');  // Los ingredientes deben estar presentes en la vista


    }

    public function test_it_stores_new_pizza()
    {
        $user = $this->authenticateUser();
        $ingredients = $this->createIngredients();
        Storage::fake('public'); 
        $image = UploadedFile::fake()->image('pizza.jpg');

        $data = [
            'name' => 'Pepperoni Pizza',
            'ingredients' => [$ingredients[0]->id, $ingredients[1]->id],  // Seleccionamos los ingredientes
            'image' => $image,  // Subimos la imagen
        ];
        $response = $this->post(route('pizzas.store'), $data);

        $this->assertDatabaseHas('pizzas', [
            'name' => 'Pepperoni Pizza',
        ]);

        $response->assertRedirect(route('pizzas.index'));

    }


    public function test_it_updates_pizza(){
        $user = $this->authenticateUser();    
        $ingredients = $this->createIngredients();

       
        $pizza = Pizza::create([
            'name' => 'Margarita Pizza',
        ]);
        $pizza->ingredients()->attach($ingredients[0]);

        Storage::fake('public');  
        $newImage = UploadedFile::fake()->image('new_pizza.jpg');  

        $data = [
            'name' => 'Updated Margarita Pizza',
            'ingredients' => [$ingredients[1]->id],  
            'image' => $newImage,  
        ];

        $response = $this->put(route('pizzas.update', $pizza->id), $data);

        $this->assertDatabaseHas('pizzas', [
            'id' => $pizza->id,
            'name' => 'Updated Margarita Pizza',  
        ]);

        $pizza->refresh();
        $this->assertTrue($pizza->ingredients->contains($ingredients[1]));  
        $response->assertRedirect(route('pizzas.edit',$pizza->id));

    }

    public function test_it_soft_deletes_pizza()
    {
        
        $user = $this->authenticateUser();   
        $ingredients = $this->createIngredients(); 
        $pizza = Pizza::create([
            'name' => 'Margarita Pizza',
        ]);
        $pizza->ingredients()->attach($ingredients[0]);

        
        $this->assertDatabaseHas('pizzas', [
            'id' => $pizza->id,
            'name' => 'Margarita Pizza',
        ]);

       
        $response = $this->delete(route('pizzas.destroy', $pizza->id));       
        $this->assertSoftDeleted('pizzas', [
            'id' => $pizza->id,
            'name' => 'Margarita Pizza',
        ]);
        
        $pizza->refresh(); 
        $this->assertNotNull($pizza->deleted_at);      
        $response->assertRedirect(route('pizzas.index'));
    }


    protected function createIngredients(){
        $ingredient1 = Ingredient::create(['name' => 'Tomato', 'price' => 1.50]);
        $ingredient2 = Ingredient::create(['name' => 'Cheese', 'price' => 2.00]);

        return [$ingredient1, $ingredient2];
    }




    



}
