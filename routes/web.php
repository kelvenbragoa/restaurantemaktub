<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/usermenu', function() {

    return response()->json('Por favor volte a fazer o scan do QrCode', 404);
    }
);

Route::get('/',[\App\Http\Controllers\RootController::class,'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('product',[\App\Http\Controllers\RootController::class,'product']);
Route::get('/category/{category}',[\App\Http\Controllers\RootController::class,'category']);
Route::get('/search',[\App\Http\Controllers\RootController::class,'search']);
Route::get('/all-reviews',[\App\Http\Controllers\ReviewsController::class,'index']);
Route::resource('menu', 'App\Http\Controllers\MenuController');
Route::resource('menudigital', 'App\Http\Controllers\Menu\MenuDigitalController');
Route::get('/menudigital/{id}/table',[\App\Http\Controllers\Menu\MenuDigitalController::class,'index']);
Route::get('/menudigital/{user_id}/user/{table_id}/table/{category_id}/category',[\App\Http\Controllers\Menu\MenuDigitalController::class,'showcategory']);
Route::post('/usermenu',[\App\Http\Controllers\Menu\MenuDigitalController::class, 'loginusermenu'])->name('usermenu');




Auth::routes();
// Rota para administrador
Route::group(['middleware'=>['auth','admin']], function(){

    Route::resource('tables', 'App\Http\Controllers\TableController');
    Route::resource('locals', 'App\Http\Controllers\Local_DeliveriesController');
    Route::resource('atendants', 'App\Http\Controllers\AtendantController');
    Route::resource('categories', 'App\Http\Controllers\CategoriesController');
    Route::resource('products', 'App\Http\Controllers\ProductsController');
    Route::get('/sells-final-admin',[\App\Http\Controllers\SellsController::class,'indexFinalAdmin']);
    Route::get('/invoice-admin/{sell}',[\App\Http\Controllers\SellsController::class,'invoiceAdmin']);
    Route::get('/reviews-admin',[\App\Http\Controllers\ReviewsController::class,'indexAdmin']);
    Route::patch('/review/{review}', [\App\Http\Controllers\ReviewsController::class,'update']);
    Route::resource('settings', 'App\Http\Controllers\SettingsController');
    Route::get('/print-template',[\App\Http\Controllers\MenuController::class,'print']);
    Route::resource('dishday', 'App\Http\Controllers\DishDayController');
    Route::get('/garbage/products',[\App\Http\Controllers\ProductsController::class,'garbage']);
    Route::put('/recover/products',[\App\Http\Controllers\ProductsController::class,'recover']);

   
    

    
});

Route::group(['middleware'=>['auth','atendant']], function(){
    Route::resource('sells', 'App\Http\Controllers\SellsController');
    Route::get('/invoice/{sell}',[\App\Http\Controllers\SellsController::class,'invoice']);
    Route::get('/sells-final',[\App\Http\Controllers\SellsController::class,'indexFinal']);
    Route::get('/fetch-data', [App\Http\Controllers\SellsController::class, 'fetchdata']);
    
});

Route::group(['middleware'=>['auth','client']], function(){
    Route::get('/myorder',[\App\Http\Controllers\RootController::class,'myorder']);
    Route::resource('carts', 'App\Http\Controllers\CartsController');
    Route::get('/addcart/{product}',[\App\Http\Controllers\RootController::class,'addCart']);
    Route::resource('sells-client', 'App\Http\Controllers\SellsController');
    Route::resource('reviews', 'App\Http\Controllers\ReviewsController');
    Route::get('/create/{sell_id}',[\App\Http\Controllers\ReviewsController::class,'create']);
    Route::resource('clients', 'App\Http\Controllers\ClientsController');

    Route::get('/client-invoice/{sell_id}',[\App\Http\Controllers\RootController::class,'clientinvoice']);


    

});








