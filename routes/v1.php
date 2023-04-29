<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Products\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|---------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => '{lang}', 'where' => ['kk|ru|en']], function (){

    Route::post("register", [AuthController::class, "register"]);
    Route::post("login", [AuthController::class, "login"]);

    Route::group(['prefix' => 'product'], function (){
        Route::get("/", [ProductController::class, "index"]);

        Route::group(["middleware" => ["auth:sanctum"]], function(){
            Route::post("add", [ProductController::class, "addProduct"]);
            Route::post("update/{id}", [ProductController::class, "updateProduct"]);
            Route::delete("delete/{id}", [ProductController::class, "deleteProduct"]);
        });
    });
});
