<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CP Pembelajaran SMK - Sistem Manajemen Capaian Pembelajaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
        }
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px);
        }
    </style>
</head>
<body class="bg-white">

    <!-- Navbar -->
    <nav class="bg-white/95 backdrop-blur-sm shadow-sm fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-400 to-primary-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-800">CP Pembelajaran</span>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}" class="px-5 py-2 text-gray-700 font-medium hover:text-primary-600 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="px-5 py-2 bg-primary-500 text-white rounded-lg font-medium hover:bg-primary-600 transition shadow-sm">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-24 pb-16 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <div class="inline-block mb-4 px-4 py-1.5 bg-primary-50 text-primary-600 rounded-full text-sm font-medium">
                Kurikulum Merdeka
            </div>
            <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Sistem Manajemen<br/>
                <span class="text-primary-500">Capaian Pembelajaran SMK</span>
            </h1>
            <p class="text-xl text-gray-600 mb-10 max-w-3xl mx-auto">
                Platform digital terintegrasi untuk mengelola capaian pembelajaran SMK se-Indonesia
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="px-8 py-3.5 bg-primary-500 text-white rounded-xl font-semibold hover:bg-primary-600 transition shadow-lg hover:shadow-xl">
                    Mulai Sekarang
                </a>
                <a href="#about" class="px-8 py-3.5 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-gradient-to-r from-primary-500 to-primary-600">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
                <div>
                    <div class="text-4xl md:text-5xl font-bold mb-1">10</div>
                    <div class="text-primary-100 text-sm md:text-base">Bidang Keahlian</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-bold mb-1">50</div>
                    <div class="text-primary-100 text-sm md:text-base">Program Keahlian</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-bold mb-1">60</div>
                    <div class="text-primary-100 text-sm md:text-base">Kompetensi Keahlian</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-bold mb-1">157</div>
                    <div class="text-primary-100 text-sm md:text-base">Mata Pelajaran</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-3">Fitur Unggulan</h2>
                <p class="text-gray-600 text-lg">Solusi lengkap manajemen pembelajaran SMK</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 - Dimensi Profil Lulusan -->
                <a href="{{ route('dimensi.profil.lulusan') }}" class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl card-hover border border-gray-100 block">
                    <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Dimensi Profil Lulusan</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Mengidentifikasi dimensi profil pelajar Pancasila yang menjadi target capaian lulusan SMK</p>
                </a>

                <!-- Card 2 - Prinsip Pembelajaran -->
                <a href="{{ route('prinsip.pembelajaran') }}" class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl card-hover border border-gray-100 block">
                    <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Prinsip Pembelajaran</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Menerapkan prinsip pembelajaran berpusat pada peserta didik sesuai kurikulum merdeka</p>
                </a>

                <!-- Card 3 - Pengalaman Belajar -->
                <a href="{{ route('pengalaman.belajar') }}" class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl card-hover border border-gray-100 block">
                    <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Pengalaman Belajar</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Merancang pengalaman belajar bermakna, kontekstual, dan relevan dengan industri</p>
                </a>

                <!-- Card 4 -->
                <a href="{{ route('kerangka.pembelajaran') }}" class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl card-hover border border-gray-100 block">
                    <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Kerangka Pembelajaran</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Struktur dan tahapan dalam merancang pengalaman belajar yang efektif</p>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 px-4 bg-gray-50" id="about">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Tentang Sistem</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        CP Pembelajaran SMK adalah platform digital untuk mengelola data capaian pembelajaran di SMK. Mengintegrasikan seluruh komponen pendidikan kejuruan dengan interface yang user-friendly.
                    </p>
                    <p class="text-gray-600 leading-relaxed mb-8">
                        Memudahkan guru, kepala sekolah, dan administrator dalam mengakses, mengelola, dan mengembangkan kurikulum SMK sesuai standar Kurikulum Merdeka.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-primary-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span class="text-gray-700">Sesuai Kurikulum Merdeka</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-primary-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span class="text-gray-700">Mudah Digunakan</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-primary-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span class="text-gray-700">Data Terstruktur & Akurat</span>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-gradient-to-br from-primary-500 to-primary-600 rounded-3xl p-12 text-white shadow-2xl">
                        <div class="space-y-6">
                            <div class="text-5xl font-bold">10+</div>
                            <p class="text-xl">Bidang Keahlian Terintegrasi</p>
                            <div class="pt-4 border-t border-white/20">
                                <div class="text-3xl font-bold mb-2">157</div>
                                <p class="text-primary-100">Mata Pelajaran Tersedia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Siap Memulai?</h2>
            <p class="text-xl text-gray-600 mb-8">
                Bergabunglah dengan sistem manajemen capaian pembelajaran modern untuk SMK
            </p>
            <a href="{{ route('register') }}" class="inline-block px-10 py-4 bg-primary-500 text-white rounded-xl font-semibold hover:bg-primary-600 transition shadow-lg hover:shadow-xl">
                Daftar Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <div class="flex items-center justify-center gap-2 mb-4">
                <div class="w-8 h-8 bg-primary-500 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                    </svg>
                </div>
                <span class="text-lg font-semibold text-white">CP Pembelajaran SMK</span>
            </div>
            <p class="mb-2">&copy; 2025 Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi</p>
            <p class="text-sm mb-6">Sistem Manajemen Capaian Pembelajaran SMK</p>
            <div class="flex justify-center gap-6 text-sm">
                <a href="#" class="hover:text-primary-400 transition">Kebijakan Privasi</a>
                <span>•</span>
                <a href="#" class="hover:text-primary-400 transition">Syarat & Ketentuan</a>
                <span>•</span>
                <a href="#" class="hover:text-primary-400 transition">Kontak</a>
            </div>
        </div>
    </footer>
</body>
</html>
