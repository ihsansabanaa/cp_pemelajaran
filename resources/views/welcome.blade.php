<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CP Pembelajaran SMK - Sistem Manajemen Capaian Pembelajaran</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-login {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
        }

        .btn-login:hover {
            background: white;
            color: #667eea;
        }

        .btn-register {
            background: white;
            color: #667eea;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.3);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 150px 20px 100px;
            text-align: center;
            margin-top: 70px;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            animation: fadeInUp 1s ease;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
            opacity: 0.95;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            animation: fadeInUp 1s ease 0.2s both;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            animation: fadeInUp 1s ease 0.4s both;
        }

        .btn-primary {
            background: white;
            color: #667eea;
            padding: 15px 40px;
            font-size: 18px;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 15px 40px;
            font-size: 18px;
            border: 2px solid white;
        }

        /* Features Section */
        .features {
            padding: 80px 20px;
            background: #f5f7fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 36px;
            margin-bottom: 50px;
            color: #333;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background: white;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #667eea;
        }

        .feature-card p {
            color: #666;
            line-height: 1.8;
        }

        /* Stats Section */
        .stats {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 20px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            text-align: center;
        }

        .stat-item {
            animation: fadeInUp 1s ease;
        }

        .stat-number {
            font-size: 56px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 18px;
            opacity: 0.9;
        }

        /* About Section */
        .about {
            padding: 80px 20px;
            background: white;
        }

        .about-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .about-content h2 {
            font-size: 36px;
            margin-bottom: 30px;
            color: #333;
        }

        .about-content p {
            font-size: 18px;
            color: #666;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        /* CTA Section */
        .cta {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 20px;
            text-align: center;
        }

        .cta h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.95;
        }

        /* Footer */
        .footer {
            background: #2c3e50;
            color: white;
            padding: 30px 20px;
            text-align: center;
        }

        .footer p {
            margin-bottom: 10px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 15px;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            opacity: 0.8;
            transition: opacity 0.3s;
        }

        .footer-links a:hover {
            opacity: 1;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 32px;
            }

            .hero p {
                font-size: 16px;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .nav-buttons {
                flex-direction: column;
                gap: 10px;
            }

            .section-title {
                font-size: 28px;
            }

            .stat-number {
                font-size: 40px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <span>📚</span>
                <span>CP Pembelajaran SMK</span>
            </div>
            <div class="nav-buttons">
                <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                <a href="{{ route('register') }}" class="btn btn-register">Daftar</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Sistem Manajemen Capaian Pembelajaran SMK</h1>
        <p>Platform terintegrasi untuk mengelola bidang keahlian, program keahlian, kompetensi keahlian, mata pelajaran, dan capaian pembelajaran SMK se-Indonesia</p>
        <div class="hero-buttons">
            <a href="{{ route('register') }}" class="btn btn-primary">Mulai Sekarang</a>
            <a href="#about" class="btn btn-secondary">Pelajari Lebih Lanjut</a>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">10</div>
                    <div class="stat-label">Bidang Keahlian</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50</div>
                    <div class="stat-label">Program Keahlian</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">60</div>
                    <div class="stat-label">Kompetensi Keahlian</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">157</div>
                    <div class="stat-label">Mata Pelajaran</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="section-title">Fitur Unggulan</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🎯</div>
                    <h3>Manajemen Bidang Keahlian</h3>
                    <p>Kelola seluruh bidang keahlian SMK dengan mudah dan terstruktur</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Program Keahlian</h3>
                    <p>Atur dan pantau program keahlian sesuai kurikulum nasional</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💼</div>
                    <h3>Kompetensi Keahlian</h3>
                    <p>Dokumentasi lengkap kompetensi keahlian untuk setiap program</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📚</div>
                    <h3>Mata Pelajaran</h3>
                    <p>Database mata pelajaran umum dan kejuruan yang komprehensif</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">✅</div>
                    <h3>Capaian Pembelajaran</h3>
                    <p>Detail capaian pembelajaran sesuai standar kurikulum merdeka</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📖</div>
                    <h3>Modul Pembelajaran</h3>
                    <p>Kelola modul pembelajaran untuk setiap mata pelajaran</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="about-content">
            <h2>Tentang Sistem</h2>
            <p>CP Pembelajaran SMK adalah platform digital yang dirancang khusus untuk membantu pengelolaan data capaian pembelajaran di Sekolah Menengah Kejuruan (SMK). Sistem ini mengintegrasikan seluruh komponen pendidikan kejuruan mulai dari bidang keahlian hingga modul pembelajaran.</p>
            <p>Dengan interface yang user-friendly dan database yang terstruktur, sistem ini memudahkan guru, kepala sekolah, dan administrator dalam mengakses, mengelola, dan mengembangkan kurikulum SMK sesuai dengan standar Kurikulum Merdeka.</p>
            <p>Platform ini telah mengintegrasikan 10 bidang keahlian, 50 program keahlian, 60 kompetensi keahlian, dan 157 mata pelajaran dengan detail capaian pembelajaran yang komprehensif.</p>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Siap Memulai?</h2>
            <p>Bergabunglah dengan sistem manajemen capaian pembelajaran modern untuk SMK</p>
            <a href="{{ route('register') }}" class="btn btn-primary">Daftar Sekarang</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 CP Pembelajaran SMK. All rights reserved.</p>
            <p>Sistem Manajemen Capaian Pembelajaran Sekolah Menengah Kejuruan</p>
            <div class="footer-links">
                <a href="#">Kebijakan Privasi</a>
                <a href="#">Syarat & Ketentuan</a>
                <a href="#">Kontak</a>
            </div>
        </div>
    </footer>
</body>
</html>
