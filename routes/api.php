<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// ROTAS PUBLICAS

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);





Route::get('/user/{user}', [\App\Http\Controllers\AuthController::class,'user']);
    Route::get('/logout', [\App\Http\Controllers\AuthController::class,'logout']);


    //orders sell
    Route::get('/orders',[\App\Http\Controllers\Api\OrderController::class,'index']);
    Route::post('/orders',[\App\Http\Controllers\Api\OrderController::class,'store']);
    Route::get('/orders/{id}',[\App\Http\Controllers\Api\OrderController::class,'show']);
    Route::put('/orders/{id}',[\App\Http\Controllers\Api\OrderController::class,'update']);
    Route::delete('/orders/{id}',[\App\Http\Controllers\Api\OrderController::class,'destroy']);

    //category

    Route::get('/category',[\App\Http\Controllers\Api\CategoryController::class,'index']);
    Route::get('/category/{id}',[\App\Http\Controllers\Api\CategoryController::class,'show']);

    //cat
    // Route::post('/category',[\App\Http\Controllers\Api\CategoryController::class,'store']);
    // Route::put('/category/{id}',[\App\Http\Controllers\Api\CategoryController::class,'update']);
    // Route::delete('/category/{id}',[\App\Http\Controllers\Api\CategoryController::class,'destroy']);

    //product
    Route::get('/producthome',[\App\Http\Controllers\Api\ProductController::class,'producthome']);
    Route::get('/product',[\App\Http\Controllers\Api\ProductController::class,'index']);
    Route::get('/product/{id}',[\App\Http\Controllers\Api\ProductController::class,'show']);
    Route::get('/searchproduct/{search}',[\App\Http\Controllers\Api\ProductController::class,'search']);

    Route::get('/categoryproducts/{category}',[\App\Http\Controllers\Api\ProductController::class,'categoryproducts']);

   

    
    // Route::post('/product',[\App\Http\Controllers\Api\ProductController::class,'store']);
    // Route::put('/product/{id}',[\App\Http\Controllers\Api\ProductController::class,'update']);
    // Route::delete('/product/{id}',[\App\Http\Controllers\Api\ProductController::class,'destroy']);

    //review
    Route::get('/review',[\App\Http\Controllers\Api\ReviewsController::class,'index']);
    Route::post('/review',[\App\Http\Controllers\Api\ReviewsController::class,'store']);
    Route::get('/review/{id}',[\App\Http\Controllers\Api\ReviewsController::class,'show']);

    // Route::put('/review/{id}',[\App\Http\Controllers\Api\ReviewsController::class,'update']);
    // Route::delete('/review/{id}',[\App\Http\Controllers\Api\ReviewsController::class,'destroy']);

    //cart
    Route::get('/cart/{userid}',[\App\Http\Controllers\Api\CartController::class,'index']);
    Route::post('/carts',[\App\Http\Controllers\Api\CartController::class,'store']);
    Route::get('/cart/{id}',[\App\Http\Controllers\Api\CartController::class,'show']);
    Route::put('/cart/{id}',[\App\Http\Controllers\Api\CartController::class,'update']);
    Route::delete('/carts/{id}/user/{userid}',[\App\Http\Controllers\Api\CartController::class,'destroy']);

    //local
    Route::get('/local',[\App\Http\Controllers\Api\LocalController::class,'index']);


    //sell

    Route::get('/sells/{userid}',[\App\Http\Controllers\Api\SellController::class,'index']);
    Route::post('/sells',[\App\Http\Controllers\Api\SellController::class,'store']);


   
      /**Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('/user', [\App\Http\Controllers\AuthController::class,'user']);
    Route::get('/logout', [\App\Http\Controllers\AuthController::class,'logout']);


    //orders sell
    Route::get('/orders',[\App\Http\Controllers\Api\OrderController::class,'index']);
    Route::post('/orders',[\App\Http\Controllers\Api\OrderController::class,'store']);
    Route::get('/orders/{id}',[\App\Http\Controllers\Api\OrderController::class,'show']);
    Route::put('/orders/{id}',[\App\Http\Controllers\Api\OrderController::class,'update']);
    Route::delete('/orders/{id}',[\App\Http\Controllers\Api\OrderController::class,'destroy']);

    //category
    Route::get('/category',[\App\Http\Controllers\Api\CategoryController::class,'index']);
    Route::get('/category/{id}',[\App\Http\Controllers\Api\CategoryController::class,'show']);
    // Route::post('/category',[\App\Http\Controllers\Api\CategoryController::class,'store']);
    // Route::put('/category/{id}',[\App\Http\Controllers\Api\CategoryController::class,'update']);
    // Route::delete('/category/{id}',[\App\Http\Controllers\Api\CategoryController::class,'destroy']);

    //product
    Route::get('/product',[\App\Http\Controllers\Api\ProductController::class,'index']);
    Route::get('/product/{id}',[\App\Http\Controllers\Api\ProductController::class,'show']);
    // Route::post('/product',[\App\Http\Controllers\Api\ProductController::class,'store']);
    // Route::put('/product/{id}',[\App\Http\Controllers\Api\ProductController::class,'update']);
    // Route::delete('/product/{id}',[\App\Http\Controllers\Api\ProductController::class,'destroy']);

    //review
    Route::get('/review',[\App\Http\Controllers\Api\ReviewsController::class,'index']);
    Route::post('/review',[\App\Http\Controllers\Api\ReviewsController::class,'store']);
    Route::get('/review/{id}',[\App\Http\Controllers\Api\ReviewsController::class,'show']);
    // Route::put('/review/{id}',[\App\Http\Controllers\Api\ReviewsController::class,'update']);
    // Route::delete('/review/{id}',[\App\Http\Controllers\Api\ReviewsController::class,'destroy']);

    //cart
    Route::get('/cart',[\App\Http\Controllers\Api\CartController::class,'index']);
    Route::post('/carts',[\App\Http\Controllers\Api\CartController::class,'store']);
    Route::get('/cart/{id}',[\App\Http\Controllers\Api\CartController::class,'show']);
    Route::put('/cart/{id}',[\App\Http\Controllers\Api\CartController::class,'update']);
    Route::delete('/carts/{id}',[\App\Http\Controllers\Api\CartController::class,'destroy']);

    //local
    Route::get('/local',[\App\Http\Controllers\Api\LocalController::class,'index']);


    //sell
    Route::get('/sells',[\App\Http\Controllers\Api\SellController::class,'index']);


});*/


