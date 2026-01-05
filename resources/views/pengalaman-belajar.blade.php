<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengalaman Belajar - CP Pembelajaran SMK</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;909&display=swap" rel="stylesheet">
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
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-white bg-white/10 hover:bg-white/20 rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            <span>Login</span>
                        </a>
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-primary-900 bg-white rounded-lg hover:bg-gray-100 transition-colors shadow-lg">
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
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">Pengalaman Belajar</h1>
            <p class="text-lg text-primary-50 leading-relaxed max-w-3xl">
                Merancang pengalaman belajar bermakna, kontekstual, dan relevan dengan industri sesuai Kurikulum Merdeka.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-12 px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Introduction with Circular Diagram -->
            <div class="grid md:grid-cols-2 gap-12 items-center mb-12">
                <!-- Circular Diagram (Left) -->
                <div class="flex justify-center">
                    <div class="relative w-full max-w-md">
                        <img src="{{ asset('images/pengalaman belajar.svg') }}" alt="Diagram Pengalaman Belajar" class="w-full h-auto">
                    </div>
                </div>
                
                <!-- Three Main Points (Right) -->
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Memahami</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Tahap awal peserta didik untuk aktif <strong>mengkonstruksi pengetahuan agar dapat memahami secara mendalam konsep atau materi dari berbagai sumber dan konteks.</strong> Pengetahuan pada fase ini terdiri dari pengetahuan esensial, pengetahuan aplikatif, dan pengetahuan nilai dan karakter.
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Mengaplikasi</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Pengalaman belajar yang menunjukan aktivitas peserta didik <strong>mengaplikasi pengetahuan dalam kehidupan secara kontekstual.</strong> Pengetahuan yang diperoleh oleh peserta didik melalui pendalaman pengetahuan.
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Merefleksi</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Proses di mana peserta didik mengevaluasi dan memaknai proses serta hasil dari tindakan atau praktik nyata yang telah mereka lakukan. <strong>Tahap refleksi melibatkan regulasi diri sebagai kemampuan individu untuk mengelola proses belajarnya secara mandiri,</strong> meliputi perencanaan, pelaksanaan, pengawasan, dan evaluasi terhadap cara belajar mereka.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Memahami Section (1) -->
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-6">
                    <h2 class="text-3xl font-bold text-primary">Pengalaman Belajar</h2>
                    <span class="text-2xl">▸</span>
                    <h2 class="text-3xl font-bold text-cyan-500">Memahami</h2>
                    <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center">
                        <span class="text-gray-900 font-bold text-lg">1</span>
                    </div>
                </div>

                <!-- Three Columns Table -->
                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <!-- Jenis Pengetahuan -->
                    <div class="bg-white rounded-lg border-2 border-primary shadow-md">
                        <div class="bg-primary text-white p-4 rounded-t-lg">
                            <h3 class="font-bold text-lg">Jenis Pengetahuan</h3>
                        </div>
                        <div class="p-6 min-h-[280px]">
                            <ul class="space-y-3 text-sm">
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Pengetahuan Esensial</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Pengetahuan Aplikatif</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Pengetahuan Nilai dan Karakter</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Karakteristik -->
                    <div class="bg-white rounded-lg border-2 border-primary shadow-md">
                        <div class="bg-primary text-white p-4 rounded-t-lg">
                            <h3 class="font-bold text-lg">Karakteristik</h3>
                        </div>
                        <div class="p-6 min-h-[280px]">
                            <ul class="space-y-3 text-sm">
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Menghubungkan pengetahuan baru dengan pengetahuan sebelumnya</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Menstimulasi proses berpikir peserta didik</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Menghubungkan dengan konteks nyata dan/atau kehidupan sehari-hari</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Memberikan kebebasan eksploratif dan kolaboratif</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Menanamkan nilai-nilai moral dan etika dan nilai positif lainnya</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Mengaitkan pembelajaran dengan pembentukan karakter peserta didik</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contoh -->
                    <div class="bg-white rounded-lg border-2 border-primary shadow-md">
                        <div class="bg-primary text-white p-4 rounded-t-lg">
                            <h3 class="font-bold text-lg">Contoh</h3>
                        </div>
                        <div class="p-6 min-h-[280px]">
                            <ul class="space-y-3 text-sm">
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Mengeksplorasi pengalaman-pengalaman peserta didik terhadap permasalahan sosial di masyarakat sebelum menyampaikan topik permasalahan sosial pada pembelajaran IPS</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Memberikan data kemiskinan di Indonesia serta meminta peserta didik untuk memahami dan memberikan tanggapan</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Three Type Cards Below -->
                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Pengetahuan Esensial -->
                    <div class="bg-white rounded-lg border-2 border-primary shadow-md">
                        <div class="bg-primary text-white p-4 rounded-t-lg">
                            <h3 class="font-bold text-lg">Pengetahuan Esensial</h3>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-700 text-sm leading-relaxed mb-4">
                                Pengetahuan dasar yang fundamental dalam suatu bidang atau disiplin ilmu, yang harus dipahami dan dikuasai untuk membangun pemahaman yang lebih kompleks dan dapat diterapkan dalam berbagai konteks
                            </p>
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <p class="text-xs font-semibold text-gray-900 mb-2">Contoh:</p>
                                <p class="text-xs text-gray-600">Bahasa (Kosa kata, tata bahasa dasar, pengetahuan wacana, dan empat keterampilan berbahasa)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pengetahuan Aplikatif -->
                    <div class="bg-white rounded-lg border-2 border-primary shadow-md">
                        <div class="bg-primary text-white p-4 rounded-t-lg">
                            <h3 class="font-bold text-lg">Pengetahuan Aplikatif</h3>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-700 text-sm leading-relaxed mb-4">
                                Pengetahuan yang berfokus pada penerapan konsep, teori, atau keterampilan dalam situasi nyata. Pengetahuan ini digunakan untuk menyelesaikan masalah, membuat keputusan, atau menciptakan sesuatu yang berdampak.
                            </p>
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <p class="text-xs font-semibold text-gray-900 mb-2">Contoh:</p>
                                <p class="text-xs text-gray-600">Bahasa (Memahami cara menggunakan keterampilan menulis untuk membuat laporan atau bahan presentasi yang efektif)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pengetahuan Nilai dan Karakter -->
                    <div class="bg-white rounded-lg border-2 border-primary shadow-md">
                        <div class="bg-primary text-white p-4 rounded-t-lg">
                            <h3 class="font-bold text-lg">Pengetahuan Nilai dan Karakter</h3>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-700 text-sm leading-relaxed mb-4">
                                Pengetahuan yang berkaitan dengan pemahaman tentang nilai-nilai moral, etika, budaya, dan kemanusiaan yang berperan penting dalam membentuk kepribadian, sikap, dan perilaku seseorang
                            </p>
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <p class="text-xs font-semibold text-gray-900 mb-2">Contoh:</p>
                                <p class="text-xs text-gray-600">Bahasa (Memahami cara menggunakan bahasa untuk membangun hubungan baik, menghindari konflik, serta menunjukkan empati dan kepedulian)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mengaplikasi Section (2) -->
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-6">
                    <h2 class="text-3xl font-bold text-primary">Pengalaman Belajar</h2>
                    <span class="text-2xl">▸</span>
                    <h2 class="text-3xl font-bold text-cyan-500">Mengaplikasi</h2>
                    <div class="w-10 h-10 bg-orange-400 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-lg">2</span>
                    </div>
                </div>

                <!-- Three Columns -->
                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Pendalaman Pengetahuan -->
                    <div class="bg-white rounded-lg border-2 border-primary shadow-md">
                        <div class="bg-primary text-white p-4 rounded-t-lg">
                            <h3 class="font-bold text-lg">Pendalaman Pengetahuan</h3>
                        </div>
                        <div class="p-6 min-h-[200px]">
                            <p class="text-sm leading-relaxed">
                                Memperluas atau mengembangkan pemahaman terhadap konsep dengan menghubungkannya ke situasi baru, pengalaman lain, atau bidang ilmu yang berbeda.
                            </p>
                        </div>
                    </div>

                    <!-- Karakteristik -->
                    <div class="bg-white rounded-lg border-2 border-primary shadow-md">
                        <div class="bg-primary text-white p-4 rounded-t-lg">
                            <h3 class="font-bold text-lg">Karakteristik</h3>
                        </div>
                        <div class="p-6 min-h-[200px]">
                            <ul class="space-y-2 text-sm">
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5 font-bold">•</span>
                                    <span><strong>Menghubungkan</strong> konsep baru dengan pengetahuan sebelumnya.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5 font-bold">•</span>
                                    <span><strong>Menerapkan</strong> pengetahuan ke dalam situasi nyata atau bidang lain.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5 font-bold">•</span>
                                    <span><strong>Mengembangkan</strong> pemahaman dengan eksplorasi lebih lanjut.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5 font-bold">•</span>
                                    <span><strong>Berpikir Kritis</strong> dan mencari solusi inovatif berdasarkan pengetahuan yang ada.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contoh -->
                    <div class="bg-white rounded-lg border-2 border-primary shadow-md">
                        <div class="bg-primary text-white p-4 rounded-t-lg">
                            <h3 class="font-bold text-lg">Contoh</h3>
                        </div>
                        <div class="p-6 min-h-[200px]">
                            <div class="space-y-4 text-sm">
                                <div>
                                    <p class="font-semibold text-gray-900 mb-1">Topik: Persamaan Linear</p>
                                    <ul class="space-y-1 ml-4">
                                        <li class="flex items-start gap-2">
                                            <span class="text-primary mt-0.5">•</span>
                                            <span><strong>Dasar:</strong> Peserta didik memahami bentuk umum persamaan linear dan cara menyelesaikannya.</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="text-primary mt-0.5">•</span>
                                            <span><strong>Pendalaman Pengetahuan:</strong> Peserta didik menerapkan persamaan linear dalam masalah keuangan, seperti menghitung keuntungan bisnis atau menentukan titik impas dalam penjualan produk.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Merefleksi Section (3) - Part 1 -->
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-6">
                    <h2 class="text-3xl font-bold text-primary">Pengalaman Belajar</h2>
                    <span class="text-2xl">▸</span>
                    <h2 class="text-3xl font-bold text-cyan-500">Merefleksi</h2>
                    <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-lg">3</span>
                    </div>
                </div>

                <!-- Three Columns -->
                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <!-- Regulasi Diri -->
                    <div class="bg-white rounded-lg border-2 border-primary shadow-md">
                        <div class="bg-primary text-white p-4 rounded-t-lg">
                            <h3 class="font-bold text-lg">Regulasi Diri</h3>
                        </div>
                        <div class="p-6 min-h-[200px]">
                            <p class="text-sm leading-relaxed">
                                Individu mampu mengendalikan pikiran, emosi, dan perilaku dalam mencapai tujuan tertentu. Dalam konteks pendidikan, regulasi diri sangat penting bagi peserta didik untuk mengelola proses belajar mereka secara mandiri dan efektif. Merefleksikan pengetahuan artinya murid <strong>memperluas dan menerapkan ide atau solusi baru.</strong>
                            </p>
                        </div>
                    </div>

                    <!-- Karakteristik -->
                    <div class="bg-white rounded-lg border-2 border-primary shadow-md">
                        <div class="bg-primary text-white p-4 rounded-t-lg">
                            <h3 class="font-bold text-lg">Karakteristik</h3>
                        </div>
                        <div class="p-6 min-h-[200px]">
                            <ul class="space-y-2 text-sm">
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Memotivasi diri sendiri untuk terus belajar bagaimana cara belajar</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Refleksi terhadap pencapaian tujuan pembelajaran (evaluasi diri)</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Menerapkan strategi berpikir</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Memiliki kemampuan metakognisi (meregulasi diri dalam pembelajaran)</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Meregulasi emosi dalam pembelajaran</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contoh -->
                    <div class="bg-white rounded-lg border-2 border-primary shadow-md">
                        <div class="bg-primary text-white p-4 rounded-t-lg">
                            <h3 class="font-bold text-lg">Contoh</h3>
                        </div>
                        <div class="p-6 min-h-[200px]">
                            <ul class="space-y-2 text-sm">
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Menyampaikan motivasi belajar sesuai pengalaman yang diperoleh</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Penilaian diri sendiri terhadap pencapaian tujuan pembelajaran</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-primary mt-0.5">•</span>
                                    <span>Murid berpikir kritis tentang dampak perubahan habitat terhadap makhluk hidup dan mengaitkannya dengan isu-isu global seperti perubahan iklim dan pelestarian lingkungan.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Merefleksi Section (3) - Part 2: Detailed Explanation -->
            <div class="mb-12 bg-gray-50 rounded-xl p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Pembelajaran Belajar Merefleksi</h3>
                
                <div class="space-y-6 text-gray-700 leading-relaxed">
                    <p>
                        Pengalaman belajar merefleksi dilalui dengan mengarahkan murid untuk melakukan evaluasi dan memberikan makna terhadap proses serta hasil dari pengalaman atau praktik yang telah mereka jalani.
                    </p>
                    
                    <p>
                        Pembelajaran belajar refleksi ini menekankan <strong>pentingnya kemampuan regulasi diri</strong>, yaitu keterampilan murid dalam mengatur proses belajarnya secara mandiri, mulai dari tahap perencanaan, pelaksanaan, pemantauan, hingga evaluasi strategi belajar yang digunakan.
                    </p>
                    
                    <p>
                        Melalui pengalaman belajar merefleksi, murid dapat memperluas pemahaman dan mengembangkan ide atau solusi baru yang dapat diterapkan dalam konteks lain, <strong>tidak hanya meninjau kembali</strong> apa yang telah mereka pelajari.
                    </p>
                    
                    <p>
                        Dalam pembelajaran belajar merefleksi, murid <strong>tidak hanya diminta untuk mengulang atau mengingat kembali</strong> materi yang telah dipelajari, tetapi diarahkan untuk <strong>mengonstruksi kembali pemahamannya</strong> secara kritis, menghubungkannya dengan konteks yang lebih luas, serta mengidentifikasi implikasi atau kemungkinan penerapan dalam situasi berbeda.
                    </p>
                    
                    <p>
                        Proses ini melibatkan keterampilan metakognitif, seperti menyadari cara berpikir mereka sendiri, mengevaluasi strategi yang digunakan saat belajar, serta menilai keberhasilan atau hambatan dalam pencapaian tujuan belajar.
                    </p>
                    
                    <p>
                        Dengan demikian, refleksi berfungsi sebagai <strong>jembatan antara pengalaman belajar dan transfer pengetahuan</strong>, memungkinkan murid untuk menggeneralisasi prinsip-prinsip inti, memformulasikan pertanyaan baru, serta mengembangkan alternatif ide atau solusi yang dapat diterapkan di luar konteks awal pembelajaran.
                    </p>
                    
                    <p class="font-semibold text-gray-900 text-lg">
                        Pendekatan ini memperkuat pembelajaran mendalam karena mendorong murid menjadi pembelajar aktif, reflektif, dan adaptif.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 px-4 bg-gradient-to-br from-primary-50 to-white border-t border-gray-200">
        <div class="max-w-4xl mx-auto text-center">
            <h3 class="text-2xl font-bold text-gray-900 mb-3">Rancang Pengalaman Belajar Bermakna</h3>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">Mulai merancang pengalaman belajar yang efektif dengan platform CP Pembelajaran SMK.</p>
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
            const userMenuButton = document.getElementById('userMenuButton');
            const userMenuDropdown = document.getElementById('userMenuDropdown');
            const userMenuIcon = document.getElementById('userMenuIcon');
            
            // User dropdown functionality
            if (userMenuButton) {
                userMenuButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    userMenuDropdown.classList.toggle('hidden');
                    if (userMenuIcon) {
                        userMenuIcon.classList.toggle('rotate-180');
                    }
                });
                
                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!userMenuButton.contains(e.target) && !userMenuDropdown.contains(e.target)) {
                        userMenuDropdown.classList.add('hidden');
                        if (userMenuIcon) {
                            userMenuIcon.classList.remove('rotate-180');
                        }
                    }
                });
            }
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > heroHeight - 100) {
                    // Scrolled past hero - white navbar
                    navbar.classList.remove('bg-black/40', 'border-white/10');
                    navbar.classList.add('bg-white/90', 'border-gray-200', 'shadow-lg');
                    
                    // Change text colors
                    const brandTitle = navbar.querySelector('.flex.flex-col .text-lg');
                    const brandSubtitle = navbar.querySelector('.flex.flex-col .text-xs');
                    const backLink = navbar.querySelector('a[href="/"]');
                    const userName = navbar.querySelector('#userMenuButton .text-sm.font-semibold');
                    const userEmail = navbar.querySelector('#userMenuButton .text-xs');
                    
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
                    if (userName) {
                        userName.classList.remove('text-white');
                        userName.classList.add('text-gray-900');
                    }
                    if (userEmail) {
                        userEmail.classList.remove('text-white/80');
                        userEmail.classList.add('text-gray-500');
                    }
                } else {
                    // At hero - dark navbar
                    navbar.classList.remove('bg-white/90', 'border-gray-200', 'shadow-lg');
                    navbar.classList.add('bg-black/40', 'border-white/10');
                    
                    // Change text colors back
                    const brandTitle = navbar.querySelector('.flex.flex-col .text-lg');
                    const brandSubtitle = navbar.querySelector('.flex.flex-col .text-xs');
                    const backLink = navbar.querySelector('a[href="/"]');
                    const userName = navbar.querySelector('#userMenuButton .text-sm.font-semibold');
                    const userEmail = navbar.querySelector('#userMenuButton .text-xs');
                    
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
                    if (userName) {
                        userName.classList.remove('text-gray-900');
                        userName.classList.add('text-white');
                    }
                    if (userEmail) {
                        userEmail.classList.remove('text-gray-500');
                        userEmail.classList.add('text-white/80');
                    }
                }
            });
        });
        
        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                document.getElementById('logoutForm').submit();
            }
        }
    </script>
</body>
</html>
