<?php

namespace App\Repositories;

use App\Interfaces\PizzaRepositoryInterface;
use App\Models\Pizza;

class PizzaRepository implements PizzaRepositoryInterface
{
    public function index(){
        return Pizza::all();
    }
}
