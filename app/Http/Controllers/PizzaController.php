<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePizzaRequest;
use App\Http\Requests\UpdatePizzaRequest;
use App\Models\Ingredient;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::with('ingredients')->paginate(6);
        return view('pizzas.index',compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        return view('pizzas.create', compact('ingredients'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePizzaRequest $request)
    {
        $pizza = Pizza::create([
            'name' => $request->name,
            'image_url' => $request->file('image') ? $request->file('image')->store('pizzas', 'public') : null,
        ]);

        $pizza->ingredients()->attach($request->ingredients);

        return redirect()->route('pizzas.index')->with('success', __('Pizza created successfully.'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pizza = Pizza::findOrFail($id);

        // Obtener todos los ingredientes disponibles para mostrar en el formulario
        $ingredients = Ingredient::all();
    
        // Retornar la vista de edición con la pizza y los ingredientes
        return view('pizzas.edit', compact('pizza', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePizzaRequest $request, string $id)
    {

        $pizza = Pizza::findOrFail($id);
        $pizza->name = $request->name;
        $pizza->save();

        $pizza->ingredients()->sync($request->ingredients);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('pizza_images', 'public');
            $pizza->image_url = $imagePath;
            $pizza->save();
        }

        return redirect()->route('pizzas.edit', $pizza->id)
                     ->with('success', 'Pizza updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();
        return redirect()->route('pizzas.index')->with('success', 'Pizza deleted successfully.');

    }
}
