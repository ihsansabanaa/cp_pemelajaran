<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengalaman Belajar - CP Pembelajaran SMK</title>
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
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">Pengalaman Belajar</h1>
            <p class="text-lg text-primary-50 leading-relaxed max-w-3xl">
                Merancang pengalaman belajar bermakna, kontekstual, dan relevan dengan industri sesuai Kurikulum Merdeka.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-12 px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Introduction with SVG -->
            <div class="grid md:grid-cols-2 gap-12 items-center mb-6">
                <!-- Introduction Text -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Pengantar Pengalaman Belajar</h2>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        Pengalaman belajar dirancang untuk memberikan pembelajaran yang bermakna, kontekstual, dan relevan dengan dunia industri. Melalui pendekatan yang terstruktur, peserta didik akan mengembangkan kompetensi yang dibutuhkan untuk menjadi lulusan yang siap kerja dan berdaya saing.
                    </p>
                </div>
                <!-- SVG Illustration -->
                <div class="flex justify-center md:justify-end">
                    <div class="w-full max-w-md">
                        <img src="{{ asset('images/Research paper-rafiki.svg') }}" alt="Ilustrasi Pengalaman Belajar" class="w-full h-auto">
                    </div>
                </div>
            </div>

            <!-- 4 Cards Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <!-- Card 1: Identifikasi -->
                <div class="bg-white rounded-lg p-6 border border-gray-200 hover:border-primary hover:shadow-md transition">
                    <div class="mb-4">
                        <div class="w-12 h-12 bg-primary-50 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-primary font-bold text-xl">1</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Identifikasi</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>• Mengidentifikasi kesiapan murid</li>
                        <li>• Memahami karakteristik materi pelajaran</li>
                        <li>• Menentukan dimensi profil Lulusan</li>
                    </ul>
                </div>

                <!-- Card 2: Desain Pembelajaran -->
                <div class="bg-white rounded-lg p-6 border border-gray-200 hover:border-primary hover:shadow-md transition">
                    <div class="mb-4">
                        <div class="w-12 h-12 bg-primary-50 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-primary font-bold text-xl">2</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Desain Pembelajaran</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>• Menentukan tujuan pembelajaran</li>
                        <li>• Menentukan kerangka pembelajaran</li>
                    </ul>
                </div>

                <!-- Card 3: Pengalaman Belajar -->
                <div class="bg-white rounded-lg p-6 border border-gray-200 hover:border-primary hover:shadow-md transition">
                    <div class="mb-4">
                        <div class="w-12 h-12 bg-primary-50 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-primary font-bold text-xl">3</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Pengalaman Belajar</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>• Merancang pembelajaran dengan prinsip berkesadaran</li>
                        <li>• Mendeskripsikan pengalaman belajar</li>
                    </ul>
                </div>

                <!-- Card 4: Asesmen -->
                <div class="bg-white rounded-lg p-6 border border-gray-200 hover:border-primary hover:shadow-md transition">
                    <div class="mb-4">
                        <div class="w-12 h-12 bg-primary-50 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-primary font-bold text-xl">4</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Asesmen</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>• Asesmen pada awal pembelajaran</li>
                        <li>• Asesmen pada proses pembelajaran</li>
                        <li>• Asesmen pada akhir pembelajaran</li>
                    </ul>
                </div>
            </div>

            <!-- Detail Section 1: Identifikasi Kesiapan Murid -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">1. Mengidentifikasi Kesiapan Murid</h2>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">a. Analisis Pengetahuan Awal</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Guru dapat menggunakan pre-test, diskusi awal, pertanyaan pemantik, dll. untuk mengukur pemahaman awal murid terhadap konsep yang akan dipelajari lalu gunakan hasilnya untuk mengidentifikasi kesenjangan pemahaman yang mungkin muncul dan menjadi hambatan dalam pembelajaran.
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">b. Observasi dan Refleksi</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Amati bagaimana murid merespon pertanyaan terbuka, tantangan berpikir kritis, atau tugas eksploratif. Perhatikan tingkat keterlibatan, rasa ingin tahu, dan kemampuan mereka dalam menghubungkan konsep baru dengan pengalaman sebelumnya.
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">c. Inventarisasi Gaya Belajar dan Minat</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Gunakan angket atau wawancara singkat untuk mengetahui gaya belajar dan minat murid. Guru dapat menyesuaikan strategi pembelajaran agar lebih relevan dan menarik bagi mereka.
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">d. Analisis Keterampilan Berpikir Tingkat Tinggi (HOTS)</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Berikan tugas berbasis pemecahan masalah atau proyek kecil untuk melihat sejauh mana murid dapat mengambil keputusan untuk menemukan solusi dari suatu permasalahan. Identifikasi murid yang membutuhkan pendampingan lebih lanjut.
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">e. Konteks Sosial dan Emosional</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Perhatikan faktor sosial dan emosional yang dapat memengaruhi kesiapan belajar, seperti rasa percaya diri, motivasi, atau hambatan psikologis dalam proses pembelajaran. Gunakan pendekatan diferensiasi untuk menyesuaikan strategi pembelajaran dengan kebutuhan individu maupun kelompok.
                        </p>
                    </div>
                    
                    <div class="pt-4 border-t border-gray-200">
                        <p class="text-gray-700 leading-relaxed">
                            <span class="font-semibold text-gray-900">Kesimpulan:</span> Dengan mengidentifikasi kesiapan murid secara komprehensif, guru dapat menyusun perencanaan pembelajaran mendalam yang lebih efektif, memastikan bahwa setiap peserta didik mendapatkan pengalaman belajar yang bermakna, berkesadaran, dan menggembirakan sesuai dengan potensi mereka yang beragam.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Detail Section 2: Karakteristik Mata Pelajaran -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">2. Mengidentifikasi Karakteristik Mata Pelajaran</h2>
                
                <ul class="space-y-3 text-gray-700 leading-relaxed">
                    <li>• Mengenali sifat dasar mata pelajaran, apakah menekankan konsep, keterampilan, atau karakter</li>
                    <li>• Menganalisis kompetensi (pengetahuan esensial dan aplikatif)</li>
                    <li>• Memastikan bahwa tujuan pembelajaran mendorong eksplorasi konsep, bukan sekadar hafalan</li>
                    <li>• Mengidentifikasi keterkaitan setiap mata pelajaran dengan kehidupan nyata agar peserta didik melihat relevansi pembelajaran</li>
                    <li>• Mengidentifikasi potensi mata pelajaran terhadap pencapaian <strong class="text-primary">8 Dimensi Profil Lulusan</strong></li>
                    <li>• Memilih strategi pembelajaran yang mendorong murid merancang proyek, melakukan penelitian, atau menyelesaikan tantangan berbasis data sesuai mata pelajaran</li>
                </ul>
            </div>

            <!-- Detail Section 3: Dimensi Profil Lulusan -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">3. Menentukan Dimensi Profil Lulusan</h2>
                <p class="text-gray-700 leading-relaxed text-lg">
                    Menentukan dimensi profil lulusan berdasarkan hasil identifikasi mata pelajaran. Menerapkan prinsip pembelajaran mendalam, yaitu <strong class="text-primary">bermakna</strong>, <strong class="text-primary">berkesadaran</strong>, dan <strong class="text-primary">menggembirakan</strong> untuk mencapai dimensi profil lulusan. Pilih dimensi yang relevan dengan tujuan pembelajaran dan karakteristik mata pelajaran yang diajarkan.
                </p>
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
