<?php

namespace App\Providers;

use App\Events\PizzaCreated;
use App\Jobs\SendPizzaConfirmation;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }

    protected $listen = [
        PizzaCreated::class => [
            SendPizzaConfirmation::class, // Manejador que ejecutará el Job
        ],
    ];
}
