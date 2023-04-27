<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\AuthService;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    public function __construct(
        public AuthService $service
    ){}


    public function login(LoginRequest $request){
        $data = $request->validated();
        return $this->service->login($data);
    }

    public function register(RegisterRequest $request){
        $data = $request->validated();
        return $this->service->register($data);
    }
}
