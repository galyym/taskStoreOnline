<?php

namespace App\Http\Controllers\Baskets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Baskets\BasketRequest;
use App\Services\Baskets\BasketService;

class BasketController extends Controller
{
    public function __construct(
        protected BasketService $service
    ){}

    public function index(){
        return $this->service->index();
    }

    public function add(BasketRequest $request){
        return $this->service->add($request->validated());
    }

    public function delete($lang, $id){
        return $this->service->delete($id);
    }
}
