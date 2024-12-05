<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\GoogleController;

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


route::get('/',[HomeController::class,'index'])->name("welcome");
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/redirect',[HomeController::class,'index'])->middleware('auth','verified');

Route::get('auth/redirect', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/callback', [GoogleController::class, 'handleCallback']);

// Other Routes
Route::get("/mycompiler", [HomeController::class, "compiler"])->name("mycompiler");
Route::post('/compile', [HomeController::class, 'compile'])->name('compile');
Route::get('/problem', [HomeController::class, 'problem'])->name('problem');

// Payment Routes
Route::post('/create-checkout-session', [PaymentController::class, 'createCheckoutSession'])->name('create.checkout.session');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

// Problem Solving Route
Route::post('/probsolve', [HomeController::class, 'solve'])->name('probsolve');

Route::post('/trackrecord', [HomeController::class, 'trackrecord'])->name('trackrecord');


Route::get('/track', [HomeController::class, 'track'])->name('track');

Route::get('/tracker', [HomeController::class, 'tracker'])->name('tracker');






