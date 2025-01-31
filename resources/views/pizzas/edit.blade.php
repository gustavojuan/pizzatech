@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('Edit Pizza') }}</h1>
                </div>

                <form action="{{ route('pizzas.update', $pizza->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <!-- Nombre de la Pizza -->
                        <div class="form-group mb-3">
                            <label for="name">{{ __('Pizza Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                   value="{{ old('name', $pizza->name) }}" required>
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
                                    <option value="{{ $ingredient->id }}" 
                                        {{ in_array($ingredient->id, old('ingredients', $pizza->ingredients->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $ingredient->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ingredients')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Imagen actual de la pizza -->
                        <div class="form-group mb-3">
                            <label for="image">{{ __('Pizza Image') }}</label>
                            @if ($pizza->image_url)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $pizza->image_url) }}" alt="{{ $pizza->name }}" class="img-fluid" width="150">
                                </div>
                            @else
                                <p>{{ __('No image available') }}</p>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <!-- Botón de Submit -->
                        <button type="submit" class="btn btn-success">{{ __('Update Pizza') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
@endsection
