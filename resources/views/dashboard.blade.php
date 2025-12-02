<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - CP Pembelajaran</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            text-align: right;
        }

        .user-name {
            font-weight: 600;
            font-size: 16px;
        }

        .user-email {
            font-size: 12px;
            opacity: 0.9;
        }

        .btn-logout {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
            padding: 8px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-logout:hover {
            background: white;
            color: #667eea;
        }

        .container {
            max-width: 1400px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .welcome-card h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 32px;
        }

        .welcome-card p {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
        }

        .filter-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .filter-card h2 {
            color: #333;
            margin-bottom: 25px;
            font-size: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 0;
        }

        .filter-row-last {
            display: grid;
            grid-template-columns: 1fr 1fr 200px;
            gap: 20px;
            margin-top: 20px;
            align-items: end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group select {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s;
            background: white;
            cursor: pointer;
        }

        .form-group select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group select:disabled {
            background: #f5f5f5;
            cursor: not-allowed;
        }

        .btn-filter {
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            width: 100%;
            height: 46px;
        }

        .btn-filter:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-filter:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }

        .results-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            display: none;
        }

        .results-card.show {
            display: block;
        }

        .results-card h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .cp-detail-item {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-left: 4px solid #667eea;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .cp-detail-item h3 {
            color: #667eea;
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: 700;
        }

        .cp-meta {
            padding: 12px;
            background: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
            color: #555;
        }

        .cp-meta strong {
            color: #333;
        }

        .cp-detail-content {
            color: #555;
            line-height: 1.8;
        }

        .cp-detail-content h4 {
            color: #667eea;
            margin-top: 20px;
            margin-bottom: 12px;
            font-size: 15px;
            font-weight: 700;
            padding-bottom: 8px;
            border-bottom: 2px solid #f0f0f0;
        }

        .cp-detail-content h4:first-child {
            margin-top: 0;
        }

        .loading {
            text-align: center;
            padding: 40px;
            color: #666;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #999;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #d4edda;
            border-left: 4px solid #28a745;
            color: #155724;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
            📚 CP Pembelajaran
        </div>
        <div class="navbar-user">
            <div class="user-info">
                <div class="user-name">{{ auth()->user()->name }}</div>
                <div class="user-email">{{ auth()->user()->email }}</div>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-card">
            <h1>Selamat Datang, {{ auth()->user()->name }}! 👋</h1>
            <p>Gunakan filter di bawah untuk mencari Capaian Pembelajaran (CP) berdasarkan bidang keahlian, kompetensi, program, mata pelajaran, dan fase.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="filter-card">
            <h2>🔍 Filter Capaian Pembelajaran</h2>
            
            <div class="filter-grid">
                <div class="form-group">
                    <label for="bidang_keahlian">Bidang Keahlian</label>
                    <select id="bidang_keahlian" name="bidang_keahlian" required>
                        <option value="">-- Pilih Bidang Keahlian --</option>
                        @foreach($bidangKeahlian as $bidang)
                            <option value="{{ $bidang->id_bidang }}">{{ $bidang->nama_bidang }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="program_keahlian">Program Keahlian</label>
                    <select id="program_keahlian" name="program_keahlian" disabled required>
                        <option value="">-- Pilih Program Keahlian --</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                    <select id="kompetensi_keahlian" name="kompetensi_keahlian" disabled required>
                        <option value="">-- Pilih Kompetensi Keahlian --</option>
                    </select>
                </div>
            </div>

            <div class="filter-row-last">
                <div class="form-group">
                    <label for="fase">Fase</label>
                    <select id="fase" name="fase" required>
                        <option value="">-- Pilih Fase --</option>
                        @foreach($fase as $f)
                            <option value="{{ $f->id_fase }}">Fase {{ $f->nama_fase }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="mata_pelajaran">Mata Pelajaran</label>
                    <select id="mata_pelajaran" name="mata_pelajaran" disabled required>
                        <option value="">-- Pilih Mata Pelajaran --</option>
                    </select>
                </div>

                <button type="button" id="btn_cari" class="btn-filter" disabled>
                    🔍 Cari
                </button>
            </div>
        </div>

        <div class="results-card" id="results_card">
            <h2>📋 Hasil Pencarian</h2>
            <div id="results_content"></div>
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
            resultsCard.classList.remove('show');
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
            resultsCard.classList.remove('show');
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
            
            console.log('loadMataPelajaran called:', { idKompetensi, idFase });
            
            resetDropdown(mataPelajaranSelect, '-- Pilih Mata Pelajaran --');
            resultsCard.classList.remove('show');
            checkFormValidity();

            if (idKompetensi && idFase) {
                const url = `/api/mata-pelajaran/${idKompetensi}/${idFase}`;
                console.log('Fetching:', url);
                
                fetch(url)
                    .then(response => {
                        console.log('Response status:', response.status);
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Mata pelajaran data:', data);
                        mataPelajaranSelect.disabled = false;
                        
                        if (data.length === 0) {
                            console.warn('No mata pelajaran found for this combination');
                            const option = new Option('-- Tidak ada mata pelajaran --', '');
                            mataPelajaranSelect.add(option);
                        } else {
                            data.forEach(item => {
                                const option = new Option(item.nama_mapel, item.id_mapel);
                                mataPelajaranSelect.add(option);
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error loading mata pelajaran:', error);
                        mataPelajaranSelect.disabled = false;
                        const option = new Option('-- Error memuat data --', '');
                        mataPelajaranSelect.add(option);
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

            resultsContent.innerHTML = '<div class="loading">⏳ Mencari data...</div>';
            resultsCard.classList.add('show');

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
                    resultsContent.innerHTML = `<div class="no-data"><h3>❌ ${data.message}</h3></div>`;
                }
            });
        });

        function displayResults(data) {
            if (data.length === 0) {
                resultsContent.innerHTML = '<div class="no-data"><h3>📭 Tidak ada data CP Detail</h3></div>';
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
                    <div class="cp-detail-item">
                        <h3>${mapel.nama_mapel}</h3>
                        <div class="cp-meta">
                            <strong>Fase:</strong> ${fase.nama_fase} | 
                            <strong>Bidang:</strong> ${bidang.nama_bidang} | 
                            <strong>Program:</strong> ${program.nama_program} | 
                            <strong>Kompetensi:</strong> ${kompetensi.nama_kompetensi}
                        </div>
                        <div class="cp-detail-content">
                            ${cp.rasional ? `<h4>📝 Rasional</h4><div style="text-align: justify;">${formatText(cp.rasional)}</div>` : ''}
                            ${cp.tujuan ? `<h4>🎯 Tujuan</h4><div style="text-align: justify;">${formatText(cp.tujuan)}</div>` : ''}
                            ${cp.karakteristik ? `<h4>⭐ Karakteristik</h4><div style="text-align: justify;">${formatText(cp.karakteristik)}</div>` : ''}
                            ${cp.capaian_pembelajaran ? `<h4>🎓 Capaian Pembelajaran</h4><div style="text-align: justify;">${formatText(cp.capaian_pembelajaran)}</div>` : ''}
                            ${cp.uraian_cp ? `<h4>📚 Uraian CP</h4><div style="text-align: justify;">${formatUraianCP(cp.uraian_cp)}</div>` : ''}
                        </div>
                    </div>
                `;
            });

            resultsContent.innerHTML = html;
        }

        function formatText(text) {
            if (!text) return '';
            // Replace newlines with <br> and trim
            return text.replace(/\n/g, '<br>').trim();
        }

        function formatUraianCP(text) {
            if (!text) return '';
            
            // Split by numbering pattern like "1. ", "2. ", etc
            let sections = text.split(/\n(?=\d+\.\s)/);
            let formattedHTML = '';
            
            sections.forEach(section => {
                section = section.trim();
                if (!section) return;
                
                // Extract main number and title (e.g., "1. Basis Data")
                let mainMatch = section.match(/^(\d+)\.\s+(.+?)(?:\n|$)/);
                if (!mainMatch) return;
                
                let mainNumber = mainMatch[1];
                let mainTitle = mainMatch[2].trim();
                
                formattedHTML += `<div style="margin-bottom: 25px;">`;
                formattedHTML += `<div style="margin-bottom: 12px; font-weight: 700; font-size: 15px;">${mainNumber}. ${mainTitle}</div>`;
                
                // Get the rest of the content after the main title
                let remainingContent = section.substring(mainMatch[0].length).trim();
                
                // Split by bullet points or dash points
                let bulletPoints = remainingContent.split(/\n(?=[-•]\s)/);
                
                bulletPoints.forEach(point => {
                    point = point.trim();
                    if (!point) return;
                    
                    // Remove leading bullet/dash
                    point = point.replace(/^[-•]\s*/, '');
                    
                    // Split into lines
                    let lines = point.split(/\n/).map(l => l.trim()).filter(l => l);
                    if (lines.length === 0) return;
                    
                    // First line is the sub-heading (bold)
                    let subHeading = lines[0];
                    
                    formattedHTML += `<div style="margin-left: 20px; margin-bottom: 15px;">`;
                    formattedHTML += `<div style="font-weight: 600; margin-bottom: 5px;">• ${subHeading}</div>`;
                    
                    // Remaining lines are the explanation
                    if (lines.length > 1) {
                        let explanation = lines.slice(1).join(' ');
                        formattedHTML += `<div style="margin-left: 15px; color: #555; line-height: 1.6;">${explanation}</div>`;
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
    </script>
</body>
</html>
