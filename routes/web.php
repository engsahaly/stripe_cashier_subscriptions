<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AccessOnlyToSubscribedUsers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/plans', [PlanController::class, 'index'])->name('plans');


Route::get('/members', function () {
    return view('members');
})->middleware(AccessOnlyToSubscribedUsers::class)->name('members');

// Checkout
Route::get('/checkout/{plan:slug}', [CheckoutController::class, 'index'])->middleware('auth')->name('checkout');
Route::post('/checkout/post', [CheckoutController::class, 'post'])->middleware('auth')->name('checkout.post');

// Billing Portal
Route::get('/billing-portal', function () {
    // return Auth::user()->redirectToBillingPortal(route('plans'));
    dd(Auth::user()->billingPortalUrl(route('plans')));
})->name('billing-portal');

// Cancel
Route::get('/cancel', function () {
    Auth::user()->subscription('monthly-plan')->cancel();
    return back();
})->name('cancel');

// Cancel now
Route::get('/cancel-now', function () {
    Auth::user()->subscription('monthly-plan')->cancelNow();
    return back();
})->name('cancel-now');

// resume
Route::get('/resume', function () {
    Auth::user()->subscription('monthly-plan')->resume();
    return back();
})->name('resume');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
