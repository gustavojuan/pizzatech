<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'price'];
    protected $dates = ['deleted_at'];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }
}
