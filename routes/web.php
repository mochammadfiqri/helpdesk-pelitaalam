<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\LandingPage;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\LoginSelect;
use App\Http\Livewire\Auth\Logout;

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

Route::get('/', LandingPage::class)->name('landing-page');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/login-select', LoginSelect::class)->name('login-select');
    Route::get('/register', Register::class)->name('register');
    // Route::get('/logout', Logout::class)->name('logout');

    // Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');
    // Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/logout', Logout::class)->name('logout');
});