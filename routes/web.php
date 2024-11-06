<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/plans', [PlanController::class, 'index'])->name('plans');

// Checkout
Route::get('/checkout/{plan:slug}', [CheckoutController::class, 'index2'])->middleware('auth')->name('checkout');
Route::post('/checkout/post', [CheckoutController::class, 'post'])->middleware('auth')->name('checkout.post');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
