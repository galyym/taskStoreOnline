<?php

namespace App\Services\Auth;

use App\Http\Responders\Responder;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(
        protected Responder $response
    ){}
    public function login(array $data): JsonResponse
    {
        $user = User::where("email", $data["email"])->first();
        if (!$user) {
            return $this->response->error("User not found",  [],404);
        }
        $token = $user->createToken("authToken")->plainTextToken;
        return $this->response->success("success", [
            "token" => $token,
            "expires" => 60*24*3
        ]);
    }

    public function register(array $data): JsonResponse {
        $insert_user = User::insert([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"])
        ]);

        if (!$insert_user) {
            return $this->response->error("Filed to register user",  [],404);
        }

        $user = User::where("email", $data["email"])->first();
        $token = $user->createToken("authToken")->plainTextToken;
        return $this->response->success("success", [
            "token" => $token,
            "expires" => 60*24*3
        ]);
    }
}
