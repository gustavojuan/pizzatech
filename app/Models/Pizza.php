<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = ['name','ingredients','image_url'];


    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function calculatePrice(): float
    {
        $total = $this->ingredients->sum('price');
        return $total + ($total * 0.5);
    }
}
