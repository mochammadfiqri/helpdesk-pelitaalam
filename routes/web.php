<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\LandingPage;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Department;
use App\Http\Livewire\ETicket\CreateTicket;
use App\Http\Livewire\ETicket\EditTicket;
use App\Http\Livewire\ETicket\MainDataset;
use App\Http\Livewire\ETicket\MainTicket;
use App\Http\Livewire\GlobalSetting;
use App\Http\Livewire\KnowledgeBase\CreateKnowledge;
use App\Http\Livewire\KnowledgeBase\EditKnowledge;
use App\Http\Livewire\KnowledgeBase\MainKnowledge;
use App\Http\Livewire\Pages\KnowledgePages;
use App\Http\Livewire\Pages\TicketPages;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Priority;
use App\Http\Livewire\Status;
use App\Http\Livewire\Types;
use App\Http\Livewire\Users;
use App\Models\DatasetTickets;
use App\Models\Tickets;

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
    Route::get('/knowledge', KnowledgePages::class)->name('knowledge-page');
    Route::get('/e-ticket', TicketPages::class)->name('ticket-page');
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register'); 
});

Route::middleware('auth')->group(function() {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::middleware('onlyAdmin')->group(function() {
        Route::get('/knowledge-base', MainKnowledge::class)->name('main_knowledge');
        Route::get('/knowledge-base/create-new-knowledge', CreateKnowledge::class)->name('create_knowledge');
        Route::get('/knowledge-base/{slug}', EditKnowledge::class)->name('edit_knowledge');

        Route::get('/tickets', MainTicket::class)->name('main_ticket');
        Route::get('/tickets/create-new-ticket', CreateTicket::class)->name('create_ticket');
        Route::get('/tickets/dataset', MainDataset::class)->name('main_dataset');
        Route::get('/tickets/{ticket_id}', EditTicket::class)->name('edit_ticket');

        Route::get('/categories', Categories::class)->name('category');
        Route::get('/department', Department::class)->name('department');
        Route::get('/users', Users::class)->name('users');
        Route::get('/priorities', Priority::class)->name('priority');
        Route::get('/statuses', Status::class)->name('status');
        Route::get('/types', Types::class)->name('types');
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