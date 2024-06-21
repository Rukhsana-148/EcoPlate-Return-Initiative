<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use App\Http\Controllers\BotManController;
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
Route::get('/dashboard', [NewController:: class, "welcome"]);
Route::get('/', [NewController:: class, "welcome"]);
Route::post('/addFood', [NewController:: class, "addFood"]);
Route::post('/addToCart', [NewController:: class, "addCart"]);
Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\BotManController@handle');

Route::post('/offerFix', [NewController:: class, "offerFix"]);

Route::post('/buy', [NewController:: class, "buy"]);
Route::post('/returnPolicy', [NewController:: class, "returnPolicy"]);
Route::post('/accepted', [NewController:: class, "accepted"]);
Route::get('/buyNow/{id}', [NewController:: class, "buyNow"]);
Route::get('/buyFood', [NewController:: class, "buyList"]);
Route::get('/returnProduct', [NewController:: class, "returnProduct"]);
Route::get('/cart', [NewController:: class, "cart"]);
Route::get('/createFood', [NewController:: class, "food"]);
Route::get('/addOffer', [NewController:: class, "addOffer"]);
Route::get('/returnFood', [NewController:: class, "return"]);
Route::post('/deleteCart', [NewController:: class, "deleteCart"]);
Route::get('/editFood', [NewController:: class, "editFood"]);
Route::post('/editThisFood', [NewController:: class, "editThisFood"]);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/nothing', function () {
        return view('dashboard');
    })->name('dashboard');
});
