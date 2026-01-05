<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Feature Pages
Route::get('/dimensi-profil-lulusan', function () {
    return view('dimensi-profil-lulusan');
})->name('dimensi-profil-lulusan');

Route::get('/prinsip-pembelajaran', function () {
    return view('prinsip-pembelajaran');
})->name('prinsip-pembelajaran');

Route::get('/pengalaman-belajar', function () {
    return view('pengalaman-belajar');
})->name('pengalaman-belajar');

Route::get('/kerangka-pembelajaran', function () {
    return view('kerangka-pembelajaran');
})->name('kerangka-pembelajaran');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Google OAuth Routes
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // RPP Routes
    Route::get('/rpp/create', [\App\Http\Controllers\RppController::class, 'create'])->name('rpp.create');
    Route::get('/rpp', [\App\Http\Controllers\RppController::class, 'index'])->name('rpp.index');
    Route::get('/rpp/{id}', [\App\Http\Controllers\RppController::class, 'show'])->name('rpp.show');
    Route::post('/api/rpp/store', [\App\Http\Controllers\RppController::class, 'store'])->name('rpp.store');
    Route::post('/api/rpp/save-generated', [\App\Http\Controllers\RppController::class, 'saveGenerated'])->name('rpp.saveGenerated');
    Route::delete('/api/rpp/{id}', [\App\Http\Controllers\RppController::class, 'destroy'])->name('rpp.destroy');
    Route::get('/rpp/{id}/download-pdf', [\App\Http\Controllers\RppController::class, 'downloadPdf'])->name('rpp.downloadPdf');

    // API Routes for Dashboard
    Route::get('/api/program-keahlian/{idBidang}', [\App\Http\Controllers\Api\ApiController::class, 'getProgramKeahlian']);
    Route::get('/api/konsentrasi-keahlian/{idProgram}', [\App\Http\Controllers\Api\ApiController::class, 'getKonsentrasiKeahlian']);
    Route::get('/api/mata-pelajaran/{idKonsentrasi}/{idFase}', [\App\Http\Controllers\Api\ApiController::class, 'getMataPelajaran']);
    Route::post('/api/cp-detail', [\App\Http\Controllers\Api\ApiController::class, 'getCpDetail']);
});
