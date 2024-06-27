<?php

use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//test

Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    route::resource('user',App\Http\Controllers\UsersController::class);    
});



// route frontend
Route::get('/',[FrontController::class,'index']);
Route::get('/contact',[FrontController::class,'contact']);
Route::get('/about',[FrontController::class,'about']);
Route::get('/shop',[FrontController::class,'shop']);
Route::get('/cart',[FrontController::class,'cart']);
Route::get('/checkout',[FrontController::class,'checkout']);
Route::get('/track',[FrontController::class,'track']);
Route::get('/detail_product',[FrontController::class,'detail_product']);