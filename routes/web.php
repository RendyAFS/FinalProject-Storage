<?php

use App\Http\Controllers\FoundController;
use App\Http\Controllers\LostController;
use App\Http\Controllers\ClaimController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('losts', LostController::class);
    Route::get('/wa/{id}', [LostController::class, 'wa'])->name('wa');


    Route::resource('founds', FoundController::class);
    Route::get('/history', [FoundController::class, 'history'])->name('history');
    Route::get('/claim/{foundID}', [FoundController::class, 'claim'])->name('claim');
    Route::put('/storeclaim/{foundID}', [FoundController::class, 'storeclaim'])->name('storeclaim');
    Route::get('/display', [FoundController::class, 'display'])->name('display');
});

