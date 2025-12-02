<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - CP Pembelajaran</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .verify-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 500px;
            width: 100%;
        }

        .verify-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .verify-header h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .verify-header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .verify-body {
            padding: 40px 30px;
        }

        .email-icon {
            text-align: center;
            font-size: 80px;
            margin-bottom: 20px;
        }

        .message {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 14px;
            color: #856404;
        }

        .success-message {
            background: #d4edda;
            border-left: 4px solid #28a745;
            color: #155724;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 14px;
        }

        .error-message {
            background: #f8d7da;
            border-left: 4px solid #dc3545;
            color: #721c24;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 14px;
        }

        .info-box {
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            font-size: 13px;
            color: #1976d2;
        }

        .info-box strong {
            display: block;
            margin-bottom: 8px;
        }

        .info-box ul {
            margin: 8px 0 0 20px;
        }

        .info-box li {
            margin: 5px 0;
        }

        .btn-resend {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 10px;
        }

        .btn-resend:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-resend:active {
            transform: translateY(0);
        }

        .btn-logout {
            width: 100%;
            padding: 14px;
            background: #6c757d;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 10px;
        }

        .btn-logout:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(108, 117, 125, 0.3);
        }

        .user-email {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin: 15px 0;
            font-weight: 500;
        }

        .user-email strong {
            color: #667eea;
        }
    </style>
</head>
<body>
    <div class="verify-container">
        <div class="verify-header">
            <h1>Verifikasi Email</h1>
            <p>Konfirmasi alamat email Anda</p>
        </div>

        <div class="verify-body">
            <div class="email-icon">📧</div>

            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif

            <div class="message">
                <strong>⚠️ Verifikasi Email Diperlukan!</strong>
                <p style="margin-top: 10px;">
                    <strong>Penting:</strong> Hanya akun yang sudah diverifikasi melalui email yang dapat login ke sistem ini. 
                    Silakan cek email Anda untuk link verifikasi. Jika Anda tidak menerima email, klik tombol di bawah untuk mengirim ulang.
                </p>
            </div>

            @auth
            <div class="user-email">
                Email terdaftar: <strong>{{ auth()->user()->email }}</strong>
            </div>

            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn-resend">🔄 Kirim Ulang Email Verifikasi</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
            @endauth

            <div class="info-box">
                <strong>📌 Petunjuk:</strong>
                <ul>
                    <li>Cek kotak masuk email Anda</li>
                    <li>Email dikirim dari: <strong>ajiaji22209@gmail.com</strong></li>
                    <li>Cek folder <strong>Spam/Junk</strong> jika tidak ada di inbox</li>
                    <li>Klik link verifikasi yang dikirim ke email</li>
                    <li><strong>WAJIB:</strong> Email harus diverifikasi sebelum bisa login</li>
                    <li>Setelah verifikasi, logout dan login kembali dengan akun terverifikasi</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
