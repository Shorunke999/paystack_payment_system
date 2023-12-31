<?php

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

Route::get('/{id}', [Controller::class, 'show'])->name('wallet_page');
Route::get('sendFunds/{{id}}',  [Controller::class, 'show2'])->name('sendFunds');
Route::post('/search_user',  [Controller::class, 'search']);
Route::get('/sendFunds',  [Controller::class, 'sendmoney'])->name('sendmoney');



Route::get('/payment-form',[\App\Http\Controllers\HomeController::class , 'index']);
Route::post('/payment',[\App\Http\Controllers\PaymentController::class , 'redirecttogateway'])->name('payment-form');
Route::get('/payment/callback',[\App\Http\Controllers\PaymentController::class , 'handlePaymentCallback']);/*this is the
call back url to be set in our env file..*/
