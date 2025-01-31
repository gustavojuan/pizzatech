<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{

    use SoftDeletes;

    protected $fillable = ['name', 'ingredients', 'image_url'];
    protected $dates = ['deleted_at'];


    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    protected function calculatedPrice(): Attribute
    {
        return Attribute::get(function () {
            $total = $this->ingredients->sum('price'); 
            
            return $total + ($total * 0.5);
        });
    }
    
    
}
