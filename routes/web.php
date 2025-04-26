<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Livewire\Pages\Instrucoes;



Route::get('/instrucoes', Instrucoes::class)->name('instrucoes');
Route::get('/welcome', Instrucoes::class)->name('welcome');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
 
use App\Livewire\Users\CreateUser;
Route::get('/users/novo', CreateUser::class)
    ->middleware(['auth', 'role:admin'])
    ->name('users.create');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});


use App\Livewire\Users\ListUsers;

Route::get('/users', ListUsers::class)
    ->middleware(['auth', 'role:admin'])
    ->name('users.index');


require __DIR__.'/auth.php';
