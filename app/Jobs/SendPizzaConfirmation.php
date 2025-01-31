<?php

namespace App\Jobs;

use App\Models\Pizza;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;


class SendPizzaConfirmation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

   
    protected $pizza;

    /**
     * Crea una nueva instancia del trabajo.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return void
     */
    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    /**
     * Ejecuta el trabajo.
     *
     * @return void
     */
    public function handle()
    {
    
        Log::info('Enviando confirmación para la pizza: ' . $this->pizza->name);
        
     
    }
}
