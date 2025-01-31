<!-- resources/views/ingredients/index.blade.php -->
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ __('Lista de Ingredientes')}}</h1>

            <a href="{{ route('ingredients.create') }}" class="btn btn-primary mb-3">{{_('Create new ingredient')}}</a>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{_('Name')}}</th>
                            <th>{{_('Price')}}</th>
                            <th>{{_('ACtions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ingredients as $ingredient)
                            <tr>
                                <td>{{ $ingredient->name }}</td>
                                <td>${{ number_format($ingredient->price, 2) }}</td>
                                <td>
                                    <a href="{{ route('ingredients.edit', $ingredient->id) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('ingredients.destroy', $ingredient->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Estás seguro de eliminar este ingrediente?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection