<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Baskets\BasketController;
use App\Http\Controllers\Categories\CategoryController;
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

    Route::group(['prefix' => 'category'], function (){
        Route::get("/",  [CategoryController::class, "index"]);


//----------- Тут я не стал реализовать этот момент, думаю пример с товарами схожи с этими -------------------
//        Route::group(["middleware" => ["auth:sanctum"]], function(){
//            Route::post("add", [CategoryController::class, "addProduct"]);
//            Route::post("update/{id}", [CategoryController::class, "updateProduct"]);
//            Route::delete("delete/{id}", [CategoryController::class, "deleteProduct"]);
//        });
    });

    Route::group(['prefix' => 'basket', "middleware" => ["auth:sanctum"]], function (){
            Route::get("/",  [BasketController::class, "index"]);
            Route::post("add", [BasketController::class, "add"]);
            Route::post("delete/{id}", [BasketController::class, "delete"]);
    });
});
