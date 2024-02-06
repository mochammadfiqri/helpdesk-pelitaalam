<?php

use Illuminate\Support\Str;
use App\Http\Livewire\Types;
use App\Http\Livewire\Users;
use Illuminate\Http\Request;
use App\Http\Livewire\Status;
use App\Http\Livewire\Priority;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Department;
use App\Http\Livewire\LandingPage;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\GlobalSetting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\TicketPages;
use Illuminate\Support\Facades\Password;
use App\Http\Livewire\ETicket\EditTicket;
use App\Http\Livewire\ETicket\MainTicket;
use App\Http\Livewire\Pages\ChatbotPages;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Livewire\ETicket\MainDataset;
use App\Http\Livewire\Pages\KnowledgePost;
use App\Http\Livewire\ETicket\CreateTicket;
use App\Http\Livewire\Pages\KnowledgePages;
use App\Http\Livewire\Chatbot\ChatbotSetting;
use App\Http\Livewire\Botman\ChatbotMessenger;
use App\Http\Livewire\KnowledgeBase\EditKnowledge;
use App\Http\Livewire\KnowledgeBase\MainKnowledge;
use App\Http\Livewire\KnowledgeBase\CreateKnowledge;
use App\Http\Livewire\Users\CreateUser;
use App\Http\Livewire\Users\EditUser;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

// Auth::routes(['verify' => true]);

Route::get('/', LandingPage::class)->name('landing-page');

// Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
Route::get('/botman', ChatbotMessenger::class)->name('ChatbotMessenger');
Route::post('/botman', [ChatbotMessenger::class, 'handle']);

// Route::get('/chat-ai', ChatbotPages::class)->name('chatbot');
// Route::post('/chat-ai', [ChatbotPages::class, 'newPrompt']);
// Route::get('/chat-ai', [ChatbotController::class, 'index'])->name('chatbot');

Route::get('/knowledge', KnowledgePages::class)->name('knowledge-page');
Route::get('/knowledge/{slug}', KnowledgePost::class)->name('knowledge-post');
Route::get('/e-ticket', TicketPages::class)->name('ticket-page');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware('guest')->group(function() {
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    // Route::get('/forgot-password', IndexForgotPassword::class)->name('password.email');

    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);
    
        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    })->name('password.email');

    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');

    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    })->name('password.update');

});

Route::middleware('onlyGuest')->group(function () {
    Route::get('/login', Login::class)->name('login');

    Route::get('/login/google', [Login::class, 'redirectToGoole'])->name('auth.google');
    Route::get('/login/google/callback', [Login::class, 'handleGoogleCallback']);

    Route::get('/register', Register::class)->name('register'); 
    // Route::get('register/verify/{verify_key}', [Register::class, 'verify'])->name('verify');
    // Route::get('/register/verify/{token}', [Register::class, 'verifyAccount'])->name('user.verify'); 
});

Route::middleware('auth','verified')->group(function() {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/chat-ai', ChatbotPages::class)->name('chatbot');
    Route::post('/chat-ai', [ChatbotPages::class, 'newPrompt']);

    Route::get('/tickets', MainTicket::class)->name('main_ticket');
    Route::get('/tickets/create-new-ticket', CreateTicket::class)->name('create_ticket');
    Route::get('/tickets/dataset', MainDataset::class)->name('main_dataset');
    // Route::get('/tickets/dataset/{dataset_id}', EditDataset::class)->name('edit_dataset');
    Route::get('/tickets/{ticket_id}', EditTicket::class)->name('edit_ticket');

    Route::get('/knowledge-base', MainKnowledge::class)->name('main_knowledge');
    Route::get('/knowledge-base/create-new-knowledge', CreateKnowledge::class)->name('create_knowledge');
    Route::get('/knowledge-base/{slug}', EditKnowledge::class)->name('edit_knowledge');

    Route::middleware('onlyAdmin')->group(function() {
        Route::get('/categories', Categories::class)->name('category');
        // Route::get('/department', Department::class)->name('department');

        Route::get('/users', Users::class)->name('users');
        Route::get('/users/create-new-user', CreateUser::class)->name('create.user');
        Route::get('/users/edit-user', EditUser::class)->name('edit.user');

        Route::get('/priorities', Priority::class)->name('priority');
        Route::get('/statuses', Status::class)->name('status');
        Route::get('/types', Types::class)->name('types');
        Route::get('/settings/global', GlobalSetting::class)->name('global_setting');
        Route::get('/chatbot-setting', ChatbotSetting::class)->name('chatbot-setting');
    });

});