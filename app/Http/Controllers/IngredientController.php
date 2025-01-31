<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIngredientRequest $request)
    {
     
        $ingredient = Ingredient::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);


        return redirect()->route('ingredients.index')
            ->with('success', _('Ingrediente creado con éxito.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('ingredients.show', compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngredientRequest $request, Ingredient $ingredient)
    {
     
        $ingredient->update([
            'name' =>$request->name,
            'price' => $request->price,
        ]);


        return redirect()->route('ingredients.index')
            ->with('success', _('Ingrediente actualizado con éxito.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {


        $ingredient->pizzas()->detach();

        $ingredient->delete();

        Cache::forget('pizzas_all');

        return redirect()->route('ingredients.index')
            ->with('success', _('Ingrediente deleted successgfully'));
    }
}
