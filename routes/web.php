<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//index
Route::get('/', [ProductController::class, 'index']);
Route::get('/index2', [ProductController::class, 'index2']);

//show individual data
Route::get('/product/{product}',[ProductController::class, 'show']);

//create data
Route::get('/create',[ProductController::class, 'create'])->middleware('auth');

//to delete the data
Route::delete('/products/{product}/delete',[ProductController::class,'destroy'])->middleware('auth');

//store data
Route::post('/product', [ProductController::class, 'store'])->middleware('auth');


//edit data
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->middleware('auth');



//to update the data
Route::put('/products/{product}', [ProductController::class,'update']);

//register
Route::get('/register',[UserController::class,'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store'])->middleware('guest');
    
Route::post('/logoutsss', [UserController::class, 'logout']);

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/authenticate', [UserController::class, 'authenticate']);
Route::get('/cart', [CartController::class, 'shoppingCart'])->middleware('auth');

Route::delete('/cart/{product}/remove',[CartController::class, 'remove'])->middleware('auth');
Route::get('/cart/{product}', [CartController::class, 'ProductCart']);
Route::delete('/cart/{product}/destroyall', [CartController::class, 'destroyall']);

?>