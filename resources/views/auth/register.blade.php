<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - CP Pembelajaran</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center antialiased relative overflow-hidden">
    <!-- Split Background: 60% Image, 40% White -->
    <div class="absolute inset-0 z-0 flex">
        <!-- Left: Image (60%) -->
        <div class="w-[60%] relative">
            <img src="{{ asset('images/background.JPEG') }}" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <!-- Right: White (40%) with Register Card -->
        <div class="w-[40%] bg-white overflow-y-auto relative">
            <!-- Back to Home Button -->
            <a href="{{ url('/') }}" class="absolute top-6 left-6 z-10 flex items-center gap-2 text-gray-600 hover:text-primary transition-colors group">
                <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span class="text-sm font-medium">Beranda</span>
            </a>
            
            <div class="min-h-full flex items-center justify-center p-6 pt-20">
                <div class="w-full max-w-lg py-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/kemdiktisaintek-logo.svg') }}" alt="Kemdikbudristek" class="h-20">
            </div>
            <h1 class="text-3xl font-bold text-gray-900">Buat Akun Baru</h1>
            <p class="text-sm text-gray-600 mt-2">Daftar untuk mengakses sistem</p>
        </div>

        <!-- Form -->
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent @error('name') border-red-500 @enderror" 
                    required
                />
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    placeholder="nama@email.com" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent @error('email') border-red-500 @enderror" 
                    required
                />
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Minimal 8 karakter" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent @error('password') border-red-500 @enderror" 
                    required
                />
                <p class="mt-1 text-sm text-gray-500">Minimal 8 karakter</p>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    placeholder="Ulangi password" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" 
                    required
                />
            </div>

            <button type="submit" class="w-full px-4 py-3 text-white font-semibold bg-primary rounded-lg hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors">Daftar</button>
        </form>

        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white text-gray-500">atau</span>
            </div>
        </div>

        <a href="#" class="w-full flex items-center justify-center gap-3 px-4 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors">
            <svg width="20" height="20" viewBox="0 0 48 48">
                <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                <path fill="none" d="M0 0h48v48H0z"/>
            </svg>
            Daftar dengan Google
        </a>

        <div class="bg-blue-50 border border-blue-200 text-blue-800 rounded-lg p-4 mt-6 flex items-start gap-3">
            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <div class="text-xs">
                <div class="font-bold mb-2">📧 Informasi Penting:</div>
                <ul class="space-y-1">
                    <li>• Gunakan <strong>email asli</strong> Anda</li>
                    <li>• Setelah registrasi, cek email untuk verifikasi</li>
                    <li>• Email dikirim dari: <strong>gtk1313131@gmail.com</strong></li>
                    <li>• Cek folder spam jika tidak menerima email</li>
                </ul>
            </div>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">Sudah punya akun? <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Login di sini</a></p>
        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
