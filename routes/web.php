<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', [Controller::class, 'show'])->name('dashboard');
    Route::get('/sendmoney', [Controller::class, 'seen'])->name('sendfunds');
    Route::post('/search_form', [Controller::class, 'search'])->name('search_form');
    Route::post('/sendmoney', [Controller::class, 'sendmoney'])->name('sendmoney');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
