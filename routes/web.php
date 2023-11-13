<?php

use App\Http\Livewire\Articles;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\LandingPage;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Categories;
use App\Http\Livewire\GlobalSetting;
use App\Http\Livewire\Knowledge;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Labels;
use App\Http\Livewire\Priority;
use App\Http\Livewire\Settings;
use App\Http\Livewire\Status;
use App\Http\Livewire\Types;
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
        Route::get('/knowledge-base', Knowledge::class)->name('knowledge');
        Route::get('/categories', Categories::class)->name('category');

        Route::get('/users', Users::class)->name('users');
        // Route::get('/priorities', Priorities::class)->name('priorities');
        // Route::get('/statuses', Statuses::class)->name('statuses');
        Route::get('/priorities', Priority::class)->name('priority');
        Route::get('/statuses', Status::class)->name('status');
        // Route::get('/labels', Labels::class)->name('labels');
        Route::get('/types', Types::class)->name('types');
        // Route::get('/settings', Settings::class)->name('settings');
        Route::get('/settings/global', GlobalSetting::class)->name('global_setting');
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