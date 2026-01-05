<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EduPlan - Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- PDF Generation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #4F46E5;
            --primary-dark: #4338CA;
            --primary-light: #EEF2FF;
            --secondary: #10B981;
            --dark: #1F2937;
            --light: #F9FAFB;
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-400: #9CA3AF;
            --gray-500: #6B7280;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-800: #1F2937;
            --gray-900: #111827;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --info: #3B82F6;
        }

        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f9fafb;
            color: #1f2937;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            max-width: 100vw;
        }

        /* Base Components */
        .card {
            background-color: #ffffff;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            max-width: 100%;
        }

        .card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Ensure all grids don't overflow */
        .grid {
            max-width: 100%;
        }

        /* Ensure hero component fits properly */
        .hero {
            max-width: 100%;
            overflow: hidden;
        }

        /* Ensure all elements respect container width */
        * {
            box-sizing: border-box;
        }

        /* Prevent text overflow */
        h1, h2, h3, h4, h5, h6, p {
            overflow-wrap: break-word;
            word-wrap: break-word;
        }

        /* Ensure images don't overflow */
        img {
            max-width: 100%;
            height: auto;
        }

        /* Responsive tables */
        table {
            max-width: 100%;
            overflow-x: auto;
            display: block;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.625rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 0.875rem;
            line-height: 1.25rem;
            transition: all 0.2s ease;
            gap: 0.5rem;
            border: 1px solid transparent;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #4F46E5;
            color: white;
            border-color: #4F46E5;
        }

        .btn-primary:hover {
            background-color: #4338CA;
            border-color: #4338CA;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid #d1d5db;
            color: #374151;
        }

        .btn-outline:hover {
            background-color: #f9fafb;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: #4b5563;
            font-weight: 500;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .nav-link:hover {
            background-color: #f3f4f6;
            color: #4F46E5;
        }

        .nav-link.active {
            background-color: #eef2ff;
            color: #4F46E5;
            font-weight: 600;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }
            100% {
                background-position: 1000px 0;
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }

        .animate-slide-in-up {
            animation: slideInUp 0.4s ease-out forwards;
        }

        .shimmer-effect {
            background: linear-gradient(90deg,
                rgba(255,255,255,0) 0%,
                rgba(255,255,255,0.3) 50%,
                rgba(255,255,255,0) 100%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }

        /* Layout Utilities */
        .page-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
        }

        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            width: 100%;
            overflow-x: hidden;
        }

        @media (min-width: 1024px) {
            .content-wrapper {
                flex-direction: row;
            }
        }

        /* Container utility */
        .container {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .main-content {
            position: fixed;
            top: 4rem; /* Below navbar */
            left: 0;
            right: 0;
            bottom: 0;
            padding-top: 1rem;
            padding-bottom: 4rem;
            padding-left: 1rem;
            padding-right: 1rem;
            width: 100%;
            margin-left: 0;
            max-width: 100vw;
            overflow-x: hidden;
            overflow-y: auto; /* Allow vertical scrolling */
            height: calc(100vh - 4rem); /* Full height minus navbar */
        }

        @media (min-width: 1024px) {
            .main-content {
                left: 16rem; /* Start after sidebar */
                top: 4rem;
                padding-top: 2rem;
                padding-bottom: 4rem;
                padding-left: 2rem;
                padding-right: 2rem;
                width: calc(100% - 16rem);
                max-width: calc(100vw - 16rem);
                height: calc(100vh - 4rem);
            }
        }
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        #langkah_content h3 {
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.1);
            transition: all 0.3s ease;
        }

        #langkah_content h3:hover {
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.15);
            transform: translateX(4px);
        }

        #langkah_content ul, #langkah_content ol {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            border-left: 4px solid #3b82f6;
        }

        #langkah_content li {
            padding: 0.25rem 0;
        }

        #langkah_content strong {
            border-radius: 0.25rem;
        }

        #langkah_content em {
            border-radius: 0.25rem;
        }

        #langkah_content p {
            text-align: justify;
        }

        /* Print styles */
        @media print {
            #langkah_content {
                font-size: 11pt;
            }
            #langkah_content h1 {
                font-size: 18pt;
                color: #1e40af !important;
                -webkit-text-fill-color: #1e40af !important;
            }
            #langkah_content h3 {
                background: #eff6ff !important;
                print-color-adjust: exact;
            }
        }
    </style>
