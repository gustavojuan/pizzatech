<?php

namespace App\Providers;

use App\Interfaces\PizzaRepositoryInterface;
use App\Repositories\PizzaRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PizzaRepositoryInterface::class,PizzaRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
