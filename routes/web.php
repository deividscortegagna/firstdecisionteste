<?php

use App\Livewire\RegisterUser;
use App\Livewire\LoginUser;

Route::middleware('guest')->group(function () {
    Route::get('register', RegisterUser::class)->name('register');
    Route::get('login', LoginUser::class)->name('login');
});

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
});
