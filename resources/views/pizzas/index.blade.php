@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row mb-5">
        <div class="col">
            <a href="{{ route('pizzas.create') }}" class="btn btn-primary">
                {{ __('Create Pizza') }}
            </a>
        </div>
    </div>
    <div class="row justify-content-start">


        @foreach ($pizzas as $pizza)
            <div class="col-12 col-md-4 mb-3">

                <div class="card">
                    @if ($pizza->image_url)
                        <img src="{{ asset('storage/' . $pizza->image_url) }}" class="card-img-top" alt="{{ $pizza->name }}">
                    @else
                        <img src="https://placehold.co/600x400" class="card-img-top" alt="{{ $pizza->name }}">

                    @endif
                    <div class="card-header">{{$pizza->name}}</div>
                    <div class="card-body">
                        <h5> {{ __('Ingredients') }}:</h5>
                        <ul>
                            @foreach ($pizza->ingredients as $ingredient)
                                <li>{{ $ingredient->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer justify-content-center">

                    <div class="row">
                        <div class="col"><strong class="display-6">  {{$pizza->calculated_price}}</strong></div>
                    </div>
                      

                        <!-- Enlace para editar -->
                        <a href="{{ route('pizzas.edit', $pizza->id) }}" class="btn btn-primary">{{ __('Edit Pizza') }}</a>

                        <!-- Formulario para eliminar -->
                        <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary">{{ __('Delete Pizza') }}</button>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach

    </div>

    {{$pizzas->links()}}
</div>
@endsection