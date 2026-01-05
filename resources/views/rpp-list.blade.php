<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>History RPP - EduPlan</title>

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

        .card {
            background-color: #ffffff;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transform: translateY(-2px);
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

        .btn-primary {
            background-color: #4F46E5;
            color: white;
        }

        .btn-primary:hover {
            background-color: #4338CA;
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

        .main-content {
            margin-top: 4rem;
            margin-left: 0;
            height: calc(100vh - 4rem);
            overflow-y: auto;
            padding: 1.5rem;
        }

        @media (min-width: 1024px) {
            .main-content {
                margin-left: 16rem;
            }
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
    </style>
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
    <header class="fixed top-0 right-0 left-0 bg-white border-b border-gray-200 z-40 lg:left-64 transition-all duration-300">
        <div class="flex items-center justify-between h-16 px-4 lg:px-6">
            <div class="flex items-center gap-4">
                <button id="openSidebar" class="text-gray-600 hover:text-gray-900 focus:outline-none lg:hidden">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-lg font-bold text-gray-900 hidden lg:block">History RPP</h1>
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
            <!-- Header Section -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm mb-6 overflow-hidden">
                <div class="relative bg-gradient-to-br from-primary/5 via-primary/10 to-transparent">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>

                    <div class="relative px-6 py-8 sm:px-8">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                            <div>
                                <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-primary/10 rounded-full mb-3" style="background-color: rgba(79, 70, 229, 0.1); color: var(--primary);">
                                    <i class="fas fa-history text-sm"></i>
                                    <span class="text-sm font-semibold">History</span>
                                </div>
                                <h1 class="text-3xl font-bold text-gray-900 mb-2">
                                    RPP Saya
                                </h1>
                                <p class="text-gray-600">Daftar semua RPP yang telah Anda buat</p>
                            </div>
                            <a href="{{ route('dashboard') }}" class="btn btn-primary whitespace-nowrap">
                                <i class="fas fa-plus"></i>
                                Buat RPP Baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RPP List -->
            @if($rppList->isEmpty())
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-12 text-center">
                <div class="text-6xl mb-4">📝</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum Ada RPP</h3>
                <p class="text-gray-600 mb-6">Anda belum membuat RPP. Mari mulai membuat RPP pertama Anda!</p>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Buat RPP Pertama
                </a>
            </div>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($rppList as $rpp)
                <div class="card">
                    <div class="p-6">
                        <!-- Badge Status -->
                        <div class="flex justify-between items-start mb-3">
                            <div class="inline-flex items-center gap-1 px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-sm font-semibold">
                                <i class="fas fa-graduation-cap"></i>
                                Fase {{ $rpp->fase->nama_fase ?? '-' }}
                            </div>
                            <button onclick="toggleDropdown({{ $rpp->id_rpp }})" class="p-1 text-gray-400 hover:text-gray-600 rounded transition-colors">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div id="dropdown-{{ $rpp->id_rpp }}" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-10">
                                <a href="{{ route('rpp.show', $rpp->id_rpp) }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-t-lg">
                                    <i class="fas fa-eye text-indigo-600"></i>
                                    Lihat Detail
                                </a>
                                <button onclick="deleteRpp({{ $rpp->id_rpp }})" class="w-full flex items-center gap-3 px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-b-lg">
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                </button>
                            </div>
                        </div>

                        <!-- Content -->
                        <h3 class="text-lg font-bold text-gray-900 mb-2">
                            {{ $rpp->konsentrasiKeahlian->nama_konsentrasi ?? 'RPP' }}
                        </h3>

                        <div class="space-y-2 text-sm text-gray-600 mb-4">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-book-open w-5 text-indigo-600"></i>
                                <span class="truncate">{{ Str::limit($rpp->tujuan_pembelajaran, 50) }}</span>
                            </div>

                            @if($rpp->dimensi_profil && is_array($rpp->dimensi_profil))
                            <div class="flex items-start gap-2">
                                <i class="fas fa-users w-5 mt-1 text-teal-500"></i>
                                <div class="flex flex-wrap gap-1">
                                    @foreach(array_slice($rpp->dimensi_profil, 0, 2) as $dimensi)
                                    <span class="px-2 py-0.5 bg-teal-50 text-teal-600 rounded text-xs font-medium">{{ $dimensi }}</span>
                                    @endforeach
                                    @if(count($rpp->dimensi_profil) > 2)
                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-700 rounded text-xs font-medium">+{{ count($rpp->dimensi_profil) - 2 }}</span>
                                    @endif
                                </div>
                            </div>
                            @endif

                            <div class="flex items-center gap-2">
                                <i class="fas fa-calendar w-5 text-blue-500"></i>
                                <span>{{ $rpp->created_at->format('d M Y') }}</span>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="flex justify-end pt-3 border-t border-gray-100">
                            <a href="{{ route('rpp.show', $rpp->id_rpp) }}" class="btn btn-primary text-sm">
                                <i class="fas fa-eye"></i>
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Stats Footer -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mt-6">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-2 text-gray-600">
                        <i class="fas fa-file-alt"></i>
                        <span>Total: <span class="font-bold" style="color: var(--primary);">{{ $rppList->count() }}</span> RPP</span>
                    </div>
                    <div class="text-sm text-gray-500">
                        Terakhir diperbarui: {{ $rppList->first()->updated_at->diffForHumans() }}
                    </div>
                </div>
            </div>
            @endif
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

        function toggleDropdown(id) {
            const dropdown = document.getElementById('dropdown-' + id);
            // Close all other dropdowns
            document.querySelectorAll('[id^="dropdown-"]').forEach(d => {
                if (d.id !== 'dropdown-' + id) d.classList.add('hidden');
            });
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('[onclick^="toggleDropdown"]')) {
                document.querySelectorAll('[id^="dropdown-"]').forEach(d => d.classList.add('hidden'));
            }
        });

        function deleteRpp(id) {
            if (!confirm('Apakah Anda yakin ingin menghapus RPP ini?')) {
                return;
            }

            fetch(`/api/rpp/${id}`, {
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
                    window.location.reload();
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
