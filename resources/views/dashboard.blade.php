<!DOCTYPE html>
<html lang="id" data-theme="corporate">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - CP Pembelajaran</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-200">
    <!-- Navbar -->
    <div class="navbar bg-primary text-primary-content shadow-lg">
        <div class="flex-1">
            <a class="btn btn-ghost normal-case text-xl">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                </svg>
                CP Pembelajaran
            </a>
        </div>
        <div class="flex-none gap-2">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar placeholder">
                    <div class="bg-neutral-focus text-neutral-content rounded-full w-10">
                        <span class="text-xl">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                </label>
                <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 text-base-content rounded-box w-52">
                    <li class="menu-title">
                        <span>{{ auth()->user()->name }}</span>
                    </li>
                    <li><a class="text-xs opacity-60">{{ auth()->user()->email }}</a></li>
                    <div class="divider my-0"></div>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                            @csrf
                            <button type="button" onclick="confirmLogout()" class="w-full text-left">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <!-- Welcome Card -->
        <div class="card bg-base-100 shadow-xl mb-6">
            <div class="card-body">
                <h1 class="card-title text-3xl">Selamat Datang, {{ auth()->user()->name }}! 👋</h1>
                <p class="opacity-70">Gunakan filter di bawah untuk mencari Capaian Pembelajaran (CP) berdasarkan bidang keahlian, kompetensi, program, mata pelajaran, dan fase.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success shadow-lg mb-6">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Filter Card -->
        <div class="card bg-base-100 shadow-xl mb-6">
            <div class="card-body">
                <h2 class="card-title text-2xl mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Filter Capaian Pembelajaran
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Bidang Keahlian</span>
                        </label>
                        <select id="bidang_keahlian" class="select select-bordered w-full">
                            <option value="">-- Pilih Bidang Keahlian --</option>
                            @foreach($bidangKeahlian as $bidang)
                                <option value="{{ $bidang->id_bidang }}">{{ $bidang->nama_bidang }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Program Keahlian</span>
                        </label>
                        <select id="program_keahlian" class="select select-bordered w-full" disabled>
                            <option value="">-- Pilih Program Keahlian --</option>
                        </select>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Kompetensi Keahlian</span>
                        </label>
                        <select id="kompetensi_keahlian" class="select select-bordered w-full" disabled>
                            <option value="">-- Pilih Kompetensi Keahlian --</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Fase</span>
                        </label>
                        <select id="fase" class="select select-bordered w-full">
                            <option value="">-- Pilih Fase --</option>
                            @foreach($fase as $f)
                                <option value="{{ $f->id_fase }}">Fase {{ $f->nama_fase }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Mata Pelajaran</span>
                        </label>
                        <select id="mata_pelajaran" class="select select-bordered w-full" disabled>
                            <option value="">-- Pilih Mata Pelajaran --</option>
                        </select>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text opacity-0">Button</span>
                        </label>
                        <button type="button" id="btn_cari" class="btn btn-primary w-full" disabled>
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Cari
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Card -->
        <div id="results_card" class="card bg-base-100 shadow-xl hidden">
            <div class="card-body">
                <h2 class="card-title text-2xl mb-4">📋 Hasil Pencarian</h2>
                <div id="results_content"></div>
            </div>
        </div>
    </div>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const bidangKeahlianSelect = document.getElementById('bidang_keahlian');
        const programKeahlianSelect = document.getElementById('program_keahlian');
        const kompetensiKeahlianSelect = document.getElementById('kompetensi_keahlian');
        const faseSelect = document.getElementById('fase');
        const mataPelajaranSelect = document.getElementById('mata_pelajaran');
        const btnCari = document.getElementById('btn_cari');
        const resultsCard = document.getElementById('results_card');
        const resultsContent = document.getElementById('results_content');

        bidangKeahlianSelect.addEventListener('change', function() {
            const idBidang = this.value;
            resetDropdown(programKeahlianSelect, '-- Pilih Program Keahlian --');
            resetDropdown(kompetensiKeahlianSelect, '-- Pilih Kompetensi Keahlian --');
            resetDropdown(mataPelajaranSelect, '-- Pilih Mata Pelajaran --');
            resultsCard.classList.add('hidden');
            checkFormValidity();

            if (idBidang) {
                fetch(`/api/program-keahlian/${idBidang}`)
                    .then(response => response.json())
                    .then(data => {
                        programKeahlianSelect.disabled = false;
                        data.forEach(item => {
                            const option = new Option(item.nama_program, item.id_program);
                            programKeahlianSelect.add(option);
                        });
                    });
            }
        });

        programKeahlianSelect.addEventListener('change', function() {
            const idProgram = this.value;
            resetDropdown(kompetensiKeahlianSelect, '-- Pilih Kompetensi Keahlian --');
            resetDropdown(mataPelajaranSelect, '-- Pilih Mata Pelajaran --');
            resultsCard.classList.add('hidden');
            checkFormValidity();

            if (idProgram) {
                fetch(`/api/kompetensi-keahlian/${idProgram}`)
                    .then(response => response.json())
                    .then(data => {
                        kompetensiKeahlianSelect.disabled = false;
                        data.forEach(item => {
                            const option = new Option(item.nama_kompetensi, item.id_kompetensi);
                            kompetensiKeahlianSelect.add(option);
                        });
                    });
            }
        });

        kompetensiKeahlianSelect.addEventListener('change', loadMataPelajaran);
        faseSelect.addEventListener('change', loadMataPelajaran);

        function loadMataPelajaran() {
            const idKompetensi = kompetensiKeahlianSelect.value;
            const idFase = faseSelect.value;
            
            resetDropdown(mataPelajaranSelect, '-- Pilih Mata Pelajaran --');
            resultsCard.classList.add('hidden');
            checkFormValidity();

            if (idKompetensi && idFase) {
                fetch(`/api/mata-pelajaran/${idKompetensi}/${idFase}`)
                    .then(response => response.json())
                    .then(data => {
                        mataPelajaranSelect.disabled = false;
                        if (data.length === 0) {
                            const option = new Option('-- Tidak ada mata pelajaran --', '');
                            mataPelajaranSelect.add(option);
                        } else {
                            data.forEach(item => {
                                const option = new Option(item.nama_mapel, item.id_mapel);
                                mataPelajaranSelect.add(option);
                            });
                        }
                    });
            }
        }

        mataPelajaranSelect.addEventListener('change', checkFormValidity);

        btnCari.addEventListener('click', function() {
            const formData = {
                id_bidang: bidangKeahlianSelect.value,
                id_program: programKeahlianSelect.value,
                id_kompetensi: kompetensiKeahlianSelect.value,
                id_mapel: mataPelajaranSelect.value,
                id_fase: faseSelect.value
            };

            resultsContent.innerHTML = '<div class="flex justify-center items-center p-8"><span class="loading loading-spinner loading-lg"></span></div>';
            resultsCard.classList.remove('hidden');

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
                } else {
                    resultsContent.innerHTML = `<div class="alert alert-warning"><span>❌ ${data.message}</span></div>`;
                }
            });
        });

        function displayResults(data) {
            if (data.length === 0) {
                resultsContent.innerHTML = '<div class="alert alert-info"><span>📭 Tidak ada data CP Detail</span></div>';
                return;
            }

            let html = '';
            data.forEach(cp => {
                const mapel = cp.mata_pelajaran;
                const kompetensi = mapel.kompetensi_keahlian;
                const program = kompetensi.program_keahlian;
                const bidang = program.bidang_keahlian;
                const fase = mapel.fase;

                html += `
                    <div class="card bg-base-100 border border-base-300 mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary">${mapel.nama_mapel}</h3>
                            <div class="badge badge-outline badge-info mb-4">
                                Fase ${fase.nama_fase} | ${bidang.nama_bidang} | ${program.nama_program} | ${kompetensi.nama_kompetensi}
                            </div>
                            <div class="prose max-w-none">
                                ${cp.rasional ? `<h4 class="text-sm font-bold text-primary mt-4 mb-2">📝 Rasional</h4><div class="text-sm">${formatText(cp.rasional)}</div>` : ''}
                                ${cp.tujuan ? `<h4 class="text-sm font-bold text-primary mt-4 mb-2">🎯 Tujuan</h4><div class="text-sm">${formatText(cp.tujuan)}</div>` : ''}
                                ${cp.karakteristik ? `<h4 class="text-sm font-bold text-primary mt-4 mb-2">⭐ Karakteristik</h4><div class="text-sm">${formatText(cp.karakteristik)}</div>` : ''}
                                ${cp.capaian_pembelajaran ? `<h4 class="text-sm font-bold text-primary mt-4 mb-2">🎓 Capaian Pembelajaran</h4><div class="text-sm">${formatText(cp.capaian_pembelajaran)}</div>` : ''}
                                ${cp.uraian_cp ? `<h4 class="text-sm font-bold text-primary mt-4 mb-2">📚 Uraian CP</h4><div class="text-sm">${formatUraianCP(cp.uraian_cp)}</div>` : ''}
                            </div>
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
                formattedHTML += `<div class="font-bold text-sm mb-3">${mainNumber}. ${mainTitle}</div>`;
                
                let remainingContent = section.substring(mainMatch[0].length).trim();
                let bulletPoints = remainingContent.split(/\n(?=[-•]\s)/);
                
                bulletPoints.forEach(point => {
                    point = point.trim();
                    if (!point) return;
                    
                    point = point.replace(/^[-•]\s*/, '');
                    let lines = point.split(/\n/).map(l => l.trim()).filter(l => l);
                    if (lines.length === 0) return;
                    
                    let subHeading = lines[0];
                    
                    formattedHTML += `<div class="ml-5 mb-3">`;
                    formattedHTML += `<div class="font-semibold text-xs mb-1">• ${subHeading}</div>`;
                    
                    if (lines.length > 1) {
                        let explanation = lines.slice(1).join(' ');
                        formattedHTML += `<div class="ml-4 text-xs opacity-70 leading-relaxed">${explanation}</div>`;
                    }
                    
                    formattedHTML += `</div>`;
                });
                
                formattedHTML += `</div>`;
            });
            
            return formattedHTML || text;
        }

        function resetDropdown(selectElement, placeholder) {
            selectElement.innerHTML = `<option value="">${placeholder}</option>`;
            selectElement.disabled = true;
        }

        function checkFormValidity() {
            const isValid = bidangKeahlianSelect.value && programKeahlianSelect.value && 
                           kompetensiKeahlianSelect.value && faseSelect.value && mataPelajaranSelect.value;
            btnCari.disabled = !isValid;
        }

        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                document.getElementById('logoutForm').submit();
            }
        }
    </script>
</body>
</html>
