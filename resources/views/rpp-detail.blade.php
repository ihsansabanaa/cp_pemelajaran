<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detail RPP - EduPlan</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.625rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            gap: 0.5rem;
            border: 1px solid transparent;
            cursor: pointer;
        }

        .btn-primary { background-color: #4F46E5; color: white; }
        .btn-primary:hover { background-color: #4338CA; }
        .btn-secondary { background-color: #10B981; color: white; }
        .btn-secondary:hover { background-color: #059669; }
        .btn-error { background-color: #EF4444; color: white; }
        .btn-error:hover { background-color: #DC2626; }

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

        .nav-link:hover { background-color: #f3f4f6; color: #4F46E5; }
        .nav-link.active { background-color: #eef2ff; color: #4F46E5; font-weight: 600; }

        .main-content {
            margin-top: 4rem;
            margin-left: 0;
            height: calc(100vh - 4rem);
            overflow-y: auto;
            padding: 1.5rem;
        }

        @media (min-width: 1024px) {
            .main-content { margin-left: 16rem; }
        }

        .page-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
        }

        .print-content {
            background: white;
            padding: 30px;
            border-radius: 8px;
        }

        @media print {
            body { background: white; position: static; overflow: visible; }
            .no-print { display: none !important; }
            .print-content { padding: 0; border-radius: 0; }
            .main-content { margin: 0; padding: 0; height: auto; overflow: visible; }
            .shadow-xl { box-shadow: none !important; }
            .backdrop-blur-sm { backdrop-filter: none !important; }
        }
        
        /* Optimize for PDF generation */
        .pdf-optimized .shadow-xl {
            box-shadow: 0 1px 3px rgba(0,0,0,0.1) !important;
        }
        .pdf-optimized .backdrop-blur-sm {
            backdrop-filter: none !important;
        }
    </style>
</head>
<body class="page-container">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 flex flex-col z-50 transform transition-transform duration-300 ease-in-out lg:translate-x-0 -translate-x-full no-print" id="sidebar">
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
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="fas fa-home w-5 text-center"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('rpp.index') }}" class="nav-link active">
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
                <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-semibold flex-shrink-0" style="background-color: var(--primary);">
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
    <header class="fixed top-0 right-0 left-0 bg-white border-b border-gray-200 z-40 lg:left-64 transition-all duration-300 no-print">
        <div class="flex items-center justify-between h-16 px-4 lg:px-6">
            <div class="flex items-center gap-4">
                <button id="openSidebar" class="text-gray-600 hover:text-gray-900 focus:outline-none lg:hidden">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-lg font-bold text-gray-900 hidden lg:block">Detail RPP</h1>
            </div>

            <div class="flex-1 flex justify-end items-center gap-4">
                <div class="lg:hidden">
                    <div class="w-9 h-9 rounded-full text-white flex items-center justify-center font-semibold text-sm" style="background-color: var(--primary);">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container mx-auto px-4 max-w-full">
            <!-- Action Buttons -->
            <div class="flex flex-wrap justify-end gap-3 mb-6 no-print">
                <a href="{{ route('rpp.downloadPdf', $rpp->id_rpp) }}" class="btn btn-primary">
                    <i class="fas fa-download"></i>
                    Download PDF
                </a>
                <button onclick="window.print()" class="btn btn-secondary">
                    <i class="fas fa-print"></i>
                    Print
                </button>
                <button onclick="deleteRpp()" class="btn btn-error">
                    <i class="fas fa-trash"></i>
                    Hapus
                </button>
            </div>

            <!-- RPP Content -->
            <div id="rppContent" class="space-y-6">
                <!-- Header Card -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-xl overflow-hidden">
                    <div class="relative bg-gradient-to-br from-primary/5 via-primary/10 to-transparent">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>
                        <div class="relative px-6 py-8 sm:px-8 text-center">
                            <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-primary/10 rounded-full mb-3" style="background-color: rgba(79, 70, 229, 0.1); color: var(--primary);">
                                <i class="fas fa-file-alt text-sm"></i>
                                <span class="text-sm font-semibold">Rencana Pelaksanaan Pembelajaran</span>
                            </div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                                {{ $rpp->konsentrasiKeahlian->nama_konsentrasi ?? 'RPP' }}
                            </h1>
                            <p class="text-gray-600 font-medium">
                                {{ $rpp->bidangKeahlian->nama_bidang ?? '-' }} - {{ $rpp->programKeahlian->nama_program ?? '-' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Filter Capaian Pembelajaran Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    <div class="bg-primary px-5 py-3">
                        <div class="flex items-center gap-2">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-white">Filter Capaian Pembelajaran</h2>
                                <p class="text-xs text-white/80 mt-0.5">Pilih jenis kurikulum untuk melihat CP yang tersedia</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-5">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <!-- Bidang Keahlian -->
                            <div class="bg-primary-50 p-5 rounded-xl border-2 border-primary-100">
                                <div class="flex items-start justify-between mb-4">
                                    <div>
                                        <label class="block text-sm font-bold text-gray-900 mb-1">Bidang Keahlian</label>
                                        <p class="text-xs text-gray-500">Pilih bidang keahlian terlebih dahulu</p>
                                    </div>
                                    <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full">Wajib</span>
                                </div>
                                <div class="bg-white px-4 py-3 rounded-lg border-2 border-gray-300">
                                    <p class="text-sm text-gray-900 font-medium">{{ $rpp->bidangKeahlian->nama_bidang ?? '-' }}</p>
                                </div>
                            </div>

                            <!-- Program Keahlian -->
                            <div class="bg-secondary-50 p-5 rounded-xl border-2 border-secondary-100">
                                <div class="flex items-start justify-between mb-4">
                                    <div>
                                        <label class="block text-sm font-bold text-gray-900 mb-1">Program Keahlian</label>
                                        <p class="text-xs text-gray-500">Fase E - Pilih setelah bidang keahlian</p>
                                    </div>
                                    <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full">Wajib</span>
                                </div>
                                <div class="bg-white px-4 py-3 rounded-lg border-2 border-gray-300">
                                    <p class="text-sm text-gray-900 font-medium">{{ $rpp->programKeahlian->nama_program ?? '-' }}</p>
                                </div>
                            </div>

                            <!-- Konsentrasi Keahlian -->
                            <div class="bg-accent-50 p-5 rounded-xl border-2 border-accent-100 lg:col-span-2">
                                <div class="flex items-start justify-between mb-4">
                                    <div>
                                        <label class="block text-sm font-bold text-gray-900 mb-1">Konsentrasi Keahlian</label>
                                        <p class="text-xs text-gray-500">Fase F - Opsional, hanya untuk tingkat lanjut</p>
                                    </div>
                                    <span class="px-3 py-1 bg-gray-400 text-white text-xs font-bold rounded-full">Opsional</span>
                                </div>
                                <div class="bg-white px-4 py-3 rounded-lg border-2 border-gray-300">
                                    <p class="text-sm text-gray-900 font-medium">{{ $rpp->konsentrasiKeahlian->nama_konsentrasi ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Komponen RPP Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    <div class="bg-primary px-5 py-3">
                        <div class="flex items-center gap-2">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-white">Komponen RPP</h2>
                                <p class="text-xs text-white/80 mt-0.5">Informasi lengkap komponen rencana pelaksanaan pembelajaran</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-5">
                        <!-- Section 1: Informasi Umum -->
                        <div class="mb-10">
                            <div class="bg-primary-50 p-5 rounded-xl border-2 border-primary-100 hover:border-primary transition-all">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center shadow-lg">
                                        <span class="text-white font-bold">1</span>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-primary">Informasi Umum</h3>
                                        <p class="text-xs text-gray-600 mt-0.5">Data dasar pelaksanaan pembelajaran</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                                    <div class="bg-white p-4 rounded-lg border-l-4 border-primary">
                                        <p class="text-xs text-gray-500 font-semibold mb-2">Fase</p>
                                        <p class="text-gray-900 font-bold text-lg">{{ $rpp->fase->nama_fase ?? '-' }}</p>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg border-l-4 border-primary">
                                        <p class="text-xs text-gray-500 font-semibold mb-2">Jumlah Pertemuan</p>
                                        <p class="text-gray-900 font-bold text-lg">{{ $rpp->jumlah_pertemuan ?? '-' }} <span class="text-sm font-medium">Pertemuan</span></p>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg border-l-4 border-primary">
                                        <p class="text-xs text-gray-500 font-semibold mb-2">Jam Pelajaran</p>
                                        <p class="text-gray-900 font-bold text-lg">{{ $rpp->jam_pelajaran ?? '-' }} <span class="text-sm font-medium">JP</span></p>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg border-l-4 border-primary">
                                        <p class="text-xs text-gray-500 font-semibold mb-2">Tanggal Dibuat</p>
                                        <p class="text-gray-900 font-bold">{{ $rpp->created_at->format('d F Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 2: Dimensi Profil -->
                        <div class="mb-10">
                            <div class="bg-indigo-50 p-5 rounded-xl border-2 border-indigo-100 hover:border-primary transition-all">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center shadow-lg">
                                        <span class="text-white font-bold">2</span>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-primary">Dimensi Profil Pelajar Pancasila</h3>
                                        <p class="text-xs text-gray-600 mt-0.5">Karakter yang dikembangkan dalam pembelajaran</p>
                                    </div>
                                </div>

                                
                                @if($rpp->dimensi_profil && is_array($rpp->dimensi_profil))
                                    <div class="flex flex-wrap gap-3">
                                        @foreach($rpp->dimensi_profil as $dimensi)
                                            <span class="px-4 py-2 rounded-lg bg-primary/10 text-primary font-medium text-sm border border-primary/20">
                                                {{ $dimensi }}
                                            </span>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-gray-600">-</p>
                                @endif
                            </div>
                        </div>

                        <!-- Section 3: Tujuan Pembelajaran -->
                        <div class="mb-10">
                            <div class="bg-accent-50 p-5 rounded-xl border-2 border-accent-100 hover:border-accent transition-all">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center shadow-lg">
                                        <span class="text-white font-bold">3</span>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-primary">Tujuan Pembelajaran</h3>
                                        <p class="text-xs text-gray-600 mt-0.5">Target capaian yang akan dicapai peserta didik</p>
                                    </div>
                                </div>

                                <div class="bg-white p-5 rounded-lg border-l-4 border-primary mt-4">
                                    <p class="text-gray-800 leading-relaxed whitespace-pre-wrap">{{ $rpp->tujuan_pembelajaran ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Section 4: Praktik Pedagogis -->
                        <div>
                            <div class="bg-orange-50 p-5 rounded-xl border-2 border-orange-100 hover:border-orange-500 transition-all">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center shadow-lg">
                                        <span class="text-white font-bold">4</span>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-primary">Praktik Pedagogis</h3>
                                        <p class="text-xs text-gray-600 mt-0.5">Implementasi pembelajaran yang akan dilaksanakan</p>
                                    </div>
                                </div>

                                
                                <div class="space-y-4 mt-4">
                                <!-- Praktik Pedagogis Text -->
                                <div class="bg-white p-5 rounded-lg border-l-4 border-primary">
                                    <h4 class="font-bold text-gray-900 mb-3 flex items-center gap-2 text-sm">
                                        <i class="fas fa-book-reader text-primary"></i>
                                        Deskripsi
                                    </h4>
                                    <p class="text-gray-800 leading-relaxed whitespace-pre-wrap text-sm">{{ $rpp->praktik_pedagogis ?? '-' }}</p>
                                </div>

                                <!-- Strategi Pembelajaran -->
                                @if($rpp->strategi_pembelajaran && is_array($rpp->strategi_pembelajaran))
                                <div class="bg-white p-5 rounded-lg border-l-4 border-secondary">
                                    <h4 class="font-bold text-gray-900 mb-3 flex items-center gap-2 text-sm">
                                        <i class="fas fa-chess text-secondary"></i>
                                        Strategi Pembelajaran
                                    </h4>
                                    <div class="flex flex-wrap gap-3">
                                        @foreach($rpp->strategi_pembelajaran as $strategi)
                                            <span class="px-4 py-2 rounded-lg bg-secondary/10 text-secondary font-medium text-sm border border-secondary/20">
                                                {{ $strategi }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <!-- Metode Pembelajaran -->
                                @if($rpp->metode_pembelajaran && is_array($rpp->metode_pembelajaran))
                                <div class="bg-white p-5 rounded-lg border-l-4" style="border-color: var(--primary);">
                                    <h4 class="font-bold text-gray-900 mb-3 flex items-center gap-2 text-sm">
                                        <i class="fas fa-lightbulb" style="color: var(--primary);"></i>
                                        Metode Pembelajaran
                                    </h4>
                                    <div class="flex flex-wrap gap-3">
                                        @foreach($rpp->metode_pembelajaran as $metode)
                                            <span class="px-4 py-2 rounded-lg font-medium text-sm" style="background-color: rgba(79, 70, 229, 0.1); color: var(--primary); border: 1px solid rgba(79, 70, 229, 0.2);">
                                                {{ $metode }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <!-- Kemitraan -->
                                @if($rpp->kemitraan_pembelajaran && is_array($rpp->kemitraan_pembelajaran))
                                <div class="bg-white p-5 rounded-lg border-l-4 border-amber-500">
                                    <h4 class="font-bold text-gray-900 mb-3 flex items-center gap-2 text-sm">
                                        <i class="fas fa-handshake text-amber-600"></i>
                                        Kemitraan Pembelajaran
                                    </h4>
                                    <div class="flex flex-wrap gap-3">
                                        @foreach($rpp->kemitraan_pembelajaran as $kemitraan)
                                            <span class="px-4 py-2 rounded-lg bg-amber-500/10 text-amber-600 font-medium text-sm border border-amber-500/20">
                                                {{ $kemitraan }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <!-- Lingkungan & Digital -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-white p-5 rounded-lg border-l-4 border-teal-500">
                                        <h4 class="font-bold text-gray-900 mb-3 flex items-center gap-2 text-sm">
                                            <i class="fas fa-map-marked-alt text-teal-600"></i>
                                            Lingkungan Pembelajaran
                                        </h4>
                                        <p class="text-gray-800 text-sm">{{ $rpp->lingkungan_pembelajaran ?? '-' }}</p>
                                    </div>

                                    @if($rpp->pemanfaatan_digital)
                                    <div class="bg-white p-5 rounded-lg border-l-4 border-accent">
                                        <h4 class="font-bold text-gray-900 mb-3 flex items-center gap-2 text-sm">
                                            <i class="fas fa-laptop-code text-accent"></i>
                                            Pemanfaatan Digital
                                        </h4>
                                        <p class="text-gray-800 text-sm">{{ $rpp->pemanfaatan_digital }}</p>
                                    </div>
                                    @endif
                                </div>
                                </div>                                </div>                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section V: Langkah Pembelajaran (AI Generated) -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-primary-dark rounded-xl flex items-center justify-center shadow-md">
                            <i class="fas fa-book-open text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                                📝 Langkah Pembelajaran
                                <i class="fas fa-robot text-primary/60 text-lg"></i>
                            </h2>
                            <p class="text-sm text-gray-600 mt-0.5">Generated by AI • Berkesadaran • Bermakna • Mengembirakan</p>
                        </div>
                    </div>

                    @if($rpp->langkah_pembelajaran)
                        @if(is_array($rpp->langkah_pembelajaran))
                            <div class="space-y-6">
                                @foreach($rpp->langkah_pembelajaran as $index => $langkah)
                                    <!-- Card per Pertemuan -->
                                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                                        <!-- Header Card -->
                                        <div class="bg-primary px-5 py-4">
                                            <div class="flex items-center justify-between gap-4">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                                        <span class="text-white font-bold text-2xl">{{ $loop->iteration }}</span>
                                                    </div>
                                                    <div>
                                                        <h3 class="text-xl font-bold text-white">Pertemuan {{ $loop->iteration }}</h3>
                                                        <p class="text-white/80 text-sm mt-0.5">{{ $rpp->jam_pelajaran ?? '-' }} JP × 45 menit</p>
                                                    </div>
                                                </div>
                                                <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 bg-white/20 rounded-lg backdrop-blur-sm">
                                                    <i class="fas fa-clock text-white/80 text-sm"></i>
                                                    <span class="text-white text-sm font-medium">{{ ($rpp->jam_pelajaran ?? 0) * 45 }} menit</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Content Card -->
                                        <div class="p-6 sm:p-8">
                                            <div class="bg-gradient-to-br from-primary-50 via-primary-50 to-primary-50 rounded-xl border border-primary-100 p-6">
                                                <div class="text-gray-800 leading-loose whitespace-pre-wrap text-justify">{{ is_string($langkah) ? $langkah : json_encode($langkah, JSON_PRETTY_PRINT) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                                <div class="bg-primary px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                            <i class="fas fa-book-open text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-white">Langkah Pembelajaran</h3>
                                            <p class="text-white/80 text-sm mt-0.5">Generated by AI</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-6 sm:p-8">
                                    <div class="bg-gradient-to-br from-primary-50 via-primary-50 to-primary-50 rounded-xl border border-primary-100 p-6">
                                        <p class="text-gray-800 leading-loose whitespace-pre-wrap text-justify">{{ $rpp->langkah_pembelajaran }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                            <div class="bg-primary px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                        <i class="fas fa-exclamation-circle text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-white">Langkah Pembelajaran</h3>
                                        <p class="text-white/80 text-sm mt-0.5">Tidak ada data</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 sm:p-8">
                                <p class="text-gray-600 text-center py-4">Belum ada langkah pembelajaran</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Footer -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    <div class="p-6 sm:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                            <p class="text-xs text-gray-500 font-semibold mb-2">Dibuat oleh</p>
                            <p class="font-bold text-gray-900 text-lg">{{ $rpp->user->name ?? '-' }}</p>
                            <p class="text-sm text-gray-600 mt-1">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                {{ $rpp->created_at->format('d F Y') }}
                            </p>
                        </div>
                        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200 text-right">
                            <p class="text-xs text-gray-500 font-semibold mb-8">Mengetahui,</p>
                            <div class="inline-block">
                                <p class="font-bold text-gray-900 text-lg border-t-2 border-gray-800 pt-2 px-8">
                                    Kepala Sekolah
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Sidebar Toggle
        document.getElementById('openSidebar')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('-translate-x-full');
        });

        document.getElementById('closeSidebar')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.add('-translate-x-full');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const openBtn = document.getElementById('openSidebar');
            if (window.innerWidth < 1024 && !sidebar.contains(event.target) && event.target !== openBtn) {
                sidebar.classList.add('-translate-x-full');
            }
        });

        function deleteRpp() {
            if (!confirm('Apakah Anda yakin ingin menghapus RPP ini? Tindakan ini tidak dapat dibatalkan.')) {
                return;
            }

            fetch('/api/rpp/{{ $rpp->id_rpp }}', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('RPP berhasil dihapus');
                    window.location.href = '{{ route("rpp.index") }}';
                } else {
                    alert('Gagal menghapus RPP: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus RPP');
            });
        }
    </script>
</body>
</html>
