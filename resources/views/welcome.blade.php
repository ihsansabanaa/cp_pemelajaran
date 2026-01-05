<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CP Pembelajaran SMK - Sistem Manajemen Capaian Pembelajaran</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #0066CC 0%, #003D7A 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 102, 204, 0.15);
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        /* Floating paper animation */
        @keyframes paperFloat {
            0%, 100% {
                transform: translateY(0px) translateX(0px);
            }
            25% {
                transform: translateY(-10px) translateX(5px);
            }
            50% {
                transform: translateY(-5px) translateX(-5px);
            }
            75% {
                transform: translateY(-15px) translateX(3px);
            }
        }
        .paper-float {
            animation: paperFloat 6s ease-in-out infinite;
        }
        .paper-float:hover {
            animation-play-state: paused;
        }
        /* Carousel background animation */
        .carousel-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }
        .carousel-bg.active {
            opacity: 1;
        }
        .carousel-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
        }
    </style>
</head>
<body class="bg-white antialiased" style="font-family: 'Inter', sans-serif;">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-black/40 backdrop-blur-md border-b border-white/10 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo & Brand -->
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('images/kemdiktisaintek-logo.svg') }}" alt="Logo Kemdikbudristek" class="h-10 w-auto">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-white leading-tight">CP Pembelajaran SMK</span>
                        <span class="text-xs text-white/80">Kurikulum Merdeka</span>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3">
                    @auth
                        <!-- User Dropdown -->
                        <div class="relative">
                            <button id="userMenuButton" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-white/20 transition-colors">
                                <div class="w-9 h-9 bg-primary text-white rounded-full flex items-center justify-center font-semibold text-sm">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                                <div class="hidden md:block text-left">
                                    <div class="text-sm font-semibold text-white">{{ auth()->user()->name }}</div>
                                    <div class="text-xs text-white/80">{{ auth()->user()->email }}</div>
                                </div>
                                <svg id="userMenuIcon" class="w-4 h-4 text-white transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div id="userMenuDropdown" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-2xl border border-gray-200" style="z-index: 9999;">
                                <div class="px-4 py-3 border-b border-gray-200">
                                    <div class="text-sm font-semibold text-gray-900">{{ auth()->user()->name }}</div>
                                    <div class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</div>
                                </div>
                                <div class="p-2">
                                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                        Dashboard
                                    </a>
                                    <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                        @csrf
                                        <button type="button" onclick="confirmLogout()" class="w-full flex items-center gap-2 px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-white bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            <span>Login</span>
                        </a>
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-gray-900 bg-white rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-white transition-colors shadow-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            <span>Daftar</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Carousel Background -->
    <section id="hero" class="relative min-h-screen overflow-hidden flex items-center">
        <!-- Carousel Background -->
        <div class="carousel-bg active" style="background-image: url('{{ asset('images/BMTI_2-1536x866.jpg') }}');"></div>
        <div class="carousel-bg" style="background-image: url('{{ asset('images/OIP (1).webp') }}');"></div>
        
        <!-- Content -->
        <div class="relative z-10 w-full pt-24 pb-0 px-4">
            <div class="max-w-7xl mx-auto h-full">
                <div class="grid lg:grid-cols-2 gap-12 h-full min-h-[calc(100vh-6rem)]">
                    <!-- Left: Typography -->
                    <div class="animate-fade-in-up flex flex-col justify-center">
                        <!-- Heading -->
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight drop-shadow-lg">
                            Sistem Manajemen
                            <span class="block mt-2">
                                Capaian Pembelajaran SMK
                            </span>
                        </h1>
                        
                        <!-- Description -->
                        <p class="text-base md:text-lg lg:text-xl text-white/95 mb-10 leading-relaxed drop-shadow-md">
                            Platform digital terintegrasi untuk mengelola capaian pembelajaran SMK se-Indonesia dengan mudah dan terstruktur
                        </p>
                        
                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('register') }}" class="group relative flex items-center justify-center gap-2 rounded-lg border px-8 py-4 bg-white bg-opacity-95 border-white border-opacity-60 backdrop-filter backdrop-blur-xl hover:bg-primary hover:bg-opacity-100 hover:border-primary focus:outline-none focus:ring-2 focus:ring-white transition-all shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 text-gray-900 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                <span class="text-lg font-semibold text-gray-900 group-hover:text-white transition-colors">Mulai Sekarang</span>
                            </a>
                            <a href="#features" class="group relative flex items-center justify-center gap-2 rounded-lg border px-8 py-4 bg-white bg-opacity-10 border-white border-opacity-25 backdrop-filter backdrop-blur-xl hover:bg-primary hover:bg-opacity-100 hover:border-primary focus:outline-none focus:ring-2 focus:ring-white transition-all">
                                <svg class="w-5 h-5 text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-lg font-semibold text-white transition-colors">Pelajari Lebih Lanjut</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right: Student Image -->
                    <div class="hidden lg:flex items-end justify-end relative self-end">
                        <img src="{{ asset('images/siswa.svg') }}" alt="Siswa" class="w-auto h-[85vh] object-contain object-bottom animate-fade-in-up" style="animation-delay: 0.2s;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 px-4 bg-white" id="features">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 mb-4">
                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-primary uppercase tracking-wider">Fitur Unggulan</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Solusi Lengkap Manajemen Pembelajaran</h2>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">
                    Kelola capaian pembelajaran SMK dengan mudah dan terstruktur
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                <a href="/dimensi-profil-lulusan" class="bg-white rounded-2xl shadow-lg card-hover border-2 border-gray-200 hover:border-primary p-6 flex flex-col items-center text-center transition-all cursor-pointer">
                    <div class="w-16 h-16 bg-primary-50 text-primary rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Dimensi Profil Lulusan</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Mengidentifikasi dimensi profil pelajar Pancasila yang menjadi target capaian lulusan SMK</p>
                </a>

                <!-- Card 2 -->
                <a href="/prinsip-pembelajaran" class="bg-white rounded-2xl shadow-lg card-hover border-2 border-gray-200 hover:border-primary p-6 flex flex-col items-center text-center transition-all cursor-pointer">
                    <div class="w-16 h-16 bg-secondary-50 text-secondary rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Prinsip Pembelajaran</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Menerapkan prinsip pembelajaran berpusat pada peserta didik sesuai kurikulum merdeka</p>
                </a>

                <!-- Card 3 -->
                <a href="/pengalaman-belajar" class="bg-white rounded-2xl shadow-lg card-hover border-2 border-gray-200 hover:border-primary p-6 flex flex-col items-center text-center transition-all cursor-pointer">
                    <div class="w-16 h-16 bg-accent-50 text-accent rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Pengalaman Belajar</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Merancang pengalaman belajar bermakna, kontekstual, dan relevan dengan industri</p>
                </a>

                <!-- Card 4 -->
                <a href="/kerangka-pembelajaran" class="bg-white rounded-2xl shadow-lg card-hover border-2 border-gray-200 hover:border-primary p-6 flex flex-col items-center text-center transition-all cursor-pointer">
                    <div class="w-16 h-16 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Kerangka Pembelajaran</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Struktur dan tahapan dalam merancang pengalaman belajar yang efektif</p>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-24 px-4 bg-gray-50" id="about">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left: Content -->
                <div class="space-y-8">
                    <div>
                        <div class="inline-flex items-center gap-2 mb-4">
                            <div class="w-8 h-8 bg-primary-50 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-primary uppercase tracking-wider">Tentang Sistem</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                            Platform Digital Terpadu untuk SMK
                        </h2>
                        <p class="text-base md:text-lg text-gray-600 leading-relaxed">
                            CP Pembelajaran SMK adalah platform digital untuk mengelola data capaian pembelajaran di SMK. Mengintegrasikan seluruh komponen pendidikan kejuruan dengan interface yang user-friendly dan terstruktur.
                        </p>
                    </div>

                    <!-- Benefits Grid -->
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                            <div class="w-12 h-12 bg-primary-50 rounded-lg flex items-center justify-center mb-3">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Kurikulum Merdeka</h3>
                            <p class="text-sm text-gray-600">Terintegrasi dengan standar kurikulum terbaru</p>
                        </div>

                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                            <div class="w-12 h-12 bg-secondary-50 rounded-lg flex items-center justify-center mb-3">
                                <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">User-Friendly</h3>
                            <p class="text-sm text-gray-600">Mudah digunakan untuk semua kalangan</p>
                        </div>

                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                            <div class="w-12 h-12 bg-accent-50 rounded-lg flex items-center justify-center mb-3">
                                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Data Terstruktur</h3>
                            <p class="text-sm text-gray-600">Database terorganisir dengan baik</p>
                        </div>

                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                            <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center mb-3">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Efisien & Cepat</h3>
                            <p class="text-sm text-gray-600">Akses data cepat dan real-time</p>
                        </div>
                    </div>
                </div>

                <!-- Right: Illustration & Stats -->
                <div class="lg:pl-8">
                    <!-- Illustration with integrated floating stats -->
                    <div class="relative min-h-[550px] flex items-center justify-center">
                        <img src="{{ asset('images/Research paper-rafiki.svg') }}" alt="Education Illustration" class="w-full h-auto max-w-2xl mx-auto relative z-0">
                        
                        <!-- Floating Paper Cards - Positioned to look scattered -->
                        <!-- Card 1 - Top Left -->
                        <div class="absolute top-4 left-4 paper-float z-30" style="animation-delay: 0s;">
                            <div class="bg-white rounded-lg p-4 shadow-xl border border-gray-200 transform -rotate-6 hover:rotate-0 transition-all duration-300 hover:scale-110 cursor-pointer">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-10 h-10 bg-primary-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xl font-bold text-gray-900">10+</div>
                                        <p class="text-xs text-gray-600 whitespace-nowrap">Bidang Keahlian</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 - Top Right -->
                        <div class="absolute top-8 right-4 paper-float z-30" style="animation-delay: 0.5s;">
                            <div class="bg-white rounded-lg p-4 shadow-xl border border-gray-200 transform rotate-6 hover:rotate-0 transition-all duration-300 hover:scale-110 cursor-pointer">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-10 h-10 bg-secondary-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xl font-bold text-gray-900">50+</div>
                                        <p class="text-xs text-gray-600 whitespace-nowrap">Program Keahlian</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 - Bottom Left -->
                        <div class="absolute bottom-8 left-8 paper-float z-30" style="animation-delay: 1s;">
                            <div class="bg-white rounded-lg p-4 shadow-xl border border-gray-200 transform rotate-3 hover:rotate-0 transition-all duration-300 hover:scale-110 cursor-pointer">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-10 h-10 bg-accent-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xl font-bold text-gray-900">60+</div>
                                        <p class="text-xs text-gray-600 whitespace-nowrap">Kompetensi Keahlian</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4 - Bottom Right -->
                        <div class="absolute bottom-4 right-8 paper-float z-30" style="animation-delay: 1.5s;">
                            <div class="bg-white rounded-lg p-4 shadow-xl border border-gray-200 transform -rotate-3 hover:rotate-0 transition-all duration-300 hover:scale-110 cursor-pointer">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xl font-bold text-gray-900">157</div>
                                        <p class="text-xs text-gray-600 whitespace-nowrap">Mata Pelajaran</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left: Illustration -->
                <div class="hidden lg:flex items-center justify-center">
                    <img src="{{ asset('images/Teacher-rafiki.svg') }}" alt="Join Illustration" class="w-full h-auto max-w-lg animate-fade-in-up">
                </div>

                <!-- Right: Content -->
                <div class="space-y-6">
                    <div class="inline-flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-accent-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-accent uppercase tracking-wider">Bergabung Sekarang</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">Siap Memulai Perjalanan Anda?</h2>
                    <p class="text-lg md:text-xl text-gray-600 leading-relaxed">
                        Bergabunglah dengan sistem manajemen capaian pembelajaran modern untuk SMK dan tingkatkan kualitas pendidikan kejuruan
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 text-lg font-semibold text-white bg-primary rounded-lg hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Daftar Sekarang
                        </a>
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 text-lg font-semibold text-gray-700 bg-white border-2 border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Sudah Punya Akun? Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <!-- Brand -->
                <div class="md:col-span-1">
                    <div class="flex items-center gap-2 mb-3">
                        <img src="{{ asset('images/kemdiktisaintek-logo.svg') }}" alt="Logo Kemdikbudristek" class="h-10 w-auto">
                        <div class="text-base font-bold">CP Pembelajaran SMK</div>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Platform digital untuk mengelola capaian pembelajaran SMK sesuai Kurikulum Merdeka.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-semibold mb-3">Menu Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#features" class="text-sm text-gray-400 hover:text-white transition-colors">Fitur</a></li>
                        <li><a href="#about" class="text-sm text-gray-400 hover:text-white transition-colors">Tentang</a></li>
                        <li><a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Daftar</a></li>
                    </ul>
                </div>

                <!-- Information -->
                <div>
                    <h3 class="font-semibold mb-3">Informasi</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition-colors">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition-colors">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition-colors">Bantuan</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-white transition-colors">Kontak</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom -->
            <div class="border-t border-gray-800 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-xs text-gray-500 text-center md:text-left">
                        © 2025 Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi
                    </p>
                    <div class="flex gap-2">
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-800 text-gray-400 hover:bg-gray-700 hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-800 text-gray-400 hover:bg-gray-700 hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-800 text-gray-400 hover:bg-gray-700 hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Carousel Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carouselBgs = document.querySelectorAll('.carousel-bg');
            let currentIndex = 0;
            
            function changeSlide() {
                // Remove active class from current
                carouselBgs[currentIndex].classList.remove('active');
                
                // Move to next slide
                currentIndex = (currentIndex + 1) % carouselBgs.length;
                
                // Add active class to next
                carouselBgs[currentIndex].classList.add('active');
            }
            
            // Change slide every 5 seconds
            setInterval(changeSlide, 5000);

            // Navbar scroll effect
            const navbar = document.querySelector('nav');
            const heroSection = document.querySelector('#hero');
            
            window.addEventListener('scroll', function() {
                const heroBottom = heroSection.offsetHeight;
                
                if (window.scrollY > heroBottom - 100) {
                    // Passed hero section - white navbar
                    navbar.classList.remove('bg-black/40', 'border-white/10');
                    navbar.classList.add('bg-white/60', 'border-gray-200/50', 'shadow-lg');
                    
                    // Change brand text color
                    const brandTitle = navbar.querySelector('.text-white.leading-tight');
                    const brandSubtitle = navbar.querySelector('.text-white\\/80');
                    if (brandTitle) {
                        brandTitle.classList.remove('text-white');
                        brandTitle.classList.add('text-gray-900');
                    }
                    if (brandSubtitle) {
                        brandSubtitle.classList.remove('text-white/80');
                        brandSubtitle.classList.add('text-gray-500');
                    }
                    
                    // Change login button
                    const loginBtn = navbar.querySelector('a[href*="login"]');
                    if (loginBtn) {
                        loginBtn.classList.remove('text-white', 'bg-white/10', 'border-white/20', 'hover:bg-white/20', 'focus:ring-white/50');
                        loginBtn.classList.add('text-gray-700', 'bg-white', 'border-gray-300', 'hover:bg-gray-50', 'focus:ring-primary');
                    }
                    
                    // Change register button
                    const registerBtn = navbar.querySelector('a[href*="register"]');
                    if (registerBtn) {
                        registerBtn.classList.remove('text-gray-900', 'bg-white', 'hover:bg-gray-50', 'focus:ring-white');
                        registerBtn.classList.add('text-white', 'bg-primary', 'hover:bg-primary-600', 'focus:ring-primary');
                    }

                    // Change user dropdown text colors (if authenticated)
                    @auth
                    const userName = navbar.querySelector('#userMenuButton .text-white.font-semibold');
                    const userEmail = navbar.querySelector('#userMenuButton .text-white\\/80');
                    const userIcon = navbar.querySelector('#userMenuIcon');
                    const userMenuBtn = navbar.querySelector('#userMenuButton');
                    
                    if (userName) {
                        userName.classList.remove('text-white');
                        userName.classList.add('text-gray-900');
                    }
                    if (userEmail) {
                        userEmail.classList.remove('text-white/80');
                        userEmail.classList.add('text-gray-500');
                    }
                    if (userIcon) {
                        userIcon.classList.remove('text-white');
                        userIcon.classList.add('text-gray-500');
                    }
                    if (userMenuBtn) {
                        userMenuBtn.classList.remove('hover:bg-white/20');
                        userMenuBtn.classList.add('hover:bg-gray-100');
                    }
                    @endauth
                } else {
                    // In hero section - dark navbar
                    navbar.classList.remove('bg-white/60', 'border-gray-200/50', 'shadow-lg');
                    navbar.classList.add('bg-black/40', 'border-white/10');
                    
                    // Change brand text color back
                    const brandTitle = navbar.querySelector('.text-gray-900.leading-tight');
                    const brandSubtitle = navbar.querySelector('.text-gray-500');
                    if (brandTitle) {
                        brandTitle.classList.remove('text-gray-900');
                        brandTitle.classList.add('text-white');
                    }
                    if (brandSubtitle) {
                        brandSubtitle.classList.remove('text-gray-500');
                        brandSubtitle.classList.add('text-white/80');
                    }
                    
                    // Change login button back
                    const loginBtn = navbar.querySelector('a[href*="login"]');
                    if (loginBtn) {
                        loginBtn.classList.remove('text-gray-700', 'bg-white', 'border-gray-300', 'hover:bg-gray-50', 'focus:ring-primary');
                        loginBtn.classList.add('text-white', 'bg-white/10', 'border-white/30', 'hover:bg-white/20', 'focus:ring-white/50');
                    }
                    
                    // Change register button back
                    const registerBtn = navbar.querySelector('a[href*="register"]');
                    if (registerBtn) {
                        registerBtn.classList.remove('hover:bg-primary-700', 'border-primary');
                        registerBtn.classList.add('hover:bg-primary-600');
                    }

                    // Change user dropdown text colors back (if authenticated)
                    @auth
                    const userName = navbar.querySelector('#userMenuButton .text-gray-900.font-semibold');
                    const userEmail = navbar.querySelector('#userMenuButton .text-gray-500');
                    const userIcon = navbar.querySelector('#userMenuIcon');
                    const userMenuBtn = navbar.querySelector('#userMenuButton');
                    
                    if (userName) {
                        userName.classList.remove('text-gray-900');
                        userName.classList.add('text-white');
                    }
                    if (userEmail) {
                        userEmail.classList.remove('text-gray-500');
                        userEmail.classList.add('text-white/80');
                    }
                    if (userIcon) {
                        userIcon.classList.remove('text-gray-500');
                        userIcon.classList.add('text-white');
                    }
                    if (userMenuBtn) {
                        userMenuBtn.classList.remove('hover:bg-gray-100');
                        userMenuBtn.classList.add('hover:bg-white/20');
                    }
                    @endauth
                }
            });
        });

        // User Menu Dropdown (only if user is authenticated)
        @auth
        const userMenuButton = document.getElementById('userMenuButton');
        const userMenuDropdown = document.getElementById('userMenuDropdown');
        const userMenuIcon = document.getElementById('userMenuIcon');

        if (userMenuButton && userMenuDropdown) {
            userMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                userMenuDropdown.classList.toggle('hidden');
                userMenuIcon.classList.toggle('rotate-180');
            });

            document.addEventListener('click', function(e) {
                if (!userMenuButton.contains(e.target) && !userMenuDropdown.contains(e.target)) {
                    userMenuDropdown.classList.add('hidden');
                    userMenuIcon.classList.remove('rotate-180');
                }
            });
        }

        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                document.getElementById('logoutForm').submit();
            }
        }
        @endauth
    </script>
</body>
</html>
