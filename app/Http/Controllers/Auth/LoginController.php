<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        \Log::info('Login attempt started', [
            'email' => $request->email,
            'has_password' => !empty($request->password),
            'remember' => $request->remember ? 'yes' : 'no',
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Attempt to login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $user = Auth::user();

            \Log::info('Auth attempt successful', [
                'user_id' => $user->id,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'hasVerifiedEmail_result' => $user->hasVerifiedEmail()
            ]);

            // WAJIB: Cek apakah email sudah diverifikasi
            if (!$user->hasVerifiedEmail()) {
                // Logout user immediately jika email belum diverifikasi
                Auth::logout();
                
                \Log::warning('Login blocked: Email not verified', [
                    'email' => $user->email,
                    'email_verified_at' => $user->email_verified_at
                ]);

                return redirect()->route('verification.notice')
                    ->with('error', 'Akun Anda belum diverifikasi! Silakan cek email Anda dan klik link verifikasi terlebih dahulu sebelum login.');
            }

            // Regenerate session hanya setelah verifikasi email berhasil
            $request->session()->regenerate();
            
            \Log::info('Login successful: Redirecting to dashboard', [
                'user_id' => $user->id,
                'email' => $user->email,
                'session_id' => $request->session()->getId()
            ]);

            return redirect()->route('dashboard')->with('success', 'Login berhasil! Selamat datang.');
        }

        // Login failed
        \Log::info('Login Failed', ['email' => $request->email]);

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('success', 'Logout berhasil!');
    }
}
