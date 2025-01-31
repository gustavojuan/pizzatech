@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

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
                        <h5>Ingredientes:</h5>
                        <ul>
                            @foreach ($pizza->ingredients as $ingredient)
                                <li>{{ $ingredient->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection