<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            max-width: 1200px;
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

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.15);
        }

        .stat-card h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .stat-number {
            font-size: 36px;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .quick-links {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            margin-top: 30px;
        }

        .quick-links h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .link-button {
            display: block;
            padding: 15px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            text-align: center;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .link-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
            CP Pembelajaran SMK
        </div>
        <div class="navbar-user">
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-email">{{ Auth::user()->email }}</div>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-card">
            <h1>Selamat Datang, {{ Auth::user()->name }}!</h1>
            <p>Sistem Manajemen Capaian Pembelajaran SMK. Kelola data bidang keahlian, program keahlian, kompetensi keahlian, mata pelajaran, dan capaian pembelajaran dengan mudah.</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📚</div>
                <h3>Bidang Keahlian</h3>
                <div class="stat-number">10</div>
                <div class="stat-label">Total Bidang</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">🎓</div>
                <h3>Program Keahlian</h3>
                <div class="stat-number">50</div>
                <div class="stat-label">Total Program</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">💼</div>
                <h3>Kompetensi Keahlian</h3>
                <div class="stat-number">60</div>
                <div class="stat-label">Total Kompetensi</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">📖</div>
                <h3>Mata Pelajaran</h3>
                <div class="stat-number">157</div>
                <div class="stat-label">Total Mata Pelajaran</div>
            </div>
        </div>

        <div class="quick-links">
            <h2>Menu Utama</h2>
            <div class="links-grid">
                <a href="#" class="link-button">Data Bidang Keahlian</a>
                <a href="#" class="link-button">Data Program Keahlian</a>
                <a href="#" class="link-button">Data Kompetensi Keahlian</a>
                <a href="#" class="link-button">Data Mata Pelajaran</a>
                <a href="#" class="link-button">Capaian Pembelajaran</a>
                <a href="#" class="link-button">Modul Pembelajaran</a>
            </div>
        </div>
    </div>
</body>
</html>
