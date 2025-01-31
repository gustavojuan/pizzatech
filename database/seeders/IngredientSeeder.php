<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = [
            ['name' => 'Pomodoro', 'price' => 1.00],
            ['name' => 'Mozzarella', 'price' => 1.00],
            ['name' => 'Speck', 'price' => 2.00],
            ['name' => 'Cipolla', 'price' => 0.50],      
        ];

        foreach ($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }
    }
}
