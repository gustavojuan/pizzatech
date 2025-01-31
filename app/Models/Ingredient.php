<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['name', 'price'];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }
}
