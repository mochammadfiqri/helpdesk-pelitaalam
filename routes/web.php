<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\LandingPage;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\LoginSelect;
use App\Http\Livewire\Auth\Logout;
use App\Http\Livewire\Users;

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

Route::middleware('onlyGuest')->group(function () {
    
    Route::get('/', LandingPage::class)->name('landing-page');
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware('auth')->group(function() {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::middleware('onlyAdmin')->group(function() {
        Route::get('/users', Users::class)->name('users');
    });

    Route::middleware('onlyStaff')->group(function() {
        
    });
});

// Route::middleware('guest')->group(function () {
//     Route::get('/', LandingPage::class)->name('landing-page');
//     Route::get('/login', Login::class)->name('login');
//     Route::get('/login-select', LoginSelect::class)->name('login-select');
//     Route::get('/register', Register::class)->name('register');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', Dashboard::class)->name('dashboard');
//     Route::get('/users', Users::class)->name('users');
// });