</head>
</head>
<body class="page-container">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 flex flex-col z-50 transform transition-transform duration-300 ease-in-out lg:translate-x-0 -translate-x-full" id="sidebar">
        <!-- Logo -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/kemdiktisaintek-logo.svg') }}" alt="Logo Kemdikbudristek" class="h-10 w-auto">
                <div>
                    <h1 class="font-bold text-gray-900">EduPlan</h1>
                    <p class="text-xs text-gray-500">Kurikulum Merdeka</p>
                </div>
            </div>
            <button id="closeSidebar" class="lg:hidden text-gray-500 hover:text-gray-700 focus:outline-none">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="nav-link active">
                <i class="fas fa-home w-5 text-center"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('rpp.index') }}" class="nav-link">
                <i class="fas fa-book-open w-5 text-center"></i>
                <span>RPP Saya</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-graduation-cap w-5 text-center"></i>
                <span>Mata Pelajaran</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-chart-line w-5 text-center"></i>
                <span>Analisis</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-cog w-5 text-center"></i>
                <span>Pengaturan</span>
            </a>
        </nav>

        <!-- User Profile -->
        <div class="p-4 border-t border-gray-100 mt-auto">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-semibold flex-shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors focus:outline-none">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Mobile header -->
    <header class="fixed top-0 right-0 left-0 bg-white border-b border-gray-200 z-40 lg:left-64 transition-all duration-300">
        <div class="flex items-center justify-between h-16 px-4 lg:px-6">
            <div class="flex items-center gap-4">
                <button id="openSidebar" class="text-gray-600 hover:text-gray-900 focus:outline-none lg:hidden">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-lg font-bold text-gray-900 hidden lg:block">Dashboard</h1>
            </div>

            <div class="flex-1 flex justify-end items-center gap-4">
                <div class="relative max-w-xl lg:w-80">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input
                        type="text"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-sm"
                        placeholder="Cari RPP, mata pelajaran..."
                    >
                </div>

                <div class="flex items-center gap-2">
                    <button class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                        <i class="fas fa-bell"></i>
                        <span class="sr-only">Notifikasi</span>
                    </button>

                    <div class="hidden lg:block h-8 w-px bg-gray-200 mx-1"></div>

                    <div class="lg:hidden">
                        <div class="w-9 h-9 rounded-full bg-primary text-white flex items-center justify-center font-semibold text-sm">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container mx-auto px-4 max-w-full">
            <!-- Welcome Section -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm mb-6 overflow-hidden">
                <div class="relative bg-gradient-to-br from-primary/5 via-primary/10 to-transparent">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-secondary/5 rounded-full blur-3xl"></div>

                    <div class="relative px-6 py-8 sm:px-8 sm:py-10">
                        <div class="max-w-4xl">
                            <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-primary/10 text-primary rounded-full mb-4">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm font-semibold">Dashboard Guru</span>
                            </div>

                            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3">
                                Selamat Datang, <span class="text-primary">{{ auth()->user()->name }}</span>! 👋
                            </h1>

                            <p class="text-base sm:text-lg text-gray-600 leading-relaxed max-w-3xl">
                                Mari mulai membuat Rencana Pelaksanaan Pembelajaran yang berkesadaran, bermakna, dan menggembirakan
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success shadow-md mb-4 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-5 w-5" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Filter Card dengan Tabs -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <!-- Header dengan gradient -->
                <div class="bg-primary px-5 py-3">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-white">Filter Capaian Pembelajaran</h2>
                            <p class="text-white/80 text-xs mt-0.5">Pilih jenis kurikulum untuk melihat CP yang tersedia</p>
                        </div>
                    </div>
                </div>

                <!-- Modern Tabs with Segmented Control -->
                <div class="p-5 pb-0">
                    <div class="bg-gray-100 rounded-full p-1.5 inline-flex gap-1 w-full max-w-2xl mx-auto">
                        <button id="tab_kejuruan" class="flex-1 px-6 py-3 rounded-full font-semibold text-sm bg-primary text-white shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-[1.02]">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span>Filter Kejuruan</span>
                                <span class="hidden sm:inline text-xs opacity-70">· SMK</span>
                            </div>
                        </button>

                        <button id="tab_umum" class="flex-1 px-6 py-3 rounded-full font-semibold text-sm bg-transparent text-gray-600 transition-all duration-300 hover:text-gray-900 hover:bg-gray-200">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                <span>Filter Umum</span>
                                <span class="hidden sm:inline text-xs opacity-70">· Fase A-F</span>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="p-5">
                    <!-- Filter Kejuruan -->
                    <div id="filter_kejuruan">
                        <div class="space-y-5">
                            <!-- Step Indicators -->
                            <div class="flex items-center mb-8 overflow-x-auto pb-2">
                                <div class="flex items-center gap-2 sm:gap-4 min-w-max">
                                    <div class="flex items-center gap-1.5 sm:gap-2">
                                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-gradient-to-br from-[#0066CC] to-[#003D7A] text-white font-bold flex items-center justify-center text-xs sm:text-sm flex-shrink-0">1</div>
                                        <span class="font-semibold text-gray-700 text-sm sm:text-base whitespace-nowrap">Bidang</span>
                                    </div>
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                    <div class="flex items-center gap-1.5 sm:gap-2">
                                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-gray-200 text-gray-500 font-bold flex items-center justify-center text-xs sm:text-sm flex-shrink-0">2</div>
                                        <span class="font-semibold text-gray-500 text-sm sm:text-base whitespace-nowrap">Program</span>
                                    </div>
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                    <div class="flex items-center gap-1.5 sm:gap-2">
                                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-gray-200 text-gray-500 font-bold flex items-center justify-center text-xs sm:text-sm flex-shrink-0">3</div>
                                        <span class="font-semibold text-gray-500 text-sm sm:text-base whitespace-nowrap">Konsentrasi</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                <!-- Bidang Keahlian -->
                                <div class="bg-primary-50 p-5 rounded-xl border-2 border-primary-100 hover:border-primary transition-all">
                                    <div class="flex items-start justify-between mb-4">
                                        <div>
                                            <label class="block text-sm font-bold text-gray-900 mb-1">Bidang Keahlian</label>
                                            <p class="text-xs text-gray-500">Pilih bidang keahlian terlebih dahulu</p>
                                        </div>
                                        <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full">Wajib</span>
                                    </div>
                                    <select id="bidang_keahlian" class="w-full px-4 py-3 bg-white border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm text-gray-900 font-medium">
                                        <option value="" disabled selected>-- Pilih Bidang Keahlian --</option>
                                        @foreach($bidangKeahlian as $bidang)
                                            <option value="{{ $bidang->id_bidang }}">{{ $bidang->nama_bidang }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Program Keahlian -->
                                <div class="bg-secondary-50 p-5 rounded-xl border-2 border-secondary-100 hover:border-secondary transition-all">
                                    <div class="flex items-start justify-between mb-4">
                                        <div>
                                            <label class="block text-sm font-bold text-gray-900 mb-1">Program Keahlian</label>
                                            <p class="text-xs text-gray-500">Fase E - Pilih setelah bidang keahlian</p>
                                        </div>
                                        <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full">Wajib</span>
                                    </div>
                                    <select id="program_keahlian" class="w-full px-4 py-3 bg-white border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary/20 focus:border-secondary transition-all text-sm text-gray-900 font-medium disabled:bg-gray-100 disabled:cursor-not-allowed" disabled>
                                        <option value="" disabled selected>-- Pilih Program Keahlian --</option>
                                    </select>
                                </div>

                                <!-- Konsentrasi Keahlian -->
                                <div class="bg-accent-50 p-5 rounded-xl border-2 border-accent-100 hover:border-accent transition-all lg:col-span-2">
                                    <div class="flex items-start justify-between mb-4">
                                        <div>
                                            <label class="block text-sm font-bold text-gray-900 mb-1">Konsentrasi Keahlian</label>
                                            <p class="text-xs text-gray-500">Fase F - Opsional, hanya untuk tingkat lanjut</p>
                                        </div>
                                        <span class="px-3 py-1 bg-gray-400 text-white text-xs font-bold rounded-full">Opsional</span>
                                    </div>
                                    <select id="konsentrasi_keahlian" class="w-full px-4 py-3 bg-white border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-accent/20 focus:border-accent transition-all text-sm text-gray-900 font-medium disabled:bg-gray-100 disabled:cursor-not-allowed" disabled>
                                        <option value="" disabled selected>-- Pilih Konsentrasi Keahlian --</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Info Card -->
                            <div class="bg-primary rounded-xl p-5 text-white shadow-md mt-8">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-base mb-2">💡 Panduan Penggunaan</h4>
                                        <ul class="space-y-1.5 text-sm">
                                            <li class="flex items-start gap-2">
                                                <span class="font-bold text-yellow-300">→</span>
                                                <span><strong>CP Fase E:</strong> Pilih Bidang Keahlian → Pilih Program Keahlian → Klik tombol pencarian</span>
                                            </li>
                                            <li class="flex items-start gap-2">
                                                <span class="font-bold text-yellow-300">→</span>
                                                <span><strong>CP Fase F:</strong> Pilih Bidang → Program → Konsentrasi Keahlian → Klik tombol pencarian</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <div class="flex justify-end pt-4">
                                <button type="button" id="btn_cari_kejuruan" class="group relative inline-flex items-center gap-3 px-8 py-3.5 bg-primary text-white font-bold rounded-xl hover:shadow-xl hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all duration-300 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100" disabled>
                                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    <span class="text-lg">Lihat Capaian Pembelajaran</span>
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Umum -->
                    <div id="filter_umum" class="hidden">
                        <div class="space-y-8">
                            <!-- Step Indicators -->
                            <div class="flex items-center mb-8 overflow-x-auto pb-2">
                                <div class="flex items-center gap-2 sm:gap-4 min-w-max">
                                    <div class="flex items-center gap-1.5 sm:gap-2">
                                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-primary text-white font-bold flex items-center justify-center text-xs sm:text-sm flex-shrink-0 shadow-lg shadow-primary/30">1</div>
                                        <span class="font-semibold text-gray-700 text-sm sm:text-base whitespace-nowrap">Fase</span>
                                    </div>
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                    <div class="flex items-center gap-1.5 sm:gap-2">
                                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-gray-200 text-gray-500 font-bold flex items-center justify-center text-xs sm:text-sm flex-shrink-0">2</div>
                                        <span class="font-semibold text-gray-500 text-sm sm:text-base whitespace-nowrap">Mata Pelajaran</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Fase -->
                                <div class="bg-primary-50 p-6 rounded-2xl border-2 border-primary-100 hover:border-primary transition-all">
                                    <div class="flex items-start justify-between mb-4">
                                        <div>
                                            <label class="block text-sm font-bold text-gray-900 mb-1">Fase Pembelajaran</label>
                                            <p class="text-xs text-gray-500">Pilih fase terlebih dahulu</p>
                                        </div>
                                        <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full">Wajib</span>
                                    </div>
                                    <select id="fase_umum" class="w-full px-4 py-3.5 bg-white border-2 border-gray-300 rounded-xl focus:ring-4 focus:ring-primary/20 focus:border-primary transition-all text-gray-900 font-medium">
                                        <option value="" disabled selected>-- Pilih Fase --</option>
                                        @foreach($fase as $f)
                                            <option value="{{ $f->id_fase }}">Fase {{ $f->nama_fase }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Mata Pelajaran -->
                                <div class="bg-secondary-50 p-6 rounded-2xl border-2 border-secondary-100 hover:border-secondary transition-all">
                                    <div class="flex items-start justify-between mb-4">
                                        <div>
                                            <label class="block text-sm font-bold text-gray-900 mb-1">Mata Pelajaran</label>
                                            <p class="text-xs text-gray-500">Pilih setelah memilih fase</p>
                                        </div>
                                        <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full">Wajib</span>
                                    </div>
                                    <select id="mata_pelajaran_umum" class="w-full px-4 py-3.5 bg-white border-2 border-gray-300 rounded-xl focus:ring-4 focus:ring-secondary/20 focus:border-secondary transition-all text-gray-900 font-medium disabled:bg-gray-100 disabled:cursor-not-allowed" disabled>
                                        <option value="" disabled selected>-- Pilih Mata Pelajaran --</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Info Card -->
                            <div class="bg-primary rounded-2xl p-6 text-white shadow-lg">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-lg mb-2">📚 Mata Pelajaran Umum</h4>
                                        <p class="text-white/90">Filter ini untuk mencari Capaian Pembelajaran pada mata pelajaran umum seperti Matematika, Bahasa Indonesia, IPA, dan mata pelajaran umum lainnya berdasarkan fase pembelajaran.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <div class="flex justify-end pt-4">
                                <button type="button" id="btn_cari_umum" class="group relative inline-flex items-center gap-3 px-10 py-4 bg-primary text-white font-bold rounded-2xl hover:shadow-2xl hover:scale-105 focus:outline-none focus:ring-4 focus:ring-primary/50 transition-all duration-300 shadow-xl disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100" disabled>
                                    <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    <span class="text-lg">Lihat Capaian Pembelajaran</span>
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Results Card -->
            <div id="results_card" class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hidden mt-6">
                <div class="bg-primary px-5 py-3">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-white">Hasil Pencarian</h2>
                            <p class="text-white/80 text-xs mt-0.5">Capaian Pembelajaran yang sesuai dengan kriteria Anda</p>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <div id="results_content"></div>
                </div>
            </div>

            <!-- RPP Form Card -->
            <div id="rpp_card" class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hidden mt-6">
                <div class="bg-primary px-5 py-3">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-white">Buat RPP dengan AI 🤖</h2>
                            <p class="text-white/80 text-xs mt-0.5">Lengkapi formulir di bawah untuk menghasilkan langkah pembelajaran dengan AI</p>
                        </div>
                    </div>
                </div>

                <form id="rppForm" class="p-6 sm:p-8">
                    @csrf
                    <input type="hidden" id="rpp_id_bidang" name="id_bidang">
                    <input type="hidden" id="rpp_id_program" name="id_program">
                    <input type="hidden" id="rpp_id_konsentrasi" name="id_konsentrasi">
                    <input type="hidden" id="rpp_id_fase" name="id_fase">
                    <input type="hidden" id="rpp_id_mapel" name="id_mapel">

                    <!-- Section: Identifikasi -->
                    <div class="mb-10">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-lg">1</span>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-primary">Identifikasi Pembelajaran</h3>
                                <p class="text-sm text-gray-600 mt-1">Tentukan profil lulusan yang akan dikembangkan</p>
                            </div>
                        </div>

                        <!-- Dimensi Profil Lulusan -->
                        <div class="bg-gradient-to-br from-gray-50 to-blue-50/30 rounded-xl p-6 border-2 border-gray-200/70 hover:border-primary/30 transition-all">
                            <label class="block text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Dimensi Profil Pelajar Pancasila
                                <span class="text-sm font-normal text-red-600">*</span>
                            </label>
                            <p class="text-sm text-gray-600 mb-5 leading-relaxed">Pilih minimal 3 dimensi yang relevan dengan tujuan pembelajaran</p>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                                <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-primary hover:bg-blue-50/50 cursor-pointer transition-all duration-200 group">
                                    <input type="checkbox" name="dimensi_profil[]" value="Keimanan dan Ketakwaan terhadap Tuhan YME" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #3b82f6;">
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Keimanan dan Ketakwaan terhadap Tuhan YME</span>
                                </label>

                                <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-primary hover:bg-blue-50/50 cursor-pointer transition-all duration-200 group">
                                    <input type="checkbox" name="dimensi_profil[]" value="Penalaran Kritis" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #3b82f6;">
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Penalaran Kritis</span>
                                </label>

                                <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-primary hover:bg-blue-50/50 cursor-pointer transition-all duration-200 group">
                                    <input type="checkbox" name="dimensi_profil[]" value="Kolaborasi" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #3b82f6;">
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Kolaborasi</span>
                                </label>

                                <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-primary hover:bg-blue-50/50 cursor-pointer transition-all duration-200 group">
                                    <input type="checkbox" name="dimensi_profil[]" value="Kesehatan" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #3b82f6;">
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Kesehatan</span>
                                </label>

                                <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-primary hover:bg-blue-50/50 cursor-pointer transition-all duration-200 group">
                                    <input type="checkbox" name="dimensi_profil[]" value="Kewargaan" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #3b82f6;">
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Kewargaan</span>
                                </label>

                                <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-primary hover:bg-blue-50/50 cursor-pointer transition-all duration-200 group">
                                    <input type="checkbox" name="dimensi_profil[]" value="Kreativitas" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #3b82f6;">
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Kreativitas</span>
                                </label>

                                <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-primary hover:bg-blue-50/50 cursor-pointer transition-all duration-200 group">
                                    <input type="checkbox" name="dimensi_profil[]" value="Kemandirian" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #3b82f6;">
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Kemandirian</span>
                                </label>

                                <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-primary hover:bg-blue-50/50 cursor-pointer transition-all duration-200 group">
                                    <input type="checkbox" name="dimensi_profil[]" value="Komunikasi" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #3b82f6;">
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Komunikasi</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Alokasi Waktu -->
                    <div class="mb-10">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-secondary rounded-xl flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-lg">2</span>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-secondary">Alokasi Waktu</h3>
                                <p class="text-sm text-gray-600 mt-1">Tentukan durasi pembelajaran</p>
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-gray-50 to-orange-50/30 rounded-xl p-6 border-2 border-gray-200/70 hover:border-secondary/30 transition-all">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Jumlah Pertemuan -->
                                <div class="group">
                                    <label class="block text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        Jumlah Pertemuan
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="number" name="jumlah_pertemuan" min="1" value="1" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all text-gray-900 font-medium placeholder-gray-400 hover:border-secondary-300" placeholder="Misal: 1" required>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                            <span class="text-gray-400 text-sm font-medium">pertemuan</span>
                                        </div>
                                    </div>
                                    <p class="mt-2 text-xs text-gray-500 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Berapa kali pembelajaran dilakukan
                                    </p>
                                </div>

                                <!-- Jam Pelajaran per Pertemuan -->
                                <div class="group">
                                    <label class="block text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Jam Pelajaran per Pertemuan
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="number" name="jam_pelajaran" min="1" value="2" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all text-gray-900 font-medium placeholder-gray-400 hover:border-secondary-300" placeholder="Misal: 2" required>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                            <span class="text-gray-400 text-sm font-medium">JP</span>
                                        </div>
                                    </div>
                                    <p class="mt-2 text-xs text-gray-500 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        1 JP = 45 menit
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Desain Pembelajaran -->
                    <div class="mb-10">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-accent rounded-xl flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-lg">3</span>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-accent">Desain Pembelajaran</h3>
                                <p class="text-sm text-gray-600 mt-1">Rancang strategi dan pendekatan pembelajaran</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <!-- Tujuan Pembelajaran -->
                            <div class="group bg-gradient-to-br from-accent-50 to-purple-50/30 rounded-xl p-6 border-2 border-accent-100 hover:border-accent transition-all duration-300">
                                <label class="block text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                    Tujuan Pembelajaran
                                    <span class="text-red-600">*</span>
                                </label>
                                <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                                    💡 Gunakan kata kerja operasional yang terukur (menganalisis, merancang, mengimplementasikan, dll)
                                </p>
                                <textarea name="tujuan_pembelajaran" rows="4" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-accent focus:border-accent transition-all resize-none text-gray-900 placeholder-gray-400 hover:border-gray-300" placeholder="Contoh: Peserta didik mampu menganalisis prinsip dasar pemrograman berorientasi objek dan menerapkannya dalam pembuatan aplikasi sederhana menggunakan Java" required></textarea>
                            </div>

                            <!-- Praktik Pedagogis / Model Pembelajaran -->
                            <div class="group bg-gradient-to-br from-primary-50 to-blue-50/30 rounded-xl p-6 border-2 border-primary-100 hover:border-primary transition-all duration-300">
                                <label class="block text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    Model Pembelajaran / Praktik Pedagogis
                                    <span class="text-red-600">*</span>
                                </label>
                                <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                                    🎯 Pilih model pembelajaran yang sesuai dengan materi dan tujuan pembelajaran
                                </p>
                                <div class="relative">
                                    <select name="praktik_pedagogis" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all text-gray-900 font-medium appearance-none cursor-pointer hover:border-gray-300" required>
                                        <option value="" disabled selected class="text-gray-400">-- Pilih Model Pembelajaran --</option>
                                        <option value="Problem-Based Learning (PBL)">Problem-Based Learning (PBL)</option>
                                        <option value="Project-Based Learning (PjBL)">Project-Based Learning (PjBL)</option>
                                        <option value="Discovery Learning">Discovery Learning</option>
                                        <option value="Cooperative Learning">Cooperative Learning</option>
                                        <option value="Inquiry-Based Learning">Inquiry-Based Learning</option>
                                        <option value="Contextual Teaching and Learning (CTL)">Contextual Teaching and Learning (CTL)</option>
                                        <option value="Direct Instruction (Pembelajaran Langsung)">Direct Instruction (Pembelajaran Langsung)</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Strategi Pembelajaran -->
                            <div class="group bg-gradient-to-br from-secondary-50 to-orange-50/30 rounded-xl p-6 border-2 border-secondary-100 hover:border-secondary transition-all duration-300">
                                <label class="block text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                    </svg>
                                    Strategi Pembelajaran
                                    <span class="text-sm font-normal text-gray-600">(pilih minimal 1)</span>
                                </label>
                                <p class="text-sm text-gray-600 mb-5 leading-relaxed">
                                    📋 Pilih strategi pembelajaran yang akan diterapkan (bisa lebih dari satu)
                                </p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-secondary hover:bg-orange-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="strategi_pembelajaran[]" value="Ekspositori" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #f97316;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Ekspositori</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-secondary hover:bg-orange-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="strategi_pembelajaran[]" value="Inkuiri" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #f97316;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Inkuiri</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-secondary hover:bg-orange-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="strategi_pembelajaran[]" value="Berbasis Masalah" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #f97316;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Berbasis Masalah</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-secondary hover:bg-orange-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="strategi_pembelajaran[]" value="Kooperatif" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #f97316;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Kooperatif</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-secondary hover:bg-orange-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="strategi_pembelajaran[]" value="Afektif" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #f97316;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Afektif</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-secondary hover:bg-orange-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="strategi_pembelajaran[]" value="Kontekstual" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #f97316;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Kontekstual</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-secondary hover:bg-orange-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="strategi_pembelajaran[]" value="Peningkatan Kemampuan Berpikir" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #f97316;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Peningkatan Kemampuan Berpikir</span>
                                    </label>
                                </div>
                                <div class="mt-4">
                                    <input type="text" name="strategi_pembelajaran_lainnya" placeholder="Strategi lainnya (opsional)..." class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all text-gray-900 placeholder-gray-400 hover:border-gray-300">
                                </div>
                            </div>

                            <!-- Kemitraan Pembelajaran -->
                            <div class="group bg-gradient-to-br from-accent-50 to-purple-50/30 rounded-xl p-6 border-2 border-accent-100 hover:border-accent transition-all duration-300">
                                <label class="block text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    Kemitraan Pembelajaran
                                    <span class="text-sm font-normal text-gray-600">(opsional, bisa pilih lebih dari 1)</span>
                                </label>
                                <p class="text-sm text-gray-600 mb-5 leading-relaxed">
                                    🤝 Kolaborasi dengan industri, komunitas, atau lembaga lain (centang semua yang sesuai)
                                </p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-accent hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="kemitraan_pembelajaran[]" value="Komunitas" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #a855f7;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Komunitas</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-accent hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="kemitraan_pembelajaran[]" value="Tokoh Masyarakat" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #a855f7;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Tokoh Masyarakat</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-accent hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="kemitraan_pembelajaran[]" value="Dunia Usaha dan Dunia Industri Kerja" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #a855f7;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Dunia Usaha dan Dunia Industri Kerja</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-accent hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="kemitraan_pembelajaran[]" value="Institusi" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #a855f7;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Institusi</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-accent hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="kemitraan_pembelajaran[]" value="Mitra Profesional" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #a855f7;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Mitra Profesional</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-accent hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="kemitraan_pembelajaran[]" value="Antar Guru Lintas Mata Pelajaran" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #a855f7;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Antar Guru Lintas Mata Pelajaran</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-accent hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="kemitraan_pembelajaran[]" value="Antar Murid Lintas Kelas" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #a855f7;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Antar Murid Lintas Kelas</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-accent hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="kemitraan_pembelajaran[]" value="Antar Guru Lintas Sekolah" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #a855f7;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Antar Guru Lintas Sekolah</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-accent hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="kemitraan_pembelajaran[]" value="Orang Tua" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #a855f7;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Orang Tua</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Metode Pembelajaran -->
                            <div class="group bg-gradient-to-br from-purple-50 to-pink-50/30 rounded-xl p-6 border-2 border-purple-100 hover:border-purple-400 transition-all duration-300">
                                <label class="block text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Metode Pembelajaran
                                    <span class="text-sm font-normal text-gray-600">(Pilih >1)</span>
                                </label>
                                <p class="text-sm text-gray-600 mb-5 leading-relaxed">
                                    🎓 Pilih metode pembelajaran yang akan diterapkan dalam proses belajar mengajar
                                </p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-purple-400 hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="metode_pembelajaran[]" value="Demonstrasi" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #ec4899;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Demonstrasi</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-purple-400 hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="metode_pembelajaran[]" value="Ceramah" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #ec4899;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Ceramah</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-purple-400 hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="metode_pembelajaran[]" value="Diskusi" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #ec4899;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Diskusi</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-purple-400 hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="metode_pembelajaran[]" value="Bermain Peran" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #ec4899;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Bermain Peran</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-purple-400 hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="metode_pembelajaran[]" value="Latihan Berulang" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #ec4899;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Latihan Berulang</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-purple-400 hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="metode_pembelajaran[]" value="Kerja Lapangan" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #ec4899;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Kerja Lapangan</span>
                                    </label>
                                    <label class="flex items-center gap-2.5 px-4 py-3 bg-white border-2 border-gray-200 rounded-lg hover:border-purple-400 hover:bg-purple-50/50 cursor-pointer transition-all duration-200 group">
                                        <input type="checkbox" name="metode_pembelajaran[]" value="Kerja Kelompok" class="w-5 h-5 rounded cursor-pointer" style="accent-color: #ec4899;">
                                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Kerja Kelompok</span>
                                    </label>
                                </div>
                                <div class="mt-4">
                                    <input type="text" name="metode_pembelajaran_lainnya" placeholder="Metode lainnya (opsional)..." class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all text-gray-900 placeholder-gray-400 hover:border-gray-300">
                                </div>
                            </div>

                            <!-- Lingkungan Pembelajaran -->
                            <div class="group bg-gradient-to-br from-orange-50 to-red-50/30 rounded-xl p-6 border-2 border-orange-200 hover:border-orange-400 transition-all duration-300">
                                <label class="block text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    Lingkungan Pembelajaran
                                    <span class="text-red-600">*</span>
                                </label>
                                <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                                    🏫 Deskripsikan setting ruang fisik, virtual, dan budaya belajar
                                </p>
                                <textarea name="lingkungan_pembelajaran" rows="3" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all resize-none text-gray-900 placeholder-gray-400 hover:border-gray-300" placeholder="Contoh: Lab komputer dengan meja kelompok (4-5 siswa), layar proyektor besar, whiteboard kolaboratif, dan akses WiFi. Budaya belajar yang mendorong trial-error dan peer learning" required></textarea>
                            </div>

                            <!-- Pemanfaatan Digital -->
                            <div class="group bg-gradient-to-br from-cyan-50 to-blue-50/30 rounded-xl p-6 border-2 border-cyan-200 hover:border-cyan-400 transition-all duration-300">
                                <label class="block text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    Pemanfaatan Digital
                                    <span class="text-sm font-normal text-gray-600">(opsional)</span>
                                </label>
                                <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                                    💻 Sebutkan tools, aplikasi, platform yang digunakan
                                </p>
                                <textarea name="pemanfaatan_digital" rows="3" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all resize-none text-gray-900 placeholder-gray-400 hover:border-gray-300" placeholder="Contoh: VS Code untuk coding, GitHub untuk version control dan kolaborasi, Figma untuk UI/UX design, Google Classroom untuk submit tugas, Zoom untuk presentasi project"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-8 mt-8 border-t-2 border-gray-100">
                        <div class="text-sm text-gray-600 flex items-start gap-2">
                            <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="leading-relaxed">
                                <strong class="text-gray-900">Pastikan semua field wajib (*) sudah terisi.</strong><br/>
                                AI akan menghasilkan langkah pembelajaran detail dalam 30-60 detik.
                            </span>
                        </div>

                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <button type="button" onclick="document.getElementById('rpp_card').classList.add('hidden'); window.scrollTo({top: 0, behavior: 'smooth'})" class="flex-1 sm:flex-none px-6 py-3 bg-white border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Batal
                            </button>

                            <button type="submit" class="group relative flex-1 sm:flex-none px-8 py-3.5 bg-gradient-to-r from-blue-600 via-purple-600 to-blue-700 text-white rounded-xl font-bold hover:from-blue-700 hover:via-purple-700 hover:to-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300 shadow-xl shadow-blue-500/30 hover:shadow-2xl hover:shadow-blue-500/40 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                <div class="absolute inset-0 bg-white/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                <span class="relative">Generate dengan AI</span>
                                <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full animate-ping"></div>
                                <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full"></div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Langkah-Langkah Pembelajaran Card - Modern Redesign -->
            <div id="langkah_pembelajaran_card" class="max-w-7xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden hidden mt-8 border border-gray-100">

                <!-- Header -->
                <div class="bg-primary px-5 py-3">
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-2">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-white">Rencana Pelaksanaan Pembelajaran 🤖</h2>
                                <p class="text-white/80 text-xs mt-0.5">Berkesadaran • Bermakna • Mengembirakan</p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div id="actionButtons" class="hidden flex items-center gap-3">
                            <!-- Save RPP Button -->
                            <button id="saveRppBtn" class="group relative px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition-all duration-300 flex items-center gap-2 shadow-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                                </svg>
                                <span class="text-sm">Simpan RPP</span>
                            </button>

                            <!-- Download Button -->
                            <button id="downloadBtn" class="group relative px-4 py-2 bg-white/20 backdrop-blur-sm text-white font-semibold rounded-lg border border-white/30 hover:bg-white/30 transition-all duration-300 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="text-sm">Download PDF</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Content Container -->
                <div class="p-5">

                    <!-- Loading State - Premium -->
                    <div id="langkah_loading" class="text-center py-20">
                        <div class="max-w-md mx-auto">
                            <!-- Animated Icon -->
                            <div class="relative inline-block mb-8">
                                <div class="absolute inset-0 animate-ping">
                                    <div class="w-24 h-24 bg-blue-400 rounded-full opacity-20"></div>
                                </div>
                                <div class="relative w-24 h-24 mx-auto bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-2xl">
                                    <svg class="w-12 h-12 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Loading Text -->
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">AI Sedang Membuat RPP...</h3>
                            <p class="text-gray-600 text-lg mb-6">Membuat langkah pembelajaran yang terstruktur dan sesuai kurikulum</p>

                            <!-- Progress Bar -->
                            <div class="max-w-xs mx-auto">
                                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full animate-pulse" style="width: 75%"></div>
                                </div>
                                <p class="text-sm text-gray-500 mt-3">Mohon tunggu 30-60 detik...</p>
                            </div>
                        </div>
                    </div>

                    <!-- Content Wrapper -->
                    <div id="langkah_content_wrapper" class="hidden space-y-8">

                        <!-- Info Alert -->
                        <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-blue-50 border-l-4 border-blue-600 rounded-r-2xl p-6 shadow-sm">
                            <div class="flex gap-4">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold text-blue-900 mb-1.5">✨ Pembelajaran Anda Siap!</h4>
                                    <p class="text-blue-800 leading-relaxed">RPP ini telah disesuaikan dengan tujuan, model pembelajaran, dan dimensi profil pelajar Pancasila yang Anda pilih.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Main Content - AI Generated -->
                        <div>
                            <!-- Content Header -->
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900">📝 Langkah Pembelajaran</h3>
                                    <p class="text-sm text-gray-600 mt-0.5">Hasil generate AI berdasarkan input Anda</p>
                                </div>
                            </div>

                            <!-- AI Content Display -->
                            <div id="langkah_content" class="bg-white rounded-xl border border-gray-200/60 p-6 sm:p-8 lg:p-12
                                [&_*]:text-gray-800 [&_*]:leading-relaxed

                                [&_h1]:text-3xl [&_h1]:sm:text-4xl [&_h1]:font-bold [&_h1]:text-left [&_h1]:mb-8 [&_h1]:pb-4
                                [&_h1]:border-b-2 [&_h1]:border-blue-500 [&_h1]:text-gray-900 [&_h1]:mt-0

                                [&_h2]:text-2xl [&_h2]:sm:text-3xl [&_h2]:font-bold [&_h2]:mt-12 [&_h2]:mb-6 [&_h2]:pb-3
                                [&_h2]:border-b [&_h2]:border-gray-200 [&_h2]:text-gray-900

                                [&_h3]:text-xl [&_h3]:sm:text-2xl [&_h3]:font-bold [&_h3]:text-blue-700 [&_h3]:mt-8 [&_h3]:mb-4
                                [&_h3]:pl-0 [&_h3]:py-0

                                [&_h4]:text-lg [&_h4]:sm:text-xl [&_h4]:font-bold [&_h4]:text-gray-800 [&_h4]:mt-6 [&_h4]:mb-3

                                [&_h5]:text-base [&_h5]:sm:text-lg [&_h5]:font-semibold [&_h5]:text-gray-700 [&_h5]:mt-5 [&_h5]:mb-2

                                [&_p]:text-base [&_p]:text-gray-700 [&_p]:leading-loose [&_p]:my-3 [&_p]:text-justify

                                [&_ul]:my-4 [&_ul]:space-y-2 [&_ul]:pl-0
                                [&_ol]:my-4 [&_ol]:space-y-2 [&_ol]:pl-0

                                [&_li]:text-gray-700 [&_li]:leading-loose [&_li]:text-base [&_li]:pl-1
                                [&_li]:marker:text-blue-600 [&_li]:marker:font-normal

                                [&_ul_ul]:mt-2 [&_ul_ul]:mb-2 [&_ul_ul]:ml-6 [&_ul_ul]:space-y-1.5
                                [&_ol_ol]:mt-2 [&_ol_ol]:mb-2 [&_ol_ol]:ml-6 [&_ol_ol]:space-y-1.5
                                [&_ul_ul_li]:marker:text-gray-500 [&_ul_ul_li]:text-sm
                                [&_ol_ol_li]:marker:text-gray-500 [&_ol_ol_li]:text-sm

                                [&_strong]:font-bold [&_strong]:text-gray-900
                                [&_strong]:bg-yellow-50 [&_strong]:px-1 [&_strong]:py-0.5

                                [&_em]:not-italic [&_em]:font-semibold [&_em]:text-blue-700

                                [&_code]:text-sm [&_code]:bg-gray-100 [&_code]:text-pink-600
                                [&_code]:px-2 [&_code]:py-0.5 [&_code]:rounded [&_code]:font-mono

                                [&_pre]:bg-gray-900 [&_pre]:text-gray-100 [&_pre]:p-4
                                [&_pre]:rounded-lg [&_pre]:overflow-x-auto [&_pre]:my-4 [&_pre]:text-sm

                                [&_hr]:my-8 [&_hr]:border-t [&_hr]:border-gray-200

                                [&_blockquote]:border-l-4 [&_blockquote]:border-blue-400
                                [&_blockquote]:bg-blue-50/50 [&_blockquote]:pl-4 [&_blockquote]:py-3
                                [&_blockquote]:my-4 [&_blockquote]:rounded-r [&_blockquote]:text-gray-700 [&_blockquote]:italic

                                [&_table]:w-full [&_table]:border-collapse [&_table]:my-6
                                [&_table]:border [&_table]:border-gray-200 [&_table]:rounded-lg [&_table]:overflow-hidden
                                [&_thead]:bg-gray-50
                                [&_th]:px-4 [&_th]:py-3 [&_th]:text-left [&_th]:font-semibold [&_th]:text-sm
                                [&_th]:text-gray-900 [&_th]:border-b [&_th]:border-gray-200
                                [&_td]:px-4 [&_td]:py-3 [&_td]:border-b [&_td]:border-gray-100
                                [&_td]:text-gray-700 [&_td]:text-sm
                                [&_tbody_tr:hover]:bg-gray-50/50 [&_tr]:transition-colors
                            "></div>
                        </div>

                        <!-- Asesmen Section -->
                        <div>
                            <!-- Asesmen Header -->
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center shadow-md">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold text-orange-900">📋 Asesmen Pembelajaran</h3>
                                        <p class="text-sm text-orange-700 mt-0.5">Penilaian: <span class="font-semibold">As • For • Of Learning</span></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Asesmen Content Display -->
                            <div class="bg-white rounded-xl border border-orange-200/60 p-8 sm:p-10 lg:p-14">
                                <div id="langkah_asesmen" class="
                                    [&_*]:text-gray-800 [&_*]:leading-relaxed

                                    [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-orange-900 [&_h2]:mt-10 [&_h2]:mb-6
                                    [&_h2]:pb-3 [&_h2]:border-b-2 [&_h2]:border-orange-200 [&_h2]:first:mt-0

                                    [&_h3]:text-xl [&_h3]:font-bold [&_h3]:text-orange-800 [&_h3]:mt-8 [&_h3]:mb-4
                                    [&_h3]:bg-orange-50 [&_h3]:border-l-4 [&_h3]:border-orange-500
                                    [&_h3]:pl-4 [&_h3]:py-2 [&_h3]:rounded-r-lg

                                    [&_h4]:text-lg [&_h4]:font-semibold [&_h4]:text-gray-800 [&_h4]:mt-6 [&_h4]:mb-3

                                    [&_p]:text-base [&_p]:text-gray-700 [&_p]:leading-relaxed [&_p]:my-4

                                    [&_ul]:my-5 [&_ul]:space-y-3
                                    [&_ol]:my-5 [&_ol]:space-y-3

                                    [&_li]:text-gray-700 [&_li]:leading-relaxed [&_li]:text-base
                                    [&_li]:marker:text-orange-600 [&_li]:marker:font-bold

                                    [&_ul_li]:pl-2
                                    [&_ol_li]:pl-2

                                    [&_ul_ul]:mt-2 [&_ul_ul]:mb-2 [&_ul_ul]:ml-6 [&_ul_ul]:space-y-2
                                    [&_ol_ol]:mt-2 [&_ol_ol]:mb-2 [&_ol_ol]:ml-6 [&_ol_ol]:space-y-2

                                    [&_strong]:font-bold [&_strong]:text-gray-900
                                    [&_strong]:bg-orange-100 [&_strong]:px-2 [&_strong]:py-0.5 [&_strong]:rounded

                                    [&_table]:w-full [&_table]:border-collapse [&_table]:my-6
                                    [&_table]:shadow-md [&_table]:rounded-lg [&_table]:overflow-hidden
                                    [&_thead]:bg-gradient-to-r [&_thead]:from-orange-100 [&_thead]:to-red-50
                                    [&_th]:px-5 [&_th]:py-3 [&_th]:text-left [&_th]:font-bold
                                    [&_th]:text-gray-900 [&_th]:border-b-2 [&_th]:border-orange-300 [&_th]:text-sm
                                    [&_td]:px-5 [&_td]:py-3 [&_td]:border-b [&_td]:border-gray-200
                                    [&_td]:text-gray-700 [&_td]:text-sm
                                    [&_tbody_tr:hover]:bg-orange-50/50 [&_tr]:transition-colors

                                    [&_hr]:my-8 [&_hr]:border-t-2 [&_hr]:border-orange-100
                                "></div>
                            </div>
                        </div>

                        <!-- Action Buttons Section -->
                        <div class="bg-gradient-to-r from-gray-50 to-blue-50/30 rounded-2xl p-6 border border-gray-200">
                            <div class="flex flex-col lg:flex-row justify-between items-center gap-4">
                                <!-- Info Text -->
                                <div class="flex items-start gap-3 text-gray-700">
                                    <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-gray-900">RPP siap digunakan!</p>
                                        <p class="text-sm text-gray-600 mt-1">Anda dapat mencetak untuk diarsipkan atau generate ulang jika ada penyesuaian</p>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center gap-3 w-full lg:w-auto">
                                    <button type="button" onclick="printLangkah()" class="flex-1 lg:flex-none group px-6 py-3.5 bg-white border-2 border-gray-300 text-gray-700 font-bold rounded-xl hover:border-gray-400 hover:bg-gray-50 transition-all shadow-sm hover:shadow-md flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                        </svg>
                                        <span>Cetak</span>
                                    </button>

                                    <button type="button" onclick="regenerateLangkah()" class="flex-1 lg:flex-none group relative px-6 py-3.5 bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-700 text-white font-bold rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all hover:scale-105 flex items-center justify-center gap-2">
                                        <div class="absolute inset-0 bg-gradient-to-r from-blue-700 via-indigo-700 to-blue-800 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                        <svg class="relative w-5 h-5 group-hover:rotate-180 transition-transform duration-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                        </svg>
                                        <span class="relative">Generate Ulang</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM fully loaded');

            // User Menu Dropdown
            const userMenuButton = document.getElementById('userMenuButton');
            const userMenuDropdown = document.getElementById('userMenuDropdown');
            const userMenuIcon = document.getElementById('userMenuIcon');

            if (userMenuButton) {
                userMenuButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    userMenuDropdown.classList.toggle('hidden');
                    userMenuIcon.classList.toggle('rotate-180');
                });
            }

            document.addEventListener('click', function(e) {
                if (userMenuButton && !userMenuButton.contains(e.target) && !userMenuDropdown.contains(e.target)) {
                    userMenuDropdown.classList.add('hidden');
                    userMenuIcon.classList.remove('rotate-180');
                }
            });

            // Tab Switching dengan Modern Style
            const tabKejuruan = document.getElementById('tab_kejuruan');
            const tabUmum = document.getElementById('tab_umum');
            const filterKejuruan = document.getElementById('filter_kejuruan');
            const filterUmum = document.getElementById('filter_umum');
            const resultsCard = document.getElementById('results_card');

            console.log('Tab elements found:', {
                tabKejuruan: !!tabKejuruan,
                tabUmum: !!tabUmum,
                filterKejuruan: !!filterKejuruan,
                filterUmum: !!filterUmum
            });

        tabKejuruan.addEventListener('click', function(e) {
            e.preventDefault();

            // Style active tab - Kejuruan (Segmented Control)
            tabKejuruan.className = 'flex-1 px-6 py-3 rounded-full font-semibold text-sm bg-primary text-white shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-[1.02]';

            // Style inactive tab - Umum (Segmented Control)
            tabUmum.className = 'flex-1 px-6 py-3 rounded-full font-semibold text-sm bg-transparent text-gray-600 transition-all duration-300 hover:text-gray-900 hover:bg-gray-200';

            filterKejuruan.classList.remove('hidden');
            filterUmum.classList.add('hidden');
            resultsCard.classList.add('hidden');
        });

        tabUmum.addEventListener('click', function(e) {
            e.preventDefault();

            // Style active tab - Umum (Segmented Control)
            tabUmum.className = 'flex-1 px-6 py-3 rounded-full font-semibold text-sm bg-primary text-white shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-[1.02]';

            // Style inactive tab - Kejuruan (Segmented Control)
            tabKejuruan.className = 'flex-1 px-6 py-3 rounded-full font-semibold text-sm bg-transparent text-gray-600 transition-all duration-300 hover:text-gray-900 hover:bg-gray-200';

            filterUmum.classList.remove('hidden');
            filterKejuruan.classList.add('hidden');
            resultsCard.classList.add('hidden');
        });

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Kejuruan elements
            const bidangKeahlianSelect = document.getElementById('bidang_keahlian');
            const programKeahlianSelect = document.getElementById('program_keahlian');
            const konsentrasiKeahlianSelect = document.getElementById('konsentrasi_keahlian');
            const btnCariKejuruan = document.getElementById('btn_cari_kejuruan');

            console.log('Kejuruan elements found:', {
                bidangKeahlianSelect: !!bidangKeahlianSelect,
                programKeahlianSelect: !!programKeahlianSelect,
                konsentrasiKeahlianSelect: !!konsentrasiKeahlianSelect,
                btnCariKejuruan: !!btnCariKejuruan
            });

            // Umum elements
            const faseUmumSelect = document.getElementById('fase_umum');
            const mataPelajaranUmumSelect = document.getElementById('mata_pelajaran_umum');
            const btnCariUmum = document.getElementById('btn_cari_umum');

            // Results elements
            const resultsContent = document.getElementById('results_content');

            if (!bidangKeahlianSelect || !programKeahlianSelect) {
                console.error('Required dropdown elements not found!');
                return;
            }

            // Helper Functions
            function resetDropdown(selectElement, placeholder) {
                selectElement.innerHTML = `<option value="">${placeholder}</option>`;
                selectElement.disabled = true;
                selectElement.classList.remove('bg-white');
                selectElement.classList.add('bg-gray-100');
            }

            function checkKejuruanFormValidity() {
                // Valid if Bidang + Program selected (konsentrasi is optional)
                const isValid = bidangKeahlianSelect.value && programKeahlianSelect.value;
                console.log('Check Kejuruan Validity:', {
                    bidang: bidangKeahlianSelect.value,
                    program: programKeahlianSelect.value,
                    konsentrasi: konsentrasiKeahlianSelect.value,
                    isValid: isValid
                });
                btnCariKejuruan.disabled = !isValid;
                console.log('Button disabled status:', btnCariKejuruan.disabled);
            }

            function checkUmumFormValidity() {
                // Valid if Fase + Mata Pelajaran selected
                const isValid = faseUmumSelect.value && mataPelajaranUmumSelect.value;
                btnCariUmum.disabled = !isValid;
            }

            // === KEJURUAN FILTER ===
            console.log('Setting up Bidang Keahlian change listener...');
            bidangKeahlianSelect.addEventListener('change', function() {
            const idBidang = this.value;
            console.log('Bidang Keahlian selected:', idBidang);
            resetDropdown(programKeahlianSelect, '-- Pilih Program Keahlian --');
            resetDropdown(konsentrasiKeahlianSelect, '-- Pilih Konsentrasi Keahlian --');
            resultsCard.classList.add('hidden');
            checkKejuruanFormValidity();

            if (idBidang) {
                console.log('Fetching program keahlian for bidang:', idBidang);
                fetch(`/api/program-keahlian/${idBidang}`)
                    .then(response => {
                        console.log('Response status:', response.status);
                        return response.json();
                    })
                    .then(data => {
                        console.log('Program keahlian data:', data);
                        programKeahlianSelect.disabled = false;
                        programKeahlianSelect.classList.remove('bg-gray-100');
                        programKeahlianSelect.classList.add('bg-white');
                        data.forEach(item => {
                            const option = new Option(item.nama_program, item.id_program);
                            programKeahlianSelect.add(option);
                        });
                        console.log('Program keahlian loaded successfully');
                    })
                    .catch(error => {
                        console.error('Error fetching program keahlian:', error);
                    });
            }
        });

        programKeahlianSelect.addEventListener('change', function() {
            const idProgram = this.value;
            resetDropdown(konsentrasiKeahlianSelect, '-- Pilih Konsentrasi Keahlian --');
            resultsCard.classList.add('hidden');
            checkKejuruanFormValidity();

            if (idProgram) {
                // Load konsentrasi keahlian (Fase F)
                fetch(`/api/konsentrasi-keahlian/${idProgram}`)
                    .then(response => response.json())
                    .then(data => {
                        konsentrasiKeahlianSelect.disabled = false;
                        konsentrasiKeahlianSelect.classList.remove('bg-gray-100');
                        konsentrasiKeahlianSelect.classList.add('bg-white');
                        data.forEach(item => {
                            const option = new Option(item.nama_konsentrasi, item.id_konsentrasi);
                            konsentrasiKeahlianSelect.add(option);
                        });
                    });
            }
        });

        konsentrasiKeahlianSelect.addEventListener('change', function() {
            checkKejuruanFormValidity();
        });

        btnCariKejuruan.addEventListener('click', function() {
            const idBidang = bidangKeahlianSelect.value;
            const idProgram = programKeahlianSelect.value;
            const idKonsentrasi = konsentrasiKeahlianSelect.value;

            let finalFase, finalKonsentrasi;

            if (idKonsentrasi) {
                // User selected konsentrasi -> Fase F
                finalFase = 2;
                finalKonsentrasi = idKonsentrasi;
            } else {
                // Only program selected -> Fase E
                finalFase = 1;
                finalKonsentrasi = idProgram;
            }

            const formData = {
                id_bidang: idBidang,
                id_program: idProgram,
                id_konsentrasi: finalKonsentrasi,
                id_fase: finalFase,
                id_mapel: null // Not needed for kejuruan
            };

            resultsContent.innerHTML = `
                <div class="flex flex-col items-center justify-center py-16">
                    <div class="relative">
                        <div class="w-16 h-16 border-4 border-primary-200 rounded-full"></div>
                        <div class="w-16 h-16 border-4 border-primary border-t-transparent rounded-full animate-spin absolute top-0 left-0"></div>
                    </div>
                    <p class="mt-6 text-gray-600 font-medium">Memuat data...</p>
                </div>
            `;
            resultsCard.classList.remove('hidden');
            resultsCard.scrollIntoView({ behavior: 'smooth', block: 'start' });

            fetch('/api/cp-detail', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    displayResults(data.data);
                    // Show RPP form and populate hidden fields
                    // Get id_mapel from first result
                    const idMapel = data.data.length > 0 ? data.data[0].mata_pelajaran.id_mapel : null;
                    showRppForm(idBidang, idProgram, idKonsentrasi || idProgram, finalFase, idMapel);
                } else {
                    resultsContent.innerHTML = `<div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 flex items-center gap-3"><svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg><span class="text-yellow-800 font-medium">${data.message}</span></div>`;
                    document.getElementById('rpp_card').classList.add('hidden');
                }
            });
        });

        // === UMUM FILTER ===
        faseUmumSelect.addEventListener('change', function() {
            const idFase = this.value;
            resetDropdown(mataPelajaranUmumSelect, '-- Pilih Mata Pelajaran --');
            resultsCard.classList.add('hidden');
            checkUmumFormValidity();

            if (idFase) {
                // For mata pelajaran umum, use id_konsentrasi = 0
                fetch(`/api/mata-pelajaran/0/${idFase}`)
                    .then(response => response.json())
                    .then(data => {
                        mataPelajaranUmumSelect.disabled = false;
                        mataPelajaranUmumSelect.classList.remove('bg-gray-100');
                        mataPelajaranUmumSelect.classList.add('bg-white');
                        if (data.length === 0) {
                            const option = new Option('-- Tidak ada mata pelajaran --', '');
                            mataPelajaranUmumSelect.add(option);
                        } else {
                            data.forEach(item => {
                                const option = new Option(item.nama_mapel, item.id_mapel);
                                mataPelajaranUmumSelect.add(option);
                            });
                        }
                    });
            }
        });

        mataPelajaranUmumSelect.addEventListener('change', checkUmumFormValidity);

        btnCariUmum.addEventListener('click', function() {
            const idFase = faseUmumSelect.value;
            const idMapel = mataPelajaranUmumSelect.value;

            const formData = {
                id_bidang: null,
                id_program: null,
                id_konsentrasi: 0,
                id_fase: idFase,
                id_mapel: idMapel
            };

            resultsContent.innerHTML = `
                <div class="flex flex-col items-center justify-center py-16">
                    <div class="relative">
                        <div class="w-16 h-16 border-4 border-primary-200 rounded-full"></div>
                        <div class="w-16 h-16 border-4 border-primary border-t-transparent rounded-full animate-spin absolute top-0 left-0"></div>
                    </div>
                    <p class="mt-6 text-gray-600 font-medium">Memuat data...</p>
                </div>
            `;
            resultsCard.classList.remove('hidden');
            resultsCard.scrollIntoView({ behavior: 'smooth', block: 'start' });

            fetch('/api/cp-detail', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    displayResults(data.data);
                    // Show RPP form for umum path
                    // Get id_mapel from selected mata pelajaran
                    showRppForm(null, null, 0, idFase, idMapel);
                } else {
                    resultsContent.innerHTML = `<div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 flex items-center gap-3"><svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg><span class="text-yellow-800 font-medium">${data.message}</span></div>`;
                    document.getElementById('rpp_card').classList.add('hidden');
                }
            });
        });

        // Show RPP Form
        function showRppForm(idBidang, idProgram, idKonsentrasi, idFase, idMapel) {
            document.getElementById('rpp_id_bidang').value = idBidang || '';
            document.getElementById('rpp_id_program').value = idProgram || '';
            document.getElementById('rpp_id_konsentrasi').value = idKonsentrasi || '';
            document.getElementById('rpp_id_fase').value = idFase || '';
            document.getElementById('rpp_id_mapel').value = idMapel || '';

            const rppCard = document.getElementById('rpp_card');
            rppCard.classList.remove('hidden');

            // Smooth scroll to RPP form
            setTimeout(() => {
                rppCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 300);
        }

        function displayResults(data) {
            if (data.length === 0) {
                resultsContent.innerHTML = '<div class="bg-blue-50 border border-blue-200 rounded-lg p-4 flex items-center gap-3"><svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><span class="text-blue-800 font-medium">Tidak ada data CP Detail ditemukan</span></div>';
                return;
            }

            let html = '';
            let firstMapelId = null;
            data.forEach((cp, index) => {
                const mapel = cp.mata_pelajaran;
                if (index === 0) firstMapelId = mapel.id_mapel;
                const konsentrasi = mapel.konsentrasi_keahlian;
                const program = konsentrasi.program_keahlian;
                const bidang = program.bidang_keahlian;
                const fase = mapel.fase;

                // Add divider between results (except for first item)
                if (index > 0) {
                    html += `<div class="border-t border-gray-200 my-6"></div>`;
                }

                html += `
                    <div class="mb-6">
                        <div class="flex items-start justify-between mb-4">
                            <h3 class="text-2xl font-bold text-primary">${mapel.nama_mapel}</h3>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-semibold bg-primary-50 text-primary border border-primary-200">
                                Fase ${fase.nama_fase}
                            </span>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                                ${bidang.nama_bidang}
                            </span>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-semibold bg-green-50 text-green-700 border border-green-200">
                                ${program.nama_program}
                            </span>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-semibold bg-purple-50 text-purple-700 border border-purple-200">
                                ${konsentrasi.nama_konsentrasi}
                            </span>
                        </div>
                        <div class="space-y-6">
                            ${cp.rasional ? `
                                <div>
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-primary-50 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </div>
                                        <h4 class="text-base font-bold text-gray-900">Rasional</h4>
                                    </div>
                                    <div class="text-base text-gray-700 leading-relaxed pl-12">${formatText(cp.rasional)}</div>
                                </div>
                            ` : ''}
                            ${cp.tujuan ? `
                                <div>
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <h4 class="text-base font-bold text-gray-900">Tujuan</h4>
                                    </div>
                                    <div class="text-base text-gray-700 leading-relaxed pl-12">${formatText(cp.tujuan)}</div>
                                </div>
                            ` : ''}
                            ${cp.karakteristik ? `
                                <div>
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-yellow-50 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                            </svg>
                                        </div>
                                        <h4 class="text-base font-bold text-gray-900">Karakteristik</h4>
                                    </div>
                                    <div class="text-base text-gray-700 leading-relaxed pl-12">${formatText(cp.karakteristik)}</div>
                                </div>
                            ` : ''}
                            ${cp.capaian_pembelajaran ? `
                                <div>
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                        </div>
                                        <h4 class="text-base font-bold text-gray-900">Capaian Pembelajaran</h4>
                                    </div>
                                    <div class="text-base text-gray-700 leading-relaxed pl-12">${formatText(cp.capaian_pembelajaran)}</div>
                                </div>
                            ` : ''}
                            ${cp.uraian_cp ? `
                                <div>
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                        </div>
                                        <h4 class="text-base font-bold text-gray-900">Uraian CP</h4>
                                    </div>
                                    <div class="text-base text-gray-700 leading-relaxed pl-12">${formatUraianCP(cp.uraian_cp)}</div>
                                </div>
                            ` : ''}
                        </div>
                    </div>
                `;
            });

            resultsContent.innerHTML = html;
        }

        function formatText(text) {
            if (!text) return '';
            return text.replace(/\n/g, '<br>').trim();
        }

        function formatUraianCP(text) {
            if (!text) return '';

            let sections = text.split(/\n(?=\d+\.\s)/);
            let formattedHTML = '';

            sections.forEach(section => {
                section = section.trim();
                if (!section) return;

                let mainMatch = section.match(/^(\d+)\.\s+(.+?)(?:\n|$)/);
                if (!mainMatch) return;

                let mainNumber = mainMatch[1];
                let mainTitle = mainMatch[2].trim();

                formattedHTML += `<div class="mb-6">`;
                formattedHTML += `<div class="font-bold text-base mb-3">${mainNumber}. ${mainTitle}</div>`;

                let remainingContent = section.substring(mainMatch[0].length).trim();
                let bulletPoints = remainingContent.split(/\n(?=[-•]\s)/);

                bulletPoints.forEach(point => {
                    point = point.trim();
                    if (!point) return;

                    point = point.replace(/^[-•]\s*/, '');
                    let lines = point.split(/\n/).map(l => l.trim()).filter(l => l);
                    if (lines.length === 0) return;

                    let subHeading = lines[0];

                    formattedHTML += `<div class="ml-6 mb-3">`;
                    formattedHTML += `<div class="font-semibold text-sm mb-1.5">• ${subHeading}</div>`;

                    if (lines.length > 1) {
                        let explanation = lines.slice(1).join(' ');
                        formattedHTML += `<div class="ml-5 text-sm text-gray-600 leading-relaxed">${explanation}</div>`;
                    }

                    formattedHTML += `</div>`;
                });

                formattedHTML += `</div>`;
            });

            return formattedHTML || text;
        }

        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                document.getElementById('logoutForm').submit();
            }
        }

        // === RPP FORM HANDLER ===
        document.getElementById('rppForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            // Collect all checked dimensions
            const dimensiProfil = [];
            document.querySelectorAll('input[name="dimensi_profil[]"]:checked').forEach(checkbox => {
                dimensiProfil.push(checkbox.value);
            });

            // Collect all checked kemitraan pembelajaran
            const kemitraanPembelajaran = [];
            document.querySelectorAll('input[name="kemitraan_pembelajaran[]"]:checked').forEach(checkbox => {
                kemitraanPembelajaran.push(checkbox.value);
            });

            // Collect all checked strategi pembelajaran
            const strategiPembelajaran = [];
            document.querySelectorAll('input[name="strategi_pembelajaran[]"]:checked').forEach(checkbox => {
                strategiPembelajaran.push(checkbox.value);
            });
            const strategiLainnya = formData.get('strategi_pembelajaran_lainnya');
            if (strategiLainnya && strategiLainnya.trim() !== '') {
                strategiPembelajaran.push(strategiLainnya.trim());
            }

            // Collect all checked metode pembelajaran
            const metodePembelajaran = [];
            document.querySelectorAll('input[name="metode_pembelajaran[]"]:checked').forEach(checkbox => {
                metodePembelajaran.push(checkbox.value);
            });
            const metodeLainnya = formData.get('metode_pembelajaran_lainnya');
            if (metodeLainnya && metodeLainnya.trim() !== '') {
                metodePembelajaran.push(metodeLainnya.trim());
            }

            const data = {
                id_bidang: document.getElementById('rpp_id_bidang').value,
                id_program: document.getElementById('rpp_id_program').value,
                id_konsentrasi: document.getElementById('rpp_id_konsentrasi').value,
                id_fase: document.getElementById('rpp_id_fase').value,
                id_mapel: document.getElementById('rpp_id_mapel').value,
                dimensi_profil: dimensiProfil,
                jumlah_pertemuan: formData.get('jumlah_pertemuan'),
                jam_pelajaran: formData.get('jam_pelajaran'),
                tujuan_pembelajaran: formData.get('tujuan_pembelajaran'),
                praktik_pedagogis: formData.get('praktik_pedagogis'),
                kemitraan_pembelajaran: kemitraanPembelajaran,
                strategi_pembelajaran: strategiPembelajaran,
                metode_pembelajaran: metodePembelajaran,
                lingkungan_pembelajaran: formData.get('lingkungan_pembelajaran'),
                pemanfaatan_digital: formData.get('pemanfaatan_digital')
            };

            // Validation
            if (dimensiProfil.length === 0) {
                alert('Silakan pilih minimal satu Dimensi Profil Lulusan');
                return;
            }

            if (!data.tujuan_pembelajaran || data.tujuan_pembelajaran.trim() === '') {
                alert('Tujuan Pembelajaran wajib diisi');
                return;
            }

            if (!data.praktik_pedagogis || data.praktik_pedagogis.trim() === '') {
                alert('Praktik Pedagogis wajib diisi');
                return;
            }

            if (!data.lingkungan_pembelajaran || data.lingkungan_pembelajaran.trim() === '') {
                alert('Lingkungan Pembelajaran wajib diisi');
                return;
            }

            // Show loading
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mr-2 inline" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Generating dengan AI...';

            // Enhanced Markdown to HTML converter
            function convertMarkdownToHtml(markdown) {
                let html = markdown;

                // Escape HTML first to prevent XSS
                // html = html.replace(/</g, '&lt;').replace(/>/g, '&gt;');

                // Headers (must be done before other replacements)
                html = html.replace(/^#### (.+)$/gm, '<h4>$1</h4>');
                html = html.replace(/^### (.+)$/gm, '<h3>$1</h3>');
                html = html.replace(/^## (.+)$/gm, '<h2>$1</h2>');
                html = html.replace(/^# (.+)$/gm, '<h1>$1</h1>');

                // Bold and Italic (italic must be done after bold)
                html = html.replace(/\*\*\*(.+?)\*\*\*/g, '<strong><em>$1</em></strong>');
                html = html.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>');
                html = html.replace(/\*(.+?)\*/g, '<em>$1</em>');

                // Code inline
                html = html.replace(/`([^`]+)`/g, '<code class="bg-gray-100 px-2 py-1 rounded text-sm font-mono">$1</code>');

                // Horizontal rule
                html = html.replace(/^---+$/gm, '<hr>');

                // Process lists (numbered and bulleted)
                const lines = html.split('\n');
                let inList = false;
                let listType = '';
                let processed = [];

                for (let i = 0; i < lines.length; i++) {
                    const line = lines[i];

                    // Check for bullet list
                    if (line.match(/^\* (.+)$/)) {
                        if (!inList || listType !== 'ul') {
                            if (inList) processed.push('</ol>');
                            processed.push('<ul>');
                            inList = true;
                            listType = 'ul';
                        }
                        processed.push(line.replace(/^\* (.+)$/, '<li>$1</li>'));
                    }
                    // Check for numbered list
                    else if (line.match(/^(\d+)\. (.+)$/)) {
                        if (!inList || listType !== 'ol') {
                            if (inList) processed.push('</ul>');
                            processed.push('<ol>');
                            inList = true;
                            listType = 'ol';
                        }
                        processed.push(line.replace(/^(\d+)\. (.+)$/, '<li>$2</li>'));
                    }
                    // Regular line
                    else {
                        if (inList) {
                            processed.push(listType === 'ul' ? '</ul>' : '</ol>');
                            inList = false;
                            listType = '';
                        }
                        processed.push(line);
                    }
                }

                // Close any open list
                if (inList) {
                    processed.push(listType === 'ul' ? '</ul>' : '</ol>');
                }

                html = processed.join('\n');

                // Paragraphs (wrap text that isn't already in HTML tags)
                html = html.split('\n\n').map(block => {
                    const trimmed = block.trim();
                    if (trimmed && !trimmed.match(/^<[^>]+>/) && !trimmed.match(/<\/[^>]+>$/)) {
                        return '<p>' + trimmed + '</p>';
                    }
                    return trimmed;
                }).join('\n\n');

                // Line breaks
                html = html.replace(/\n/g, '<br>\n');

                // Remove <br> before and after block elements
                html = html.replace(/<br>\s*(<h[1-6]|<\/h[1-6]|<ul|<\/ul|<ol|<\/ol|<li|<\/li|<hr|<p|<\/p)/g, '$1');
                html = html.replace(/(<\/h[1-6]>|<\/ul>|<\/ol>|<\/li>|<hr>|<\/p>)\s*<br>/g, '$1');

                return html;
            }

            // Show Langkah Pembelajaran card with loading state IMMEDIATELY
            const langkahCard = document.getElementById('langkah_pembelajaran_card');
            const langkahLoading = document.getElementById('langkah_loading');
            const langkahContentWrapper = document.getElementById('langkah_content_wrapper');

            langkahCard.classList.remove('hidden');
            langkahLoading.classList.remove('hidden');
            langkahContentWrapper.classList.add('hidden');

            // Scroll to langkah card
            setTimeout(() => {
                langkahCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);

            // Submit to API
            fetch('/api/rpp/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                console.log('Response from server:', result);

                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;

                if (result.success) {
                    // Display AI-generated content
                    console.log('Langkah Pembelajaran data:', result.data?.langkah_pembelajaran);

                    if (result.data && result.data.langkah_pembelajaran) {
                        const langkah = result.data.langkah_pembelajaran;

                        // Hide loading, show content
                        setTimeout(() => {
                            langkahLoading.classList.add('hidden');
                            langkahContentWrapper.classList.remove('hidden');

                            let fullContent = '';

                            // Check if langkah is a string (new Markdown format) or object (old JSON format)
                            if (typeof langkah === 'string') {
                                // New format: AI returns full Markdown content
                                fullContent = langkah;
                                console.log('Using new Markdown format, length:', fullContent.length);
                            } else if (langkah.langkah_pembelajaran) {
                                // New format with wrapper
                                fullContent = langkah.langkah_pembelajaran;
                                console.log('Using wrapped Markdown format, length:', fullContent.length);
                            } else if (langkah.full_content) {
                                // Alternative key
                                fullContent = langkah.full_content;
                                console.log('Using full_content format, length:', fullContent.length);
                            } else if (langkah.pengalaman_belajar) {
                                // Old format fallback
                                fullContent += (langkah.pengalaman_belajar.memahami || '') + '\n\n';
                                fullContent += (langkah.pengalaman_belajar.mengaplikasi || '') + '\n\n';
                                fullContent += (langkah.pengalaman_belajar.merefleksi || '') + '\n\n';
                                if (langkah.asesmen) {
                                    fullContent += '\n\n## 📝 Asesmen Pembelajaran\n\n' + langkah.asesmen;
                                }
                                console.log('Using old JSON format');
                            }

                            // Convert markdown to HTML and display
                            if (fullContent && fullContent.trim().length > 0) {
                                // Split content into Langkah Pembelajaran and Asesmen
                                let langkahContent = fullContent;
                                let asesmenContent = '';

                                // Check if there's an Asesmen section
                                const asesmenMarker = /## 📝 Asesmen Pembelajaran/i;
                                if (asesmenMarker.test(fullContent)) {
                                    // Split at the Asesmen marker
                                    const parts = fullContent.split(asesmenMarker);
                                    langkahContent = parts[0].trim();
                                    asesmenContent = '## 📝 Asesmen Pembelajaran\n\n' + (parts[1] || '').trim();
                                    console.log('Content split - Langkah:', langkahContent.length, 'Asesmen:', asesmenContent.length);
                                } else {
                                    console.log('No Asesmen section found in content');
                                }

                                // Convert and display Langkah Pembelajaran
                                const htmlLangkahContent = convertMarkdownToHtml(langkahContent);
                                document.getElementById('langkah_content').innerHTML = htmlLangkahContent;

                                // Convert and display Asesmen (if exists)
                                if (asesmenContent.trim().length > 0) {
                                    const htmlAsesmenContent = convertMarkdownToHtml(asesmenContent);
                                    document.getElementById('langkah_asesmen').innerHTML = htmlAsesmenContent;
                                    console.log('Asesmen content rendered successfully');
                                } else {
                                    // If no asesmen section, show message
                                    document.getElementById('langkah_asesmen').innerHTML = `
                                        <div class="bg-orange-50 border-l-4 border-orange-400 p-6 rounded-lg">
                                            <div class="flex items-start gap-3">
                                                <svg class="w-6 h-6 text-orange-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                                </svg>
                                                <div class="flex-1">
                                                    <h3 class="text-lg font-bold text-orange-800 mb-2">Bagian Asesmen Belum Tersedia</h3>
                                                    <p class="text-orange-700 leading-relaxed">
                                                        AI belum menghasilkan bagian asesmen. Silakan coba generate ulang atau tambahkan secara manual.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                }

                                console.log('Content rendered successfully');

                                // Show content wrapper and action buttons
                                document.getElementById('langkah_content_wrapper').classList.remove('hidden');
                                document.getElementById('actionButtons').classList.remove('hidden');

                                // Store content for download and save
                                window.rppContent = fullContent;
                                window.rppData = data;
                                window.langkahPembelajaran = langkah;
                            } else {
                                console.error('No valid content found');
                                document.getElementById('langkah_content').innerHTML = '<p class="text-red-600">❌ Konten kosong. Silakan coba lagi.</p>';
                                document.getElementById('langkah_asesmen').innerHTML = '<p class="text-red-600">❌ Konten kosong. Silakan coba lagi.</p>';
                            }
                        }, 1500);
                    } else {
                        // If no AI content, hide loading and show error
                        setTimeout(() => {
                            langkahLoading.classList.add('hidden');
                            langkahContentWrapper.classList.remove('hidden');
                            document.getElementById('langkah_content').innerHTML = '<p class="text-red-600">❌ Gagal menghasilkan konten. Silakan coba lagi.</p>';
                        }, 1500);
                    }

                    // DON'T reset form or hide it - keep it visible for regeneration
                    // Scroll back to top of results section
                    setTimeout(() => {
                        langkahCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 2000);
                } else {
                    alert('❌ Gagal generate RPP: ' + result.message);
                    // Hide loading, keep card visible for retry
                    langkahLoading.classList.add('hidden');
                }
            })
            .catch(error => {
                console.error('Error:', error);

                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;

                // Show error in the content area
                langkahLoading.classList.add('hidden');
                langkahContentWrapper.classList.remove('hidden');

                // Check error type
                let errorHtml = '';
                let errorTitle = 'Terjadi Kesalahan';
                let errorColor = 'red';

                if (error.message && error.message.includes('timeout')) {
                    errorTitle = '⏱️ Timeout - Waktu Habis';
                    errorColor = 'blue';
                    errorHtml = `
                        <div class="bg-blue-50 border-l-4 border-blue-400 p-6 rounded-lg">
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-blue-800 mb-2">Koneksi Timeout</h3>
                                    <p class="text-blue-700 mb-4 leading-relaxed">
                                        Proses generate RPP membutuhkan waktu lebih dari 3 menit dan timeout.
                                        Ini bisa terjadi karena prompt terlalu panjang atau koneksi internet lambat.
                                    </p>
                                    <div class="bg-white/70 p-4 rounded-lg mb-4">
                                        <p class="font-semibold text-gray-900 mb-2">💡 Solusi:</p>
                                        <ol class="list-decimal list-inside space-y-2 text-sm text-gray-700">
                                            <li><strong>Kurangi jumlah pertemuan</strong> - Coba dengan 1-2 pertemuan dulu</li>
                                            <li><strong>Sederhanakan tujuan pembelajaran</strong> - Gunakan kalimat yang lebih ringkas</li>
                                            <li><strong>Cek koneksi internet</strong> - Pastikan koneksi stabil</li>
                                            <li><strong>Coba lagi</strong> - Kadang server lebih cepat di waktu berbeda</li>
                                        </ol>
                                    </div>
                                    <div class="bg-blue-100 p-3 rounded mt-3">
                                        <p class="text-xs text-blue-800">
                                            <strong>ℹ️ Info:</strong> Timeout setting saat ini: 3 menit. Jika masih timeout, berarti AI butuh waktu lebih lama untuk generate output yang detail.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                } else if (error.message && error.message.includes('kuota')) {
                    errorTitle = '⚠️ Kuota API Habis';
                    errorColor = 'orange';
                    errorHtml = `
                        <div class="bg-orange-50 border-l-4 border-orange-400 p-6 rounded-lg">
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-orange-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-orange-800 mb-2">Kuota API Gemini Tercapai</h3>
                                    <p class="text-orange-700 mb-4 leading-relaxed">
                                        API Google Gemini mencapai batas kuota (rate limit). Ini berarti terlalu banyak permintaan dalam waktu singkat.
                                    </p>
                                    <div class="bg-white/70 p-4 rounded-lg mb-4">
                                        <p class="font-semibold text-gray-900 mb-2">💡 Solusi:</p>
                                        <ol class="list-decimal list-inside space-y-2 text-sm text-gray-700">
                                            <li><strong>Tunggu 5-10 menit</strong> lalu coba lagi (kuota akan reset otomatis)</li>
                                            <li><strong>Gunakan jam sepi</strong> - hindari jam sibuk (08:00-16:00)</li>
                                            <li><strong>Periksa kuota API</strong> di <a href="https://aistudio.google.com/app/apikey" target="_blank" class="text-blue-600 underline hover:text-blue-800">Google AI Studio</a></li>
                                            <li>Jika pakai <strong>free tier</strong>, pertimbangkan upgrade ke paid plan untuk kuota lebih besar</li>
                                        </ol>
                                    </div>
                                    <div class="bg-orange-100 p-3 rounded mt-3">
                                        <p class="text-xs text-orange-800">
                                            <strong>ℹ️ Info Teknis:</strong> Error 429 - Too Many Requests. Free tier Gemini API memiliki limit ~15 requests per menit dan 1500 requests per hari.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                } else if (error.message && error.message.includes('overload')) {
                    errorTitle = '⏳ Server AI Sibuk';
                    errorColor = 'yellow';
                    errorHtml = `
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-lg">
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-yellow-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-yellow-800 mb-2">Server AI Sedang Penuh</h3>
                                    <p class="text-yellow-700 mb-4 leading-relaxed">
                                        Google Gemini API sedang mengalami beban tinggi. Sistem sudah mencoba beberapa kali secara otomatis.
                                    </p>
                                    <div class="bg-white/70 p-4 rounded-lg mb-4">
                                        <p class="font-semibold text-gray-900 mb-2">💡 Solusi:</p>
                                        <ol class="list-decimal list-inside space-y-1 text-sm text-gray-700">
                                            <li>Tunggu 1-2 menit</li>
                                            <li>Klik tombol <strong>"Generate dengan AI"</strong> lagi</li>
                                            <li>Jika masih gagal, coba lagi di jam yang berbeda</li>
                                        </ol>
                                    </div>
                                    <p class="text-xs text-yellow-600">
                                        ℹ️ Ini bukan kesalahan sistem Anda, tapi dari server Google yang sedang padat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    `;
                } else {
                    errorHtml = `
                        <div class="bg-red-50 border-l-4 border-red-400 p-6 rounded-lg">
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-red-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-red-800 mb-2">Gagal Generate RPP</h3>
                                    <p class="text-red-700 mb-4 leading-relaxed">
                                        Terjadi kesalahan saat menghubungi server AI. Silakan coba lagi.
                                    </p>
                                    <div class="bg-white/70 p-3 rounded text-xs text-gray-600 font-mono">
                                        ${error.message || 'Unknown error'}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }

                document.getElementById('langkah_content').innerHTML = errorHtml;
            });
        });

        // Download RPP as PDF - Simple and Reliable
        const downloadBtn = document.getElementById('downloadBtn');
        if (downloadBtn) {
            downloadBtn.addEventListener('click', function() {
                const button = this;
                const originalText = button.innerHTML;

                console.log('Download PDF button clicked');

                // Show loading
                button.disabled = true;
                button.innerHTML = `
                    <svg class="animate-spin h-5 w-5 mr-2 inline" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Mengunduh PDF...
                `;

                // Function to reset button
                const resetButton = () => {
                    button.disabled = false;
                    button.innerHTML = originalText;
                    console.log('Button reset to original state');
                };

                // Wait for markdown rendering to complete
                setTimeout(() => {
                    try {
                        // Check if html2pdf is available
                        if (typeof html2pdf === 'undefined') {
                            console.error('html2pdf library not loaded');
                            alert('Library PDF tidak tersedia. Silakan refresh halaman.');
                            resetButton();
                            return;
                        }

                        // Get the visible content
                        const sourceElement = document.getElementById('langkah_content');

                        if (!sourceElement) {
                            console.error('Content element not found');
                            alert('Konten tidak ditemukan');
                            resetButton();
                            return;
                        }

            // Clone and prepare content
            const clonedContent = sourceElement.cloneNode(true);

            // Remove all CSS classes from cloned content to avoid conflicts
            clonedContent.className = '';
            clonedContent.removeAttribute('class');

            // Create wrapper
            const printWrapper = document.createElement('div');
            printWrapper.style.cssText = 'background: white; padding: 20px; font-family: Arial, sans-serif;';

            // Add header
            printWrapper.innerHTML = `
                <div style="text-align: center; margin-bottom: 15px; padding-bottom: 10px; border-bottom: 2px solid #0066CC;">
                    <h1 style="font-size: 20px; font-weight: bold; color: #0066CC; margin: 0 0 8px 0;">
                        RENCANA PELAKSANAAN PEMBELAJARAN (RPP)
                    </h1>
                    <p style="font-size: 12px; margin: 3px 0; font-weight: bold;">Kurikulum Merdeka - SMK</p>
                    <p style="font-size: 10px; color: #666; margin: 3px 0;">
                        ${new Date().toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}
                    </p>
                </div>
            `;

            // Get Filter Data
            const bidangKeahlian = document.querySelector('#bidang_keahlian option:checked')?.text || '-';
            const programKeahlian = document.querySelector('#program_keahlian option:checked')?.text || '-';
            const konsentrasiKeahlianValue = document.querySelector('#konsentrasi_keahlian')?.value || '';
            const konsentrasiKeahlian = document.querySelector('#konsentrasi_keahlian option:checked')?.text || '-';

            // Determine Fase based on selection
            // If Konsentrasi Keahlian is selected → Fase F
            // If only Bidang and Program Keahlian → Fase E
            const fase = konsentrasiKeahlianValue && konsentrasiKeahlianValue !== '' ? 'Fase F' : 'Fase E';

            // Get RPP Form Data
            const formData = {
                dimensi_profil: [],
                jumlah_pertemuan: document.querySelector('input[name="jumlah_pertemuan"]')?.value || '-',
                jam_pelajaran: document.querySelector('input[name="jam_pelajaran"]')?.value || '-',
                tujuan_pembelajaran: document.querySelector('textarea[name="tujuan_pembelajaran"]')?.value || '-',
                praktik_pedagogis: document.querySelector('select[name="praktik_pedagogis"]')?.value || '-',
                strategi_pembelajaran: [],
                kemitraan_pembelajaran: [],
                metode_pembelajaran: [],
                lingkungan_pembelajaran: document.querySelector('textarea[name="lingkungan_pembelajaran"]')?.value || '-',
                pemanfaatan_digital: document.querySelector('textarea[name="pemanfaatan_digital"]')?.value || '-'
            };

            // Get checked dimensi profil
            document.querySelectorAll('input[name="dimensi_profil[]"]:checked').forEach(cb => {
                formData.dimensi_profil.push(cb.value);
            });

            // Get checked strategi pembelajaran
            document.querySelectorAll('input[name="strategi_pembelajaran[]"]:checked').forEach(cb => {
                formData.strategi_pembelajaran.push(cb.value);
            });
            const strategiLainnya = document.querySelector('input[name="strategi_pembelajaran_lainnya"]')?.value;
            if (strategiLainnya) formData.strategi_pembelajaran.push(strategiLainnya);

            // Get checked kemitraan pembelajaran
            document.querySelectorAll('input[name="kemitraan_pembelajaran[]"]:checked').forEach(cb => {
                formData.kemitraan_pembelajaran.push(cb.value);
            });

            // Get checked metode pembelajaran
            document.querySelectorAll('input[name="metode_pembelajaran[]"]:checked').forEach(cb => {
                formData.metode_pembelajaran.push(cb.value);
            });
            const metodeLainnya = document.querySelector('input[name="metode_pembelajaran_lainnya"]')?.value;
            if (metodeLainnya) formData.metode_pembelajaran.push(metodeLainnya);

            // Add RPP Form Section
            const formSection = document.createElement('div');
            formSection.style.cssText = 'margin-bottom: 20px; page-break-after: always;';
            formSection.innerHTML = `
                <h2 style="font-size: 16px; font-weight: bold; margin: 15px 0 10px 0; color: #0066CC; border-bottom: 2px solid #0066CC; padding-bottom: 5px;">
                    FILTER CAPAIAN PEMBELAJARAN
                </h2>
                <div style="margin: 10px 0;">
                    <p style="font-size: 11px; margin: 4px 0;"><strong>Bidang Keahlian:</strong> ${bidangKeahlian}</p>
                    <p style="font-size: 11px; margin: 4px 0;"><strong>Program Keahlian:</strong> ${programKeahlian}</p>
                    <p style="font-size: 11px; margin: 4px 0;"><strong>Konsentrasi Keahlian:</strong> ${konsentrasiKeahlian}</p>
                    <p style="font-size: 11px; margin: 4px 0;"><strong>Fase:</strong> ${fase}</p>
                </div>

                <h2 style="font-size: 16px; font-weight: bold; margin: 15px 0 10px 0; color: #0066CC; border-bottom: 2px solid #0066CC; padding-bottom: 5px;">
                    I. IDENTIFIKASI PEMBELAJARAN
                </h2>
                <div style="margin: 10px 0;">
                    <p style="font-size: 11px; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Dimensi Profil Pelajar Pancasila:</p>
                    <ul style="margin: 4px 0; padding-left: 20px; font-size: 11px;">
                        ${formData.dimensi_profil.map(d => `<li style="margin: 2px 0;">${d}</li>`).join('')}
                    </ul>
                </div>

                <h2 style="font-size: 16px; font-weight: bold; margin: 15px 0 10px 0; color: #0066CC; border-bottom: 2px solid #0066CC; padding-bottom: 5px;">
                    II. ALOKASI WAKTU
                </h2>
                <div style="margin: 10px 0;">
                    <p style="font-size: 11px; margin: 4px 0;"><strong>Jumlah Pertemuan:</strong> ${formData.jumlah_pertemuan} pertemuan</p>
                    <p style="font-size: 11px; margin: 4px 0;"><strong>Jam Pelajaran per Pertemuan:</strong> ${formData.jam_pelajaran} JP (1 JP = 45 menit)</p>
                    <p style="font-size: 11px; margin: 4px 0;"><strong>Total Durasi:</strong> ${formData.jumlah_pertemuan * formData.jam_pelajaran * 45} menit</p>
                </div>

                <h2 style="font-size: 16px; font-weight: bold; margin: 15px 0 10px 0; color: #0066CC; border-bottom: 2px solid #0066CC; padding-bottom: 5px;">
                    III. DESAIN PEMBELAJARAN
                </h2>
                <div style="margin: 10px 0;">
                    <p style="font-size: 11px; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Tujuan Pembelajaran:</p>
                    <p style="font-size: 11px; margin: 4px 0; text-align: justify; line-height: 1.5;">${formData.tujuan_pembelajaran}</p>
                </div>
                <div style="margin: 10px 0;">
                    <p style="font-size: 11px; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Model Pembelajaran / Praktik Pedagogis:</p>
                    <p style="font-size: 11px; margin: 4px 0;">${formData.praktik_pedagogis}</p>
                </div>
                ${formData.strategi_pembelajaran.length > 0 ? `
                <div style="margin: 10px 0;">
                    <p style="font-size: 11px; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Strategi Pembelajaran:</p>
                    <ul style="margin: 4px 0; padding-left: 20px; font-size: 11px;">
                        ${formData.strategi_pembelajaran.map(s => `<li style="margin: 2px 0;">${s}</li>`).join('')}
                    </ul>
                </div>
                ` : ''}
                ${formData.kemitraan_pembelajaran.length > 0 ? `
                <div style="margin: 10px 0;">
                    <p style="font-size: 11px; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Kemitraan Pembelajaran:</p>
                    <ul style="margin: 4px 0; padding-left: 20px; font-size: 11px;">
                        ${formData.kemitraan_pembelajaran.map(k => `<li style="margin: 2px 0;">${k}</li>`).join('')}
                    </ul>
                </div>
                ` : ''}
                ${formData.metode_pembelajaran.length > 0 ? `
                <div style="margin: 10px 0;">
                    <p style="font-size: 11px; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Metode Pembelajaran:</p>
                    <ul style="margin: 4px 0; padding-left: 20px; font-size: 11px;">
                        ${formData.metode_pembelajaran.map(m => `<li style="margin: 2px 0;">${m}</li>`).join('')}
                    </ul>
                </div>
                ` : ''}
                <div style="margin: 10px 0;">
                    <p style="font-size: 11px; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Lingkungan Pembelajaran:</p>
                    <p style="font-size: 11px; margin: 4px 0; text-align: justify; line-height: 1.5;">${formData.lingkungan_pembelajaran}</p>
                </div>
                ${formData.pemanfaatan_digital && formData.pemanfaatan_digital !== '-' ? `
                <div style="margin: 10px 0;">
                    <p style="font-size: 11px; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Pemanfaatan Digital:</p>
                    <p style="font-size: 11px; margin: 4px 0; text-align: justify; line-height: 1.5;">${formData.pemanfaatan_digital}</p>
                </div>
                ` : ''}
            `;

            printWrapper.appendChild(formSection);

            // Clean and prepare AI content
            // Remove empty elements
            const emptyElements = clonedContent.querySelectorAll('p:empty, div:empty, br');
            emptyElements.forEach(el => {
                if (el.textContent.trim() === '') {
                    el.remove();
                }
            });

            // Remove any existing H1 or H2 headers from AI content to avoid duplication
            const existingHeaders = clonedContent.querySelectorAll('h1, h2');
            existingHeaders.forEach(header => {
                // If it's the main title, remove it
                if (header.textContent.includes('Langkah') || header.textContent.includes('Pembelajaran')) {
                    header.remove();
                }
            });

            // Style the AI-generated content inline
            const styleContent = (element) => {
                const tag = element.tagName;

                if (tag === 'H1') element.style.cssText = 'font-size: 16px; font-weight: bold; margin: 15px 0 8px 0; color: #0066CC; page-break-after: avoid; page-break-inside: avoid;';
                else if (tag === 'H2') element.style.cssText = 'font-size: 15px; font-weight: bold; margin: 12px 0 8px 0; color: #0066CC; page-break-after: avoid; page-break-inside: avoid;';
                else if (tag === 'H3') element.style.cssText = 'font-size: 13px; font-weight: bold; margin: 10px 0 6px 0; color: #1a56a6; background: #f0f7ff; padding: 6px 8px; border-radius: 4px; page-break-after: avoid; page-break-inside: avoid;';
                else if (tag === 'H4') element.style.cssText = 'font-size: 12px; font-weight: bold; margin: 8px 0 5px 0; color: #333; page-break-after: avoid;';
                else if (tag === 'P') element.style.cssText = 'margin: 6px 0; line-height: 1.5; text-align: justify; font-size: 11px; color: #333;';
                else if (tag === 'UL' || tag === 'OL') element.style.cssText = 'margin: 8px 0; padding-left: 25px; font-size: 11px; line-height: 1.5;';
                else if (tag === 'LI') element.style.cssText = 'margin: 3px 0; line-height: 1.5;';
                else if (tag === 'STRONG' || tag === 'B') element.style.cssText = 'font-weight: bold; color: #000;';
                else if (tag === 'EM' || tag === 'I') element.style.cssText = 'font-style: italic; color: #0066CC;';
                else if (tag === 'HR') element.style.cssText = 'border: none; border-top: 1px solid #ddd; margin: 10px 0;';
                else if (tag === 'TABLE') element.style.cssText = 'width: 100%; border-collapse: collapse; margin: 10px 0; font-size: 11px;';
                else if (tag === 'TH') element.style.cssText = 'border: 1px solid #ddd; padding: 8px; background: #f0f7ff; font-weight: bold; text-align: left;';
                else if (tag === 'TD') element.style.cssText = 'border: 1px solid #ddd; padding: 8px; text-align: left;';

                // Recursively style children
                for (let child of element.children) {
                    styleContent(child);
                }
            };

            styleContent(clonedContent);

            // Add Section IV header with page break
            const sectionHeader = document.createElement('div');
            sectionHeader.style.cssText = 'page-break-before: always; margin-top: 0; padding-top: 10px;';
            sectionHeader.innerHTML = `
                <h2 style="font-size: 16px; font-weight: bold; margin: 0 0 15px 0; color: #0066CC; border-bottom: 2px solid #0066CC; padding-bottom: 5px; page-break-after: avoid;">
                    IV. LANGKAH-LANGKAH PEMBELAJARAN
                </h2>
            `;

            printWrapper.appendChild(sectionHeader);
            printWrapper.appendChild(clonedContent);

            // PDF options - With proper margins to prevent text cutoff
            const opt = {
                margin: [15, 15, 15, 15], // top, right, bottom, left in mm
                filename: `RPP_${new Date().toISOString().split('T')[0]}.pdf`,
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: {
                    scale: 2,
                    logging: false,
                    dpi: 300,
                    letterRendering: true,
                    useCORS: true,
                    scrollY: 0,
                    scrollX: 0
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait',
                    compress: true
                },
                pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
            };

                        // Generate PDF
                        console.log('Starting PDF generation...');
                        html2pdf()
                            .from(printWrapper)
                            .set(opt)
                            .save()
                            .then(() => {
                                console.log('PDF generated successfully');
                                resetButton();
                            })
                            .catch((error) => {
                                console.error('Error generating PDF:', error);
                                alert('Terjadi kesalahan saat membuat PDF: ' + error.message);
                                resetButton();
                            });
                    } catch (error) {
                        console.error('Exception in PDF generation:', error);
                        alert('Terjadi kesalahan saat membuat PDF: ' + error.message);
                        resetButton();
                    }
                }, 500); // Wait 500ms for markdown rendering
            });
        }

        // Save RPP to database
        const saveRppBtn = document.getElementById('saveRppBtn');
        if (saveRppBtn) {
            saveRppBtn.addEventListener('click', async function() {
                const button = this;
                const originalText = button.innerHTML;

                // Confirm save
                if (!confirm('Simpan RPP ini ke dalam daftar RPP Saya?')) {
                    return;
                }

                // Show loading
                button.disabled = true;
                button.innerHTML = `
                    <svg class="animate-spin h-5 w-5 mr-2 inline" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Menyimpan...
                `;

                try {
                    // Collect all form data
                    const formElement = document.getElementById('rppForm');
                    const formData = new FormData(formElement);

                    // Get checkbox arrays
                    const dimensiProfil = [];
                    document.querySelectorAll('input[name="dimensi_profil[]"]:checked').forEach(cb => {
                        dimensiProfil.push(cb.value);
                    });

                    const strategiPembelajaran = [];
                    document.querySelectorAll('input[name="strategi_pembelajaran[]"]:checked').forEach(cb => {
                        strategiPembelajaran.push(cb.value);
                    });
                    const strategiLainnya = document.querySelector('input[name="strategi_pembelajaran_lainnya"]')?.value;
                    if (strategiLainnya) strategiPembelajaran.push(strategiLainnya);

                    const kemitraanPembelajaran = [];
                    document.querySelectorAll('input[name="kemitraan_pembelajaran[]"]:checked').forEach(cb => {
                        kemitraanPembelajaran.push(cb.value);
                    });

                    const metodePembelajaran = [];
                    document.querySelectorAll('input[name="metode_pembelajaran[]"]:checked').forEach(cb => {
                        metodePembelajaran.push(cb.value);
                    });
                    const metodeLainnya = document.querySelector('input[name="metode_pembelajaran_lainnya"]')?.value;
                    if (metodeLainnya) metodePembelajaran.push(metodeLainnya);

                    // Prepare data payload
                    const payload = {
                        id_bidang: document.getElementById('rpp_id_bidang').value,
                        id_program: document.getElementById('rpp_id_program').value,
                        id_konsentrasi: document.getElementById('rpp_id_konsentrasi').value,
                        id_fase: document.getElementById('rpp_id_fase').value,
                        id_mapel: document.getElementById('rpp_id_mapel').value,
                        dimensi_profil: dimensiProfil,
                        jumlah_pertemuan: formData.get('jumlah_pertemuan'),
                        jam_pelajaran: formData.get('jam_pelajaran'),
                        tujuan_pembelajaran: formData.get('tujuan_pembelajaran'),
                        praktik_pedagogis: formData.get('praktik_pedagogis'),
                        strategi_pembelajaran: strategiPembelajaran,
                        kemitraan_pembelajaran: kemitraanPembelajaran,
                        metode_pembelajaran: metodePembelajaran,
                        lingkungan_pembelajaran: formData.get('lingkungan_pembelajaran'),
                        pemanfaatan_digital: formData.get('pemanfaatan_digital') || '',
                        langkah_pembelajaran: window.langkahPembelajaran || window.rppContent
                    };

                    // Send to server
                    const response = await fetch('{{ route("rpp.saveGenerated") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(payload)
                    });

                    const result = await response.json();

                    if (result.success) {
                        // Success notification
                        button.innerHTML = `
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Tersimpan!
                        `;
                        button.classList.remove('bg-green-500', 'hover:bg-green-600');
                        button.classList.add('bg-green-700');

                        // Show success message and redirect
                        alert('✅ RPP berhasil disimpan!');

                        // Redirect to RPP list
                        setTimeout(() => {
                            window.location.href = result.redirect || '{{ route("rpp.index") }}';
                        }, 500);
                    } else {
                        throw new Error(result.message || 'Gagal menyimpan RPP');
                    }
                } catch (error) {
                    console.error('Error saving RPP:', error);
                    alert('❌ Gagal menyimpan RPP: ' + error.message);

                    // Reset button
                    button.disabled = false;
                    button.innerHTML = originalText;
                }
            });
        }

        // Print Langkah Pembelajaran
        function printLangkah() {
                window.print();
            }

            // Regenerate Langkah Pembelajaran (placeholder)
            function regenerateLangkah() {
                if (confirm('Apakah Anda yakin ingin membuat ulang langkah pembelajaran? Konten saat ini akan diganti.')) {
                    alert('Fitur regenerate akan segera tersedia');
                    // TODO: Implement regenerate functionality
                }
            }

            // Make functions globally accessible
            window.confirmLogout = confirmLogout;
            window.printRPP = printRPP;
            window.regenerateLangkah = regenerateLangkah;

            console.log('All event listeners attached successfully');
        }); // End DOMContentLoaded
    </script>
</body>
</html>
