<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Show the email verification notice.
     */
    public function notice()
    {
        return view('auth.verify-email');
    }

    /**
     * Handle email verification.
     */
    public function verify(Request $request)
    {
        // Get user by ID from URL parameter
        $user = \App\Models\User::find($request->route('id'));
        
        if (!$user) {
            return redirect('/login')->with('error', 'User tidak ditemukan.');
        }

        // Check if hash is valid
        if (! hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            return redirect('/login')->with('error', 'Link verifikasi tidak valid.');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect('/login')->with('info', 'Email sudah diverifikasi sebelumnya. Silakan login.');
        }

        // Mark email as verified
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
            
            // Debug log
            \Log::info('Email verification successful', [
                'user_id' => $user->id,
                'email' => $user->email,
                'verified_at' => $user->email_verified_at
            ]);
            
            return redirect('/login')->with('success', '✅ Email berhasil diverifikasi! Sekarang Anda bisa login dengan akun terverifikasi.');
        }
        
        return redirect('/login')->with('error', 'Terjadi kesalahan saat verifikasi email.');
    }

    /**
     * Resend verification email.
     */
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/dashboard');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Link verifikasi telah dikirim ulang ke email Anda.');
    }
}
