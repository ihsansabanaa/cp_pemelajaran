<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        // Redirect ke dashboard jika sudah login
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }

    // Menampilkan form register
    public function showRegisterForm()
    {
        // Redirect ke dashboard jika sudah login
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Registrasi berhasil!');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil!');
    }

    // Dashboard (halaman setelah login)
    public function dashboard()
    {
        $bidangKeahlian = \App\Models\BidangKeahlian::all();
        $fase = \App\Models\Fase::all();
        
        return view('dashboard', compact('bidangKeahlian', 'fase'));
    }

    // Redirect to Google OAuth
    public function redirectToGoogle()
    {
        // Check if Google credentials are configured
        if (empty(config('services.google.client_id')) || empty(config('services.google.client_secret'))) {
            return redirect('/login')->with('error', 'Google Login belum dikonfigurasi. Silakan hubungi administrator.');
        }
        
        return Socialite::driver('google')->redirect();
    }

    // Handle Google OAuth callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Find or create user
            $user = User::where('email', $googleUser->getEmail())->first();
            
            if ($user) {
                // User exists, update google_id if not set
                if (!$user->google_id) {
                    $user->google_id = $googleUser->getId();
                    $user->save();
                }
            } else {
                // Create new user
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now(), // Auto verify email for Google users
                    'password' => bcrypt(Str::random(24)), // Random password
                ]);
            }
            
            // Login the user
            Auth::login($user, true);
            
            return redirect()->intended('dashboard')->with('success', 'Login dengan Google berhasil!');
            
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Gagal login dengan Google: ' . $e->getMessage());
        }
    }
}
