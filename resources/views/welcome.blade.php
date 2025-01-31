@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>{{ __('Welcome to the Pizza Management System!') }}</h1>
            <p>{{ __('This system allows you to manage pizzas, their ingredients, and prices through an intuitive interface. Below you will find details on how to interact with the API and log in to the backoffice.') }}</p>
        </div>

        <!-- API Information Section -->
        <div class="col-12 mt-4">
            <h2>{{ __('API Information') }}</h2>
            <p>{{ __('To interact with the pizzas, ingredients, and prices, you can use the following API endpoint:') }}</p>
            <pre>
                <code>
                    GET /api/pizzas
                    - Description: Retrieves a list of all pizzas, including their ingredients and calculated prices.
                    
                
                </code>
            </pre>
        </div>

        <!-- Login Information Section -->
        <div class="col-12 mt-4">
            <h2>{{ __('Backoffice Login Information') }}</h2>
            <p>{{ __('To access the admin panel (backoffice) and manage pizzas, please log in with the following credentials:') }}</p>
            <ul>
                <li><strong>{{ __('Username:') }}</strong> <em>test@example.com</em></li>
                <li><strong>{{ __('Password:') }}</strong> <em>password</em></li>
            </ul>
            <p>{{ __('After logging in, you will be able to create, edit, and delete pizzas as well as manage their ingredients.') }}</p>
            <p>{{ __('To log in, go to:') }} <a href="{{ route('login') }}">{{ route('login') }}</a></p>
        </div>
    </div>
</div>
@endsection
