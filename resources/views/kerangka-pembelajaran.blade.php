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
                <div class="flex items-center gap-2">
                    <a href="/" class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-white hover:text-primary-200 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>Beranda</span>
                    </a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-white bg-primary border border-primary rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary transition-colors shadow-lg">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-white bg-primary border border-primary rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary transition-colors shadow-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            <span class="hidden md:inline">Login</span>
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
            <!-- Introduction -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Pengantar Kerangka Pembelajaran</h2>
                <p class="text-gray-700 leading-relaxed text-lg mb-6">
                    Kerangka pembelajaran merupakan struktur sistematis dalam merancang dan melaksanakan proses pembelajaran yang efektif. Kerangka ini mencakup berbagai komponen penting mulai dari menentukan tujuan pembelajaran hingga merancang pengalaman belajar yang bermakna.
                </p>
                
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Desain Pembelajaran</h3>
                    <ul class="space-y-2 text-gray-700 leading-relaxed">
                        <li>• Menentukan tujuan pembelajaran</li>
                        <li>• Menentukan kerangka pembelajaran (praktis pedagogis, kemitraan pembelajaran, lingkungan pembelajaran, pemanfaatan digital)</li>
                    </ul>
                </div>
            </div>

            <!-- Menentukan Tujuan Pembelajaran -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Menentukan Tujuan Pembelajaran</h2>
                
                <p class="text-gray-700 leading-relaxed mb-6">
                    Tujuan pembelajaran diturunkan dari Capaian Pembelajaran. Penulisan tujuan pembelajaran sebaiknya memuat 2 komponen utama, yaitu:
                </p>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">1. Kompetensi</h3>
                        <p class="text-gray-700 leading-relaxed mb-3">
                            Kemampuan murid sebagai hasil dari proses pembelajaran. Tujuan disusun dengan menggunakan kata kerja operasional yang relevan.
                        </p>
                        <p class="text-gray-700 leading-relaxed font-semibold mb-2">
                            Pertanyaan panduan yang dapat digunakan guru:
                        </p>
                        <ul class="space-y-2 ml-6 text-gray-700">
                            <li>• Secara konkret, kemampuan apa yang perlu murid tunjukkan?</li>
                            <li>• Tahap berpikir apa yang perlu murid tunjukkan?</li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">2. Konten</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Lingkup materi berupa pengetahuan esensial dan pengetahuan aplikatif yang perlu dipahami pada akhir satu unit pembelajaran.
                        </p>
                    </div>
                </div>
            </div>

            <!-- The SOLO Taxonomy -->
            <div class="bg-white rounded-2xl shadow-md p-8 mb-12">
            <!-- The SOLO Taxonomy -->
            <div class="bg-white rounded-xl shadow-md p-8 mb-8">
                <div class="mb-8 pb-6 border-b border-gray-200">
                    <h2 class="text-3xl font-bold text-gray-900 mb-1">The SOLO Taxonomy</h2>
                    <p class="text-sm text-gray-600 italic">(Structure of Observed Learning Outcomes)</p>
                </div>
                
                <div class="bg-primary-50/50 rounded-xl p-8 border border-primary-100">
                    <!-- Taxonomy Levels - Simplified -->
                    <div class="grid grid-cols-5 gap-4">
                        <!-- Prestructural -->
                        <div class="text-center">
                            <div class="bg-white rounded-lg p-4 mb-3 border border-gray-200 shadow-sm">
                                <div class="h-32 flex items-center justify-center">
                                    <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
                                </div>
                            </div>
                            <h4 class="font-bold text-gray-900 text-sm mb-1">Prestructural</h4>
                            <p class="text-xs text-gray-600">Belum Memahami</p>
                        </div>
                        
                        <!-- Unistructural -->
                        <div class="text-center">
                            <div class="bg-white rounded-lg p-4 mb-3 border border-gray-200 shadow-sm">
                                <div class="h-32 flex items-end justify-center">
                                    <div class="w-12 h-20 bg-primary-400 rounded"></div>
                                </div>
                            </div>
                            <h4 class="font-bold text-gray-900 text-sm mb-1">Unistructural</h4>
                            <p class="text-xs text-gray-600">Satu aspek</p>
                        </div>
                        
                        <!-- Multistructural -->
                        <div class="text-center">
                            <div class="bg-white rounded-lg p-4 mb-3 border border-gray-200 shadow-sm">
                                <div class="h-32 flex items-end justify-center gap-1">
                                    <div class="w-3 h-20 bg-primary-500 rounded"></div>
                                    <div class="w-3 h-20 bg-primary-500 rounded"></div>
                                    <div class="w-3 h-20 bg-primary-500 rounded"></div>
                                </div>
                            </div>
                            <h4 class="font-bold text-gray-900 text-sm mb-1">Multistructural</h4>
                            <p class="text-xs text-gray-600">Beberapa aspek</p>
                        </div>
                        
                        <!-- Relational -->
                        <div class="text-center">
                            <div class="bg-white rounded-lg p-4 mb-3 border border-gray-200 shadow-sm">
                                <div class="h-32 flex flex-col items-center justify-end">
                                    <div class="flex gap-1">
                                        <div class="w-3 h-16 bg-primary-600 rounded"></div>
                                        <div class="w-3 h-16 bg-primary-600 rounded"></div>
                                        <div class="w-3 h-16 bg-primary-600 rounded"></div>
                                    </div>
                                    <div class="w-12 h-1 bg-primary-600 mt-1"></div>
                                </div>
                            </div>
                            <h4 class="font-bold text-gray-900 text-sm mb-1">Relational</h4>
                            <p class="text-xs text-gray-600">Terintegrasi</p>
                        </div>
                        
                        <!-- Extended Abstract -->
                        <div class="text-center">
                            <div class="bg-white rounded-lg p-4 mb-3 border border-gray-200 shadow-sm">
                                <div class="h-32 flex flex-col items-center justify-end relative">
                                    <div class="flex gap-1">
                                        <div class="w-3 h-16 bg-primary-700 rounded"></div>
                                        <div class="w-3 h-16 bg-primary-700 rounded"></div>
                                        <div class="w-3 h-16 bg-primary-700 rounded"></div>
                                    </div>
                                    <div class="w-12 h-1 bg-primary-700 mt-1"></div>
                                    <div class="absolute -top-1 right-2 w-8 h-8 border-2 border-primary-700 rounded-full"></div>
                                </div>
                            </div>
                            <h4 class="font-bold text-gray-900 text-sm mb-1">Extended Abstract</h4>
                            <p class="text-xs text-gray-600">Generalisasi baru</p>
                        </div>
                    </div>
                    
                    <div class="text-xs text-gray-500 text-center mt-6">
                        Sumber: Diadaptasi dari https://www.johnbiggs.com.au/academic/solo_taxonomy
                    </div>
                </div>
            </div>ata Kerja Operasional Table -->
            <div class="bg-white rounded-2xl shadow-md p-8 mb-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Kata Kerja Operasional untuk Taksonomi SOLO</h2>
                
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-6 py-4 text-left font-bold text-gray-900">Tingkatan</th>
                                <th class="border border-gray-300 px-6 py-4 text-left font-bold text-gray-900">Kata kerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-300 px-6 py-4 font-semibold text-gray-900">Uni-struktural</td>
                                <td class="border border-gray-300 px-6 py-4 text-gray-700">
                                    Menghafal, mengidentifikasi, mengenali, menghitung, mendefinisikan, menggambar, menemukan, memberi label, mencocokkan, menyebutkan, mengutip, mengingat, membacakan, mengurutkan, memberi tahu, menulis, meniru
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-300 px-6 py-4 font-semibold text-gray-900">Multi-struktural</td>
                                <td class="border border-gray-300 px-6 py-4 text-gray-700">
                                    Klasifikasikan, jelaskan, daftar, laporkan, diskusikan, ilustrasikan, pilih, ceritakan, hitung, urutkan, buat garis besar, pisahkan
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-300 px-6 py-4 font-semibold text-gray-900">Relasional</td>
                                <td class="border border-gray-300 px-6 py-4 text-gray-700">
                                    Menerapkan, memadukan, menganalisis, menjelaskan, memprediksi, menyimpulkan, meringkas (ringkasan), meninjau, mendebat, mentransfer, membuat rencana, mencirikan, membandingkan, mengontraskan, membedakan, mengatur, memperdebatkan, membuat kasus, menyusun, meninjau dan menulis ulang, memeriksa, menerjemahkan, memparafrasekan, memecahkan masalah
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-300 px-6 py-4 font-semibold text-gray-900">Abstrak meluas</td>
                                <td class="border border-gray-300 px-6 py-4 text-gray-700">
                                    Berteori, berhipotesis, menggeneralisasi, merefleksikan, menghasilkan, menciptakan, menyusun, menemukan, mengawali, membuktikan dengan prinsip dasar, membuat kasus orisinal, memecahkan dengan prinsip dasar
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-4 text-sm text-gray-600 italic">
                    Source: Biggs, J & Tang, C (2007). Teaching for Quality Learning at University (3rd Edition). The Society for Research into Higher Education & Open University Press.
                </div>
            </div>

            <!-- PM dalam Taksonomi Table -->
            <div class="bg-white rounded-xl shadow-md p-8 mb-8">
                <h2 class="text-3xl font-bold mb-8 pb-6 border-b border-gray-200">
                    <span class="text-gray-900">PM dalam Taksonomi Pembelajaran Ranah</span>
                    <span class="text-primary-600"> Kognitif</span>
                </h2>
                
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-primary-500 text-white">
                                <th class="border border-primary-400 px-5 py-3 text-left font-semibold">Taksonomi Bloom<br/>(Anderson & Krathwohl, 2001)</th>
                                <th class="border border-primary-400 px-5 py-3 text-left font-semibold">Taksonomi SOLO<br/>(Biggs & Collis, 1982)</th>
                                <th class="border border-primary-400 px-5 py-3 text-left font-semibold">Pengalaman Belajar PM</th>
                                <th class="border border-primary-400 px-5 py-3 text-left font-semibold">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-200 px-5 py-4 align-top">
                                    <div>• Mencipta</div>
                                    <div>• Mengevaluasi</div>
                                </td>
                                <td class="border border-gray-200 px-5 py-4 align-top text-gray-700">
                                    Berpikir Abstrak yang Mendalam
                                </td>
                                <td class="border border-gray-200 px-5 py-4 align-top font-semibold text-gray-900">
                                    Merefleksi
                                </td>
                                <td class="border border-gray-200 px-5 py-4 align-top text-gray-700">
                                    Memperluas dan menerapkan ide
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-200 px-5 py-4 align-top">
                                    <div>• Menganalisis</div>
                                    <div>• Menerapkan</div>
                                </td>
                                <td class="border border-gray-200 px-5 py-4 align-top text-gray-700">
                                    Relasional
                                </td>
                                <td class="border border-gray-200 px-5 py-4 align-top font-semibold text-gray-900">
                                    Mengaplikasi
                                </td>
                                <td class="border border-gray-200 px-5 py-4 align-top text-gray-700">
                                    Menghubungkan ide-ide
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-200 px-5 py-4 align-top text-gray-700">
                                    Memahami
                                </td>
                                <td class="border border-gray-200 px-5 py-4 align-top text-gray-700">
                                    Multistruktural
                                </td>
                                <td class="border border-gray-200 px-5 py-4 align-top font-semibold text-gray-900 rowspan-2">
                                    Memahami
                                </td>
                                <td class="border border-gray-200 px-5 py-4 align-top text-gray-700">
                                    Memiliki banyak ide
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-200 px-5 py-4 align-top text-gray-700">
                                    Mengingat
                                </td>
                                <td class="border border-gray-200 px-5 py-4 align-top text-gray-700">
                                    Unistruktural
                                </td>
                                <td class="border border-gray-200 px-5 py-4 align-top text-gray-700">
                                    Mengingat kembali
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-200 px-5 py-4 align-top text-gray-700">
                                    -
                                </td>
                                <td class="border border-gray-200 px-5 py-4 align-top text-gray-700">
                                    Prastruktural
                                </td>
                                <td class="border border-gray-200 px-5 py-4 align-top text-gray-700">
                                    -
                                </td>
                                <td class="border border-gray-200 px-5 py-4 align-top text-gray-700">
                                    Belum Memahami
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                }
            });
        });
    </script>
</body>
</html>
