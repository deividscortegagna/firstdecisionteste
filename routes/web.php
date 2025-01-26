<?php

use App\Livewire\RegisterUser;
use App\Livewire\LoginUser;
use App\Livewire\UserList;

Route::middleware('guest')->group(function () {
    Route::get('register', RegisterUser::class)->name('register');
    Route::get('login', LoginUser::class)->name('login');
});

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::post('logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

    Route::get('/', UserList::class)->name('dashboard');
});
