<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Pizza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizza1 = Pizza::create([
            'name' => 'Campagna',
            'image_url' => 'pizzas/campagna.png',  // Agregamos la imagen
        ]);
    
        $pizza2 = Pizza::create([
            'name' => 'Funghi Speciale',
            'image_url' => 'pizzas/funghi_speciale.png',  // Agregamos la imagen
        ]);

        $pizza1->ingredients()->attach([
            Ingredient::where('name', 'Pomodoro')->first()->id,
            Ingredient::where('name', 'Mozzarella')->first()->id,
            Ingredient::where('name', 'Speck')->first()->id,
            Ingredient::where('name', 'Cipolla')->first()->id,
        ]);

        $pizza2->ingredients()->attach([
            Ingredient::where('name', 'Pomodoro')->first()->id,
            Ingredient::where('name', 'Mozzarella')->first()->id,            
        ]);
    }
}
