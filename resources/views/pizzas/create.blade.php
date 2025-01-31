@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
        <div class="card-header">
            <h1>{{ __('Create Pizza') }}</h1>
        </div>

      
        <form action="{{ route('pizzas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

            <!-- Nombre de la Pizza -->
            <div class="form-group mb-3">
                <label for="name">{{ __('Pizza Name') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Ingredientes -->
            <div class="form-group mb-3">
                <label for="ingredients">{{ __('Ingredients') }}</label>
                <select class="form-control @error('ingredients') is-invalid @enderror" id="ingredients"
                    name="ingredients[]" multiple required>
                    @foreach ($ingredients as $ingredient)
                        <option value="{{ $ingredient->id }}" {{ in_array($ingredient->id, old('ingredients', [])) ? 'selected' : '' }}>
                            {{ $ingredient->name }}
                        </option>
                    @endforeach
                </select>
                @error('ingredients')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Imagen -->
            <div class="form-group mb-3">
                <label for="image">{{ __('Pizza Image') }}</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                    accept="image/*">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div></div>

            <div class="card-footer"> <!-- Botón de Submit -->
            <button type="submit" class="btn btn-success">{{ __('Create Pizza') }}</button></div>

           
        </form>
        
    </div>
        </div>
    </div>
 
</div>
@endsection