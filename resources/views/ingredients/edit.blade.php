<!-- resources/views/ingredients/edit.blade.php -->
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8">
            
    <h1>{{ _('Editar Ingrediente') }}</h1>

    <!-- Formulario para editar el ingrediente -->
    <form action="{{ route('ingredients.update', $ingredient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">{{ _('Nombre') }}</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $ingredient->name) }}" required>
        </div>

        <div class="form-group">
            <label for="price">{{ _('Precio') }}</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $ingredient->price) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ _('Actualizar Ingrediente') }}</button>
    </form>
    </div>
    </div>
    </div>




@endsection
