<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prinsip Pembelajaran - CP Pembelajaran SMK</title>
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
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-2">
                    <a href="/" class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-400 to-primary-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-800">CP Pembelajaran</span>
                    </a>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/" class="px-5 py-2 text-gray-700 font-medium hover:text-primary-600 transition">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <section class="bg-gradient-to-r from-primary-500 to-primary-600 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 mb-6">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg/100px-Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg.png" alt="Logo Kemendikbud" class="w-16 h-16 bg-white rounded-lg p-2">
                <div class="text-white">
                    <div class="text-lg font-semibold">Kementerian Pendidikan</div>
                    <div class="text-sm">Dasar dan Menengah</div>
                </div>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Prinsip Pembelajaran
            </h1>
            <p class="text-xl text-primary-50 max-w-4xl leading-relaxed">
                Implementasi pembelajaran mendalam mendorong partisipasi aktif murid dalam berbagai kegiatan pembelajaran.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Left Column -->
                <div class="space-y-6">
                    <div class="bg-white rounded-xl shadow-md p-8 border-l-4 border-primary-500">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Implementasi PM</h2>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            Implementasi PM mendorong partisipasi aktif murid dalam berbagai kegiatan pembelajaran. Guru berperan sebagai aktivator dan motivator yang membantu peserta didik mengeksplorasi, berkreasi, dan mengaitkan hubungan antar konsep. Beberapa karakteristik pendekatan PM dengan prinsip berkesadaran, bermakna, dan menggembirakan antara lain pembelajaran aktif, kolaboratif, pembelajaran terdiferensiasi. Dengan demikian, guru harus memahami karakteristik murid dengan berbagai strategi pembelajaran untuk menciptakan pembelajaran yang berkesadaran, bermakna, dan menggembirakan.
                        </p>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <div class="bg-white rounded-xl shadow-md p-8 border-l-4 border-primary-500">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Pembelajaran Mendalam</h2>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            Pembelajaran Mendalam mendorong murid untuk bertanggung jawab atas pembelajaran mereka sendiri dan merefleksikan kemajuan mereka sehingga mereka mampu melakukan asesmen diri, merefleksi capaian pembelajaran mereka sendiri dan menetapkan tujuan pribadi. Hal ini membantu peserta didik mengembangkan keterampilan metakognitif dan mendorong mereka untuk lebih proaktif dalam pembelajaran mereka. Asesmen dalam PM relevan dengan pencapaian profil lulusan yang mendukung pengembangan kompetensi peserta didik secara menyeluruh.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-12 text-center">
                <a href="/" class="inline-block px-8 py-3 bg-primary-500 text-white rounded-lg font-semibold hover:bg-primary-600 transition shadow-md hover:shadow-lg">
                    Kembali ke Halaman Utama
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-8">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <p class="mb-2">&copy; 2025 Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi</p>
            <p class="text-sm">Sistem Manajemen Capaian Pembelajaran SMK</p>
        </div>
    </footer>
</body>
</html>
