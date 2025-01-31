<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponseClass;
use App\Http\Resources\PizzaResource;
use App\Interfaces\PizzaRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApiPizzaController extends Controller
{
    private PizzaRepositoryInterface $pizzaRepositoryInterface;

    public function __construct(PizzaRepositoryInterface $pizzaRepositoryInterface)
    {
        $this->pizzaRepositoryInterface = $pizzaRepositoryInterface;

        
    }

    public function index()
    {
        $data = $this->pizzaRepositoryInterface->index();

        return ApiResponseClass::sendResponse(PizzaResource::collection($data),'',200);
    }
}
