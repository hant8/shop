<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
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

Route::middleware('auth')->group(function (){
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/delete/{id}',[AdminController::class,'delete'])->name('delete');
    Route::get('/edit/{id}',[AdminController::class,'edit'])->name('edit');
    Route::post('/update/{id}',[AdminController::class,'update'])->name('update');
    Route::get('/create',[AdminController::class,'create'])->name('create');
    Route::post('/store',[AdminController::class,'store'])->name('store');
    Route::get('/deleteProduct/{id}',[AdminController::class,'deleteProduct'])->name('deleteProduct');

});
Route::middleware('guest')->group(function (){
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::post('/register_proccess',[AuthController::class,'register_proccess'])->name('register_proccess');
    Route::post('/login_proccess',[AuthController::class,'login_proccess'])->name('login_proccess');
    
    
});
Route::get('/',[TestController::class,'home'])->name('home');
Route::get('/catalog',[TestController::class,'catalog'])->name('catalog');
Route::get('/users',[TestController::class,'users'])->name('users');
Route::get('/show/{id}',[TestController::class,'show'])->name('show');
Route::get('/products',[TestController::class,'products'])->name('products');
Route::get('/showCategory/{id}',[TestController::class,'showCategory'])->name('showCategory');
Route::post('/filter',[TestController::class,'filter'])->name('filter');
Route::get('/zzz',function (){
    return view('shop.zzz');
});
