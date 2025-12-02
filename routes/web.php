<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\GoogleController;

Route::get('/', function () {
    return view('welcome');
});

// Debug route untuk cek user by email
Route::get('/check/{email}', function ($email) {
    $user = DB::table('users')->where('email', $email)->first();
    if ($user) {
        return response()->json([
            'email' => $user->email,
            'name' => $user->name,
            'email_verified_at' => $user->email_verified_at,
            'is_verified' => !is_null($user->email_verified_at),
            'password_set' => !empty($user->password)
        ]);
    }
    return response()->json(['error' => 'User not found']);
});

// Debug route untuk test login flow
Route::get('/debug-user/{id}', function ($id) {
    $user = \App\Models\User::find($id);
    if ($user) {
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'email_verified_at_raw' => $user->getAttributes()['email_verified_at'],
            'hasVerifiedEmail' => $user->hasVerifiedEmail(),
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at
        ]);
    }
    return response()->json(['error' => 'User not found']);
});

// Debug route untuk test dashboard access
Route::get('/test-dashboard/{id}', function ($id) {
    $user = \App\Models\User::find($id);
    if (!$user) {
        return response()->json(['error' => 'User not found']);
    }
    
    // Login as this user for testing
    Auth::login($user);
    
    return response()->json([
        'user_logged_in' => Auth::check(),
        'user_id' => Auth::id(),
        'user_email' => Auth::user()->email,
        'hasVerifiedEmail' => Auth::user()->hasVerifiedEmail(),
        'dashboard_access' => 'Should be able to access dashboard now',
        'redirect_url' => route('dashboard')
    ]);
});

// Debug route untuk lihat log terakhir
Route::get('/logs', function () {
    $logFile = storage_path('logs/laravel.log');
    if (file_exists($logFile)) {
        $logs = file_get_contents($logFile);
        $logLines = explode("\n", $logs);
        $recentLogs = array_slice($logLines, -50); // 50 baris terakhir
        return response('<pre>' . implode("\n", $recentLogs) . '</pre>');
    }
    return 'Log file not found';
});



// Public Information Routes
Route::get('/dimensi-profil-lulusan', function () {
    return view('dimensi-profil-lulusan');
})->name('dimensi.profil.lulusan');

Route::get('/prinsip-pembelajaran', function () {
    return view('prinsip-pembelajaran');
})->name('prinsip.pembelajaran');

Route::get('/pengalaman-belajar', function () {
    return view('pengalaman-belajar');
})->name('pengalaman.belajar');

Route::get('/kerangka-pembelajaran', function () {
    return view('kerangka-pembelajaran');
})->name('kerangka.pembelajaran');

// Authentication Routes (Guest only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    
    // Google OAuth Routes
    Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
});

// Email Verification Routes
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['signed'])->name('verification.verify');

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [VerificationController::class, 'notice'])->name('verification.notice');
    Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
        ->middleware(['throttle:6,1'])->name('verification.resend');
});

// Dashboard route - hanya untuk user yang login dan email terverifikasi
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// API routes untuk filter dropdown (AJAX)
Route::middleware('auth')->group(function () {
    Route::get('/api/program-keahlian/{id_bidang}', [App\Http\Controllers\DashboardController::class, 'getProgramKeahlian']);
    Route::get('/api/kompetensi-keahlian/{id_program}', [App\Http\Controllers\DashboardController::class, 'getKompetensiKeahlian']);
    Route::get('/api/mata-pelajaran/{id_kompetensi}/{id_fase}', [App\Http\Controllers\DashboardController::class, 'getMataPelajaran']);
    Route::post('/api/cp-detail', [App\Http\Controllers\DashboardController::class, 'getCpDetail']);
});

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

