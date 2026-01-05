<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Buat RPP - CP Pembelajaran SMK</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
    </style>
</head>
<body class="bg-gray-50 antialiased" style="font-family: 'Inter', sans-serif;">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-200 shadow-lg transition-all duration-300" style="overflow: visible;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="overflow: visible;">
            <div class="flex items-center justify-between h-16" style="overflow: visible;">
                <!-- Logo & Brand -->
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('images/kemdiktisaintek-logo.svg') }}" alt="Logo Kemdikbudristek" class="h-10 w-auto">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-gray-900 leading-tight">CP Pembelajaran SMK</span>
                        <span class="text-xs text-gray-600">Kurikulum Merdeka</span>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3">
                    <a href="/" class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Beranda</span>
                    </a>

                    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <span>Dashboard CP</span>
                    </a>
                    
                    <!-- User Dropdown -->
                    <div class="relative" style="overflow: visible;">
                        <button id="userMenuButton" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="w-9 h-9 bg-primary text-white rounded-full flex items-center justify-center font-semibold text-sm">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <div class="hidden md:block text-left">
                                <div class="text-sm font-semibold text-gray-900">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-gray-500">{{ auth()->user()->email }}</div>
                            </div>
                            <svg id="userMenuIcon" class="w-4 h-4 text-gray-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-24 pb-12 px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="bg-gradient-to-br from-primary-600 to-primary-700 rounded-2xl shadow-xl mb-6 overflow-hidden">
                <div class="px-8 py-10">
                    <div class="flex items-start justify-between">
                        <div>
                            <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">
                                Buat Rencana Pelaksanaan Pembelajaran (RPP)
                            </h1>
                            <p class="text-primary-50 text-lg">
                                Lengkapi form di bawah untuk membuat RPP berdasarkan Kurikulum Merdeka
                            </p>
                        </div>
                        <div class="hidden lg:block">
                            <div class="w-20 h-20 bg-white/10 rounded-full flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form RPP -->
            <form id="rppForm" class="space-y-6">
                @csrf
                
                <!-- Section: Identifikasi -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-200">
                    <div class="px-8 py-6 border-b border-gray-200 bg-primary">
                        <h2 class="text-2xl font-bold text-white">Identifikasi</h2>
                    </div>
                    <div class="p-8">
                        <!-- Dimensi Profil Lulusan -->
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-gray-900 mb-3">
                                Dimensi Profil Lulusan: 
                                <span class="font-normal text-gray-600">Pilihlah dimensi profil lulusan yang akan dicapai dalam pembelajaran</span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                <label class="flex items-center gap-3 p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="checkbox" name="dimensi_profil[]" value="Keimanan dan Ketakwaan terhadap Tuhan YME" class="w-5 h-5 text-primary rounded focus:ring-2 focus:ring-primary">
                                    <span class="text-sm text-gray-900">Keimanan dan Ketakwaan terhadap Tuhan YME</span>
                                </label>
                                <label class="flex items-center gap-3 p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="checkbox" name="dimensi_profil[]" value="Penalaran Kritis" class="w-5 h-5 text-primary rounded focus:ring-2 focus:ring-primary">
                                    <span class="text-sm text-gray-900">Penalaran Kritis</span>
                                </label>
                                <label class="flex items-center gap-3 p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="checkbox" name="dimensi_profil[]" value="Kolaborasi" class="w-5 h-5 text-primary rounded focus:ring-2 focus:ring-primary">
                                    <span class="text-sm text-gray-900">Kolaborasi</span>
                                </label>
                                <label class="flex items-center gap-3 p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="checkbox" name="dimensi_profil[]" value="Kesehatan" class="w-5 h-5 text-primary rounded focus:ring-2 focus:ring-primary">
                                    <span class="text-sm text-gray-900">Kesehatan</span>
                                </label>
                                <label class="flex items-center gap-3 p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="checkbox" name="dimensi_profil[]" value="Kewargaan" class="w-5 h-5 text-primary rounded focus:ring-2 focus:ring-primary">
                                    <span class="text-sm text-gray-900">Kewargaan</span>
                                </label>
                                <label class="flex items-center gap-3 p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="checkbox" name="dimensi_profil[]" value="Kreativitas" class="w-5 h-5 text-primary rounded focus:ring-2 focus:ring-primary">
                                    <span class="text-sm text-gray-900">Kreativitas</span>
                                </label>
                                <label class="flex items-center gap-3 p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="checkbox" name="dimensi_profil[]" value="Kemandirian" class="w-5 h-5 text-primary rounded focus:ring-2 focus:ring-primary">
                                    <span class="text-sm text-gray-900">Kemandirian</span>
                                </label>
                                <label class="flex items-center gap-3 p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="checkbox" name="dimensi_profil[]" value="Komunikasi" class="w-5 h-5 text-primary rounded focus:ring-2 focus:ring-primary">
                                    <span class="text-sm text-gray-900">Komunikasi</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Desain Pembelajaran -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-200">
                    <div class="px-8 py-6 border-b border-gray-200 bg-primary">
                        <h2 class="text-2xl font-bold text-white">Desain Pembelajaran</h2>
                    </div>
                    <div class="p-8 space-y-6">
                        <!-- Tujuan Pembelajaran -->
                        <div>
                            <label class="block text-sm font-bold text-gray-900 mb-2">
                                Tujuan Pembelajaran:
                            </label>
                            <p class="text-sm text-gray-600 mb-3">
                                Tuliskan tujuan pembelajaran yang mencakup kompetensi dan konten pada ruang lingkup materi dengan menggunakan kata kerja operasional yang relevan.
                            </p>
                            <textarea name="tujuan_pembelajaran" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all resize-none" placeholder="Contoh: Peserta didik mampu menganalisis prinsip dasar pemrograman dan mengimplementasikannya dalam proyek sederhana..."></textarea>
                        </div>

                        <!-- Praktik Pedagogis -->
                        <div>
                            <label class="block text-sm font-bold text-gray-900 mb-2">
                                Praktik Pedagogis:
                            </label>
                            <p class="text-sm text-gray-600 mb-3">
                                Tuliskan Model/Strategi/Metode pembelajaran yang dipilih untuk mencapai tujuan belajar, seperti pembelajaran berbasis masalah, pembelajaran berbasis proyek, pembelajaran inkuiri, pembelajaran kontekstual, dan sebagainya.
                            </p>
                            <textarea name="praktik_pedagogis" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all resize-none" placeholder="Contoh: Model pembelajaran berbasis proyek (Project Based Learning) dengan pendekatan STEAM..."></textarea>
                        </div>

                        <!-- Kemitraan Pembelajaran -->
                        <div>
                            <label class="block text-sm font-bold text-gray-900 mb-2">
                                Kemitraan Pembelajaran <span class="font-normal text-gray-500">(opsional):</span>
                            </label>
                            <p class="text-sm text-gray-600 mb-3">
                                Tuliskan kegiatan kemitraan atau kolaborasi dalam dan/atau luar lingkup sekolah, seperti kemitraan antar guru lintas mata pelajaran, antar murid lintas kelas, antar guru lintas sekolah, orang tua, komunitas, tokoh masyarakat, dunia usaha dan dunia industri kerja, institusi, atau mitra profesional.
                            </p>
                            <textarea name="kemitraan_pembelajaran" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all resize-none" placeholder="Contoh: Kolaborasi dengan industri IT untuk memberikan mentoring proyek akhir siswa..."></textarea>
                        </div>

                        <!-- Lingkungan Pembelajaran -->
                        <div>
                            <label class="block text-sm font-bold text-gray-900 mb-2">
                                Lingkungan Pembelajaran:
                            </label>
                            <p class="text-sm text-gray-600 mb-3">
                                Tuliskan lingkungan pembelajaran yang ingin dikembangkan dalam budaya belajar, ruang fisik dan/atau ruang virtual. Budaya belajar dikembangkan agar tercipta iklim belajar yang aman, nyaman, dan saling menghargai. Contoh: memberikan kesempatan kepada siswa untuk menyampaikan pendapatnya dalam ruang kelas dan forum diskusi pada platform daring (ruang virtual bersifat opsional).
                            </p>
                            <textarea name="lingkungan_pembelajaran" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all resize-none" placeholder="Contoh: Ruang kelas laboratorium komputer dengan layout kelompok, platform Google Classroom untuk diskusi virtual..."></textarea>
                        </div>

                        <!-- Pemanfaatan Digital -->
                        <div>
                            <label class="block text-sm font-bold text-gray-900 mb-2">
                                Pemanfaatan Digital <span class="font-normal text-gray-500">(opsional):</span>
                            </label>
                            <p class="text-sm text-gray-600 mb-3">
                                Tuliskan pemanfaatan teknologi digital untuk menciptakan pembelajaran yang interaktif, kolaboratif, dan kontekstual. Contoh: video pembelajaran, platform pembelajaran, perpustakaan digital, forum diskusi daring, aplikasi penilaian, dan sebagainya.
                            </p>
                            <textarea name="pemanfaatan_digital" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all resize-none" placeholder="Contoh: Penggunaan Canva untuk desain presentasi, GitHub untuk kolaborasi coding, Kahoot untuk kuis interaktif..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end gap-4">
                    <a href="{{ route('dashboard') }}" class="px-8 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-8 py-3 bg-primary text-white rounded-lg font-semibold hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-colors shadow-lg flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan RPP
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // User Menu Dropdown
        const userMenuButton = document.getElementById('userMenuButton');
        const userMenuDropdown = document.getElementById('userMenuDropdown');
        const userMenuIcon = document.getElementById('userMenuIcon');

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

        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                document.getElementById('logoutForm').submit();
            }
        }

        // Form Submit Handler
        document.getElementById('rppForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            // Collect all checked dimensions
            const dimensiProfil = [];
            document.querySelectorAll('input[name="dimensi_profil[]"]:checked').forEach(checkbox => {
                dimensiProfil.push(checkbox.value);
            });
            
            const data = {
                dimensi_profil: dimensiProfil,
                tujuan_pembelajaran: formData.get('tujuan_pembelajaran'),
                praktik_pedagogis: formData.get('praktik_pedagogis'),
                kemitraan_pembelajaran: formData.get('kemitraan_pembelajaran'),
                strategi_pembelajaran: formData.getAll('strategi_pembelajaran[]'),
                metode_pembelajaran: formData.getAll('metode_pembelajaran[]'),
                lingkungan_pembelajaran: formData.get('lingkungan_pembelajaran'),
                pemanfaatan_digital: formData.get('pemanfaatan_digital'),
                jumlah_pertemuan: formData.get('jumlah_pertemuan') || 1,
                jam_pelajaran: formData.get('jam_pelajaran') || 2
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
            submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mr-2" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Memproses...';
            
            try {
                const response = await fetch('{{ route("rpp.store") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify(data)
                });
                
                const result = await response.json();
                
                if (result.success) {
                    // Tampilkan hasil dalam modal
                    showResultModal(result.data.langkah_pembelajaran, data);
                } else {
                    throw new Error(result.message || 'Gagal memproses permintaan');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan: ' + error.message);
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        });

        // Fungsi untuk menampilkan modal dengan hasil
        function showResultModal(langkahPembelajaran, formData) {
            // Buat elemen modal jika belum ada
            let modal = document.getElementById('resultModal');
            
            if (!modal) {
                modal = document.createElement('div');
                modal.id = 'resultModal';
                modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden';
                modal.innerHTML = `
                    <div class="bg-white rounded-xl shadow-2xl w-full max-w-6xl max-h-[90vh] flex flex-col">
                        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="text-xl font-bold text-gray-900">Hasil Pembuatan RPP</h3>
                            <button onclick="document.getElementById('resultModal').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-6 overflow-y-auto flex-1">
                            <div id="resultContent"></div>
                        </div>
                        <div class="p-4 border-t border-gray-200 flex justify-end gap-3">
                            <button onclick="document.getElementById('resultModal').classList.add('hidden')" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                                Tutup
                            </button>
                            <button id="saveRppBtn" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors">
                                Simpan RPP
                            </button>
                        </div>
                    </div>
                `;
                document.body.appendChild(modal);
                
                // Tambahkan event listener untuk tombol simpan
                modal.querySelector('#saveRppBtn').addEventListener('click', async () => {
                    try {
                        const saveBtn = modal.querySelector('#saveRppBtn');
                        const originalText = saveBtn.innerHTML;
                        saveBtn.disabled = true;
                        saveBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mr-2" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Menyimpan...';
                        
                        const response = await fetch('{{ route("rpp.save-generated") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify({
                                ...formData,
                                langkah_pembelajaran: langkahPembelajaran
                            })
                        });
                        
                        const result = await response.json();
                        
                        if (result.success) {
                            alert('RPP berhasil disimpan!');
                            window.location.href = '{{ route("rpp.index") }}';
                        } else {
                            throw new Error(result.message || 'Gagal menyimpan RPP');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('Gagal menyimpan RPP: ' + error.message);
                        const modal = document.getElementById('resultModal');
                        if (modal) {
                            const saveBtn = modal.querySelector('#saveRppBtn');
                            if (saveBtn) {
                                saveBtn.disabled = false;
                                saveBtn.innerHTML = 'Simpan RPP';
                            }
                        }
                    }
                });
            }
            
            // Format langkah pembelajaran menjadi tabel
            const resultContent = document.getElementById('resultContent');
            resultContent.innerHTML = formatLangkahPembelajaran(langkahPembelajaran);
            
            // Tampilkan modal
            modal.classList.remove('hidden');
        }

        // Fungsi untuk memformat langkah pembelajaran
        function formatLangkahPembelajaran(langkahPembelajaran) {
            // Coba parse sebagai JSON jika berupa string
            try {
                if (typeof langkahPembelajaran === 'string') {
                    // Coba ekstrak konten dari format markdown
                    const pertemuanMatches = langkahPembelajaran.match(/###\s*Pertemuan\s*\d+.*?###/gs);
                    
                    if (pertemuanMatches && pertupembelajaran.length > 0) {
                        const pertemuanList = [];
                        
                        pertemuanMatches.forEach((pertemuan, index) => {
                            const tujuanMatch = pertemuan.match(/Tujuan Spesifik:[\s\n]+([^#]+)/i);
                            const kegiatanMatch = pertemuan.match(/Aktivitas:[\s\n]+([^#]+)/is);
                            
                            pertemuanList.push({
                                pertemuan: `Pertemuan ${index + 1}`,
                                tujuan: tujuanMatch ? tujuanMatch[1].trim() : 'Tidak ada tujuan spesifik',
                                kegiatan: kegiatanMatch ? 
                                    kegiatanMatch[1].trim().split('\n')
                                        .map(k => k.replace(/^\s*[-*]\s*/, '').trim())
                                        .filter(k => k.length > 0)
                                    : ['Tidak ada kegiatan']
                            });
                        });
                        
                        return `
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                                <div class="p-6 border-b border-gray-200">
                                    <h4 class="text-lg font-semibold text-gray-900 mb-2">Rencana Pelaksanaan Pembelajaran (RPP)</h4>
                                    <p class="text-sm text-gray-600">Berikut adalah langkah-langkah pembelajaran yang telah dibuat:</p>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pertemuan</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tujuan Pembelajaran</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kegiatan Pembelajaran</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alokasi Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            ${pertemuanList.map((item, idx) => `
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${item.pertemuan}</td>
                                                    <td class="px-6 py-4 text-sm text-gray-700">${item.tujuan}</td>
                                                    <td class="px-6 py-4 text-sm text-gray-700">
                                                        <div class="space-y-2">
                                                            ${Array.isArray(item.kegiatan) 
                                                                ? item.kegiatan.map((k, i) => `<div class="flex items-start">
                                                                    <span class="flex-shrink-0 h-5 w-5" style="color: var(--primary);">${i + 1}.</span>
                                                                    <span>${k}</span>
                                                                </div>`).join('')
                                                                : `<div>${item.kegiatan}</div>`
                                                            }
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2 JP</td>
                                                </tr>
                                            `).join('')}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        `;
                    }
                    
                    // Jika tidak bisa diekstrak, tampilkan sebagai teks biasa
                    return `
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <h4 class="text-lg font-semibold mb-4">Langkah Pembelajaran</h4>
                            <div class="prose max-w-none">
                                ${langkahPembelajaran.replace(/\n/g, '<br>')}
                            </div>
                        </div>
                    `;
                }
            } catch (e) {
                console.error('Error parsing langkah pembelajaran:', e);
                // Jika gagal parse, tampilkan sebagai teks biasa
                return `
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h4 class="text-lg font-semibold mb-4">Langkah Pembelajaran</h4>
                        <div class="prose max-w-none">
                            ${typeof langkahPembelajaran === 'string' 
                                ? langkahPembelajaran.replace(/\n/g, '<br>') 
                                : JSON.stringify(langkahPembelajaran, null, 2)
                            }
                        </div>
                    </div>
                `;
            }
            
            // Jika sudah dalam format array
            if (Array.isArray(langkahPembelajaran)) {
                return `
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6 border-b border-gray-200">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Rencana Pelaksanaan Pembelajaran (RPP)</h4>
                            <p class="text-sm text-gray-600">Berikut adalah langkah-langkah pembelajaran yang telah dibuat:</p>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pertemuan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tujuan Pembelajaran</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kegiatan Pembelajaran</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alokasi Waktu</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    ${langkahPembelajaran.map((item, index) => `
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${item.pertemuan || `Pertemuan ${index + 1}`}</td>
                                            <td class="px-6 py-4 text-sm text-gray-700">${item.tujuan || '-'}</td>
                                            <td class="px-6 py-4 text-sm text-gray-700">
                                                <div class="space-y-2">
                                                    ${Array.isArray(item.kegiatan) 
                                                        ? item.kegiatan.map((k, i) => `<div class="flex items-start">
                                                                <span class="flex-shrink-0 h-5 w-5" style="color: var(--primary);">${i + 1}.</span>
                                                                <span>${k}</span>
                                                            </div>`).join('')
                                                        : (item.kegiatan || '-').replace(/\n/g, '<br>')
                                                    }
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.waktu || '2 JP'}</td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                            </table>
                        </div>
                    </div>
                `;
            }
            
            // Jika berupa objek tapi bukan array
            if (typeof langkahPembelajaran === 'object' && langkahPembelajaran !== null) {
                return `
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h4 class="text-lg font-semibold mb-4">Langkah Pembelajaran</h4>
                        <div class="space-y-6">
                            ${Object.entries(langkahPembelajaran).map(([key, value]) => `
                                <div>
                                    <h5 class="font-medium text-gray-900 mb-2">${key.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase())}</h5>
                                    <div class="pl-4 text-gray-700">
                                        ${typeof value === 'object' 
                                            ? `<pre class="whitespace-pre-wrap bg-gray-50 p-3 rounded">${JSON.stringify(value, null, 2)}</pre>`
                                            : value.replace(/\n/g, '<br>')
                                        }
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                `;
            }
            
            // Fallback untuk format yang tidak dikenali
            return `
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h4 class="text-lg font-semibold mb-4">Langkah Pembelajaran</h4>
                    <div class="prose max-w-none">
                        ${JSON.stringify(langkahPembelajaran, null, 2)}
                    </div>
                </div>
            `;
        }

        // Tambahkan style untuk modal dan tabel
        const style = document.createElement('style');
        style.textContent = `
            .prose {
                max-width: none;
            }
            .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
                margin-top: 1.5em;
                margin-bottom: 0.5em;
                font-weight: 600;
                line-height: 1.25;
            }
            .prose h1 { font-size: 1.5em; }
            .prose h2 { font-size: 1.25em; }
            .prose h3 { font-size: 1.125em; }
            .prose p { margin-bottom: 1em; }
            .prose ul { list-style-type: disc; padding-left: 1.5em; margin-bottom: 1em; }
            .prose ol { list-style-type: decimal; padding-left: 1.5em; margin-bottom: 1em; }
            .prose li { margin-bottom: 0.5em; }
            .prose table { width: 100%; border-collapse: collapse; margin-bottom: 1em; }
            .prose th { text-align: left; padding: 0.5em; border: 1px solid #e5e7eb; background-color: #f9fafb; }
            .prose td { padding: 0.5em; border: 1px solid #e5e7eb; }
            
            /* Animasi */
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
            .animate-fadeIn {
                animation: fadeIn 0.3s ease-out forwards;
            }
            
            /* Scrollbar styling */
            ::-webkit-scrollbar {
                width: 8px;
                height: 8px;
            }
            
            ::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 4px;
            }
            
            ::-webkit-scrollbar-thumb {
                background: #cbd5e0;
                border-radius: 4px;
            }
            
            ::-webkit-scrollbar-thumb:hover {
                background: #a0aec0;
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
