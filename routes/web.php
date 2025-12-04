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

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
    // API Routes for Dashboard
    Route::get('/api/program-keahlian/{idBidang}', [\App\Http\Controllers\Api\ApiController::class, 'getProgramKeahlian']);
    Route::get('/api/kompetensi-keahlian/{idProgram}', [\App\Http\Controllers\Api\ApiController::class, 'getKompetensiKeahlian']);
    Route::get('/api/mata-pelajaran/{idKompetensi}/{idFase}', [\App\Http\Controllers\Api\ApiController::class, 'getMataPelajaran']);
    Route::post('/api/cp-detail', [\App\Http\Controllers\Api\ApiController::class, 'getCpDetail']);
});
