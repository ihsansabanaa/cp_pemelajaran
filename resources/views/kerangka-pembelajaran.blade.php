<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerangka Pembelajaran - CP Pembelajaran SMK</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 antialiased" style="font-family: 'Inter', sans-serif;">
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
                    <a href="/" class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-white hover:text-primary-200 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>Beranda</span>
                    </a>
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

    <!-- Header Section -->
    <section class="pt-28 pb-12 px-4 bg-gradient-to-br from-primary-600 to-primary-700">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">Kerangka Pembelajaran</h1>
            <p class="text-lg text-primary-50 leading-relaxed max-w-3xl">
                Struktur dan tahapan dalam merancang pengalaman belajar yang efektif sesuai Kurikulum Merdeka.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-12 px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Overview Cards Grid -->
            <div class="grid md:grid-cols-2 gap-6 mb-12">
                <!-- Card 1: Praktik Pedagogis -->
                <div class="bg-white rounded-xl p-6 shadow-md border-l-4 border-primary">
                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">1</div>
                        <h3 class="text-xl font-bold text-gray-900">Praktik Pedagogis</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        Strategi mengajar yang dipilih guru untuk mencapai tujuan belajar dalam mencapai dimensi profil lulusan. Untuk mewujudkan pembelajaran mendalam guru berfokus pada pengalaman belajar peserta didik yang autentik, mengutamakan praktik nyata, mendorong keterampilan berpikir tingkat tinggi dan kolaborasi.
                    </p>
                </div>

                <!-- Card 2: Kemitraan Pembelajaran -->
                <div class="bg-white rounded-xl p-6 shadow-md border-l-4 border-secondary">
                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-10 h-10 bg-secondary text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">2</div>
                        <h3 class="text-xl font-bold text-gray-900">Kemitraan Pembelajaran</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        Kemitraan pembelajaran membentuk hubungan yang dinamis antara guru, peserta didik, orang tua, komunitas, dan mitra profesional. Pendekatan ini memindahkan kontrol pembelajaran dari guru saja menjadi kolaborasi bersama.
                    </p>
                </div>

                <!-- Card 3: Lingkungan Pembelajaran -->
                <div class="bg-white rounded-xl p-6 shadow-md border-l-4 border-cyan-500">
                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-10 h-10 bg-cyan-500 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">3</div>
                        <h3 class="text-xl font-bold text-gray-900">Lingkungan Pembelajaran</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        Lingkungan pembelajaran menekankan integrasi antara ruang fisik, ruang virtual, dan budaya belajar untuk mendukung pembelajaran mendalam. Ruang fisik dan virtual dirancang fleksibel sebagai tempat yang mendorong kolaborasi, refleksi, eksplorasi, dan berbagi ide, sehingga dapat mengakomodasi berbagai gaya belajar peserta didik dengan optimal.
                    </p>
                </div>

                <!-- Card 4: Pemanfaatan Digital -->
                <div class="bg-white rounded-xl p-6 shadow-md border-l-4 border-accent">
                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-10 h-10 bg-accent text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">4</div>
                        <h3 class="text-xl font-bold text-gray-900">Pemanfaatan Digital</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        Pemanfaatan teknologi digital juga memegang peran penting sebagai katalisator untuk menciptakan pembelajaran yang lebih interaktif, kolaboratif, dan kontekstual. Tersedianya beragam sumber belajar menjadi peluang menciptakan pengetahuan bermakna pada peserta didik.
                    </p>
                </div>
            </div>

            <!-- Praktik Pedagogis Detail Section -->
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-6">
                    <h2 class="text-3xl font-bold text-primary">Kerangka Pembelajaran</h2>
                    <span class="text-2xl">▸</span>
                    <h2 class="text-3xl font-bold text-cyan-500">Praktik Pedagogis</h2>
                </div>

                <div class="bg-gradient-to-br from-primary-50 to-white rounded-xl p-8 border border-primary-100 mb-8">
                    <p class="text-gray-700 leading-relaxed text-lg mb-6">
                        Pembelajaran Mendalam dapat dilaksanakan menggunakan berbagai praktik pedagogis dengan menerapkan tiga prinsip yaitu <strong>berkesadaran, bermakna, menggembirakan</strong>, contohnya:
                    </p>

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- List 1 -->
                        <div class="bg-white rounded-lg p-6 shadow-sm">
                            <ul class="space-y-3">
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-primary mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Pembelajaran Berbasis Inkuiri</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-primary mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Pembelajaran Berbasis Proyek</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-primary mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Pembelajaran Berbasis Masalah</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-primary mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Pembelajaran Kolaboratif</span>
                                </li>
                            </ul>
                        </div>

                        <!-- List 2 -->
                        <div class="bg-white rounded-lg p-6 shadow-sm">
                            <ul class="space-y-3">
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-primary mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Pembelajaran STEM (<em>Science, Technology, Engineering, Mathematic</em>)</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-primary mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Pembelajaran Berdiferensiasi</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-primary mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Dan sebagainya</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-6 bg-cyan-50 rounded-lg p-4 border-l-4 border-cyan-500">
                        <p class="text-gray-700 leading-relaxed">
                            <strong>Contoh lainnya:</strong> Diskusi, peta konsep, <em>advance organiser</em>, kerja kelompok, dan sebagainya
                        </p>
                    </div>
                </div>
            </div>

            <!-- Kemitraan Pembelajaran Detail Section -->
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-6">
                    <h2 class="text-3xl font-bold text-primary">Kerangka Pembelajaran</h2>
                    <span class="text-2xl">▸</span>
                    <h2 class="text-3xl font-bold text-cyan-500">Kemitraan Pembelajaran</h2>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Left Side: Description -->
                    <div class="bg-gradient-to-br from-secondary-50 to-white rounded-xl p-8 border border-secondary-100">
                        <p class="text-gray-700 leading-relaxed text-lg mb-6">
                            Kemitraan pembelajaran membentuk hubungan yang kolaboratif untuk memberikan <strong>pengalaman belajar, kebaruan informasi/ serta umpan balik</strong> kepada peserta didik melalui pengetahuan yang kontekstual dan nyata.
                        </p>
                    </div>

                    <!-- Right Side: Categories -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Contoh Kemitraan:</h3>
                        
                        <!-- Lingkungan Sekolah -->
                        <div class="bg-white rounded-lg p-5 shadow-sm border border-gray-200">
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-primary mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-1">Lingkungan Sekolah:</h4>
                                    <p class="text-sm text-gray-600">Kepala sekolah, pengawas sekolah, guru, dan peserta didik, dan lainnya</p>
                                </div>
                            </div>
                        </div>

                        <!-- Lingkungan Luar Sekolah -->
                        <div class="bg-white rounded-lg p-5 shadow-sm border border-gray-200">
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-secondary mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-1">Lingkungan Luar Sekolah:</h4>
                                    <p class="text-sm text-gray-600">MGMP, Mitra Profesional, Dunia Usaha, Dunia Industri, dan Dunia Kerja, Institusi/ lembaga Pendidikan, Media, dan lainnya</p>
                                </div>
                            </div>
                        </div>

                        <!-- Masyarakat -->
                        <div class="bg-white rounded-lg p-5 shadow-sm border border-gray-200">
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-cyan-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-1">Masyarakat:</h4>
                                    <p class="text-sm text-gray-600">Orang tua, Komunitas, Tokoh Masyarakat, Organisasi Keagamaan dan/atau Budaya, dan lainnya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lingkungan Pembelajaran Detail Section -->
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-6">
                    <h2 class="text-3xl font-bold text-primary">Kerangka Pembelajaran</h2>
                    <span class="text-2xl">▸</span>
                    <h2 class="text-3xl font-bold text-cyan-500">Lingkungan Pembelajaran</h2>
                </div>

                <div class="space-y-8">
                    <!-- Main Description -->
                    <div class="bg-gradient-to-br from-cyan-50 to-white rounded-xl p-8 border border-cyan-100">
                        <div class="flex items-start gap-3 mb-6">
                            <div class="w-10 h-10 bg-cyan-500 text-white rounded-lg flex items-center justify-center flex-shrink-0 font-bold">1</div>
                            <p class="text-gray-700 leading-relaxed text-lg">
                                Lingkungan pembelajaran menekankan <strong>integrasi antara budaya belajar, ruang fisik, dan ruang virtual untuk mendukung PM</strong>
                            </p>
                        </div>
                    </div>

                    <!-- Two Points Section -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Point 2 -->
                        <div class="bg-white rounded-xl p-6 shadow-md border-t-4 border-cyan-500">
                            <div class="flex items-start gap-3 mb-4">
                                <div class="w-8 h-8 bg-cyan-500 text-white rounded-lg flex items-center justify-center flex-shrink-0 font-bold text-sm">2</div>
                                <h3 class="text-lg font-bold text-gray-900">Lingkungan pembelajaran yang mendukung</h3>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-cyan-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <p class="text-gray-700 text-sm"><strong>budaya belajar</strong> yang dikembangkan agar tercipta iklim belajar yang aman, nyaman, dan saling memuliakan untuk pembelajaran yang kondusif, interaktif, dan memotivasi peserta didik bereks plorasi, berekspresi, dan kolaborasi.</p>
                                </div>
                                <div class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-cyan-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <p class="text-gray-700 text-sm">optimalisasi <strong>ruang fisik</strong> sebagai proses interaksi langsung dalam menciptakan suasana belajar yang kondusif, meningkatkan kenyamanan, serta mendukung PM seperti ruang kelas, laboratorium, ruang konseling, lingkungan sekolah, perpustakaan, lingkungan/alam sekitar, ruang seni, ruang praktik keterampilan, ruang ibadah, aula/auditorium, museum, dan lainnya</p>
                                </div>
                                <div class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-cyan-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <p class="text-gray-700 text-sm">pemanfaatan <strong>ruang virtual</strong> untuk interaksi, transfer ilmu, penilaian pembelajaran tanpa keterbatasan ruang fisik, seperti desain pembelajaran daring, platform pembelajaran daring/<em>hybrid</em>, dan penilaian daring, dan lainnya.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Placeholder for future content if needed -->
                        <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-200 flex items-center justify-center">
                            <p class="text-gray-400 italic text-center">Ruang untuk konten tambahan atau ilustrasi</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pemanfaatan Digital Detail Section -->
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-6">
                    <h2 class="text-3xl font-bold text-primary">Kerangka Pembelajaran</h2>
                    <span class="text-2xl">▸</span>
                    <h2 class="text-3xl font-bold text-cyan-500">Pemanfaatan Digital</h2>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Left Side: Description -->
                    <div class="bg-gradient-to-br from-accent-50 to-white rounded-xl p-8 border border-accent-100">
                        <p class="text-gray-700 leading-relaxed text-lg mb-6">
                            Teknologi digital dapat dimanfaatkan dalam perencanaan, pelaksanaan, dan asesmen pembelajaran. Peserta didik mendapatkan pengalaman belajar yang lebih <strong>interaktif, fleksibel, dan kolaboratif.</strong>
                        </p>
                    </div>

                    <!-- Right Side: Three Categories -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Contoh:</h3>
                        
                        <!-- Perencanaan Pembelajaran -->
                        <div class="bg-white rounded-lg p-5 shadow-sm border border-gray-200">
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-accent mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-1">Perencanaan Pembelajaran:</h4>
                                    <p class="text-sm text-gray-600">merancang dan mengelola kelas digital, manajemen perencanaan pembelajaran berbasis proyek), desain bahan ajar visual dan infografis, pembuatan konten interaktif seperti kuis dan simulasi, pemanfaatan kecerdasan artifisial, serta aplikasi desain instruksional, dan perencanaan pembelajaran lainnya.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Pelaksanaan Pembelajaran -->
                        <div class="bg-white rounded-lg p-5 shadow-sm border border-gray-200">
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-cyan-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-1">Pelaksanaan Pembelajaran:</h4>
                                    <p class="text-sm text-gray-600">pembelajaran sinkronus, kolaborasi daring, pembelajaran asinkronus, laman sumber belajar, perpustakaan digital, pemanfaatan kecerdasan artifisial, video edukasi, multimedia Interaktif, simulasi dan animasi, gamifikasi dan kuis, serta sumber lainnya.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Asesmen Pembelajaran -->
                        <div class="bg-white rounded-lg p-5 shadow-sm border border-gray-200">
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-primary mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-1">Asesmen Pembelajaran:</h4>
                                    <p class="text-sm text-gray-600">pembuatan tes otomatis, evaluasi orisinalitas dan kualitas tulisan, tes formatif berbasis interaktif, pemanfaatan kecerdasan artifisial, pengelolaan portofolio digital, dan sebagainya.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 px-4 bg-gradient-to-br from-primary-50 to-white border-t border-gray-200">
        <div class="max-w-4xl mx-auto text-center">
            <h3 class="text-2xl font-bold text-gray-900 mb-3">Terapkan Kerangka Pembelajaran</h3>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">Mulai merancang pembelajaran yang efektif dengan platform CP Pembelajaran SMK.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3 bg-primary text-white rounded-lg font-semibold hover:bg-primary-700 transition shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Daftar Gratis
                </a>
                <a href="/" class="inline-flex items-center justify-center gap-2 px-8 py-3 bg-white border-2 border-gray-300 text-gray-700 rounded-lg font-semibold hover:border-primary hover:text-primary transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Beranda
                </a>
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
                        <li><a href="/" class="text-sm text-gray-400 hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="/#features" class="text-sm text-gray-400 hover:text-white transition-colors">Fitur</a></li>
                        <li><a href="/#about" class="text-sm text-gray-400 hover:text-white transition-colors">Tentang</a></li>
                        <li><a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Login</a></li>
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

    <script>
        // Navbar scroll effect
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('nav');
            const heroHeight = document.querySelector('section').offsetHeight;
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > heroHeight - 100) {
                    // Scrolled past hero - white navbar
                    navbar.classList.remove('bg-black/40', 'border-white/10');
                    navbar.classList.add('bg-white/90', 'border-gray-200', 'shadow-lg');
                    
                    // Change text colors
                    const brandTitle = navbar.querySelector('.flex.flex-col .text-lg');
                    const brandSubtitle = navbar.querySelector('.flex.flex-col .text-xs');
                    const backLink = navbar.querySelector('a[href="/"]');
                    
                    if (brandTitle) {
                        brandTitle.classList.remove('text-white');
                        brandTitle.classList.add('text-gray-900');
                    }
                    if (brandSubtitle) {
                        brandSubtitle.classList.remove('text-white/80');
                        brandSubtitle.classList.add('text-gray-500');
                    }
                    if (backLink) {
                        backLink.classList.remove('text-white', 'hover:text-primary-200');
                        backLink.classList.add('text-gray-700', 'hover:text-primary');
                    }

                    // Change user dropdown colors (if authenticated)
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
                    // At hero - dark navbar
                    navbar.classList.remove('bg-white/90', 'border-gray-200', 'shadow-lg');
                    navbar.classList.add('bg-black/40', 'border-white/10');
                    
                    // Change text colors back
                    const brandTitle = navbar.querySelector('.flex.flex-col .text-lg');
                    const brandSubtitle = navbar.querySelector('.flex.flex-col .text-xs');
                    const backLink = navbar.querySelector('a[href="/"]');
                    
                    if (brandTitle) {
                        brandTitle.classList.remove('text-gray-900');
                        brandTitle.classList.add('text-white');
                    }
                    if (brandSubtitle) {
                        brandSubtitle.classList.remove('text-gray-500');
                        brandSubtitle.classList.add('text-white/80');
                    }
                    if (backLink) {
                        backLink.classList.remove('text-gray-700', 'hover:text-primary');
                        backLink.classList.add('text-white', 'hover:text-primary-200');
                    }

                    // Change user dropdown colors back (if authenticated)
                    @auth
                    const userName2 = navbar.querySelector('#userMenuButton .text-gray-900.font-semibold');
                    const userEmail2 = navbar.querySelector('#userMenuButton .text-gray-500');
                    const userIcon2 = navbar.querySelector('#userMenuIcon');
                    const userMenuBtn2 = navbar.querySelector('#userMenuButton');
                    
                    if (userName2) {
                        userName2.classList.remove('text-gray-900');
                        userName2.classList.add('text-white');
                    }
                    if (userEmail2) {
                        userEmail2.classList.remove('text-gray-500');
                        userEmail2.classList.add('text-white/80');
                    }
                    if (userIcon2) {
                        userIcon2.classList.remove('text-gray-500');
                        userIcon2.classList.add('text-white');
                    }
                    if (userMenuBtn2) {
                        userMenuBtn2.classList.remove('hover:bg-gray-100');
                        userMenuBtn2.classList.add('hover:bg-white/20');
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
