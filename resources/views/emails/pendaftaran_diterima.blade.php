<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .container { max-width: 500px; margin: 30px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
        .kredensial { background: #f5f5f5; padding: 12px; border-radius: 6px; margin: 16px 0; }
        .footer { font-size: 12px; color: #888; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Selamat, {{ $pendaftar->nama }}!</h2>
        <p>Pendaftaran kamu di <strong>Taekwondo Academy</strong> telah <strong>diterima</strong>.</p>
        <p>Berikut kredensial login kamu:</p>
        <div class="kredensial">
            <b>Email:</b> {{ $pendaftar->email }}<br>
            <b>Password:</b> {{ $password }}
        </div>
        <p>Silakan login dan segera ganti password kamu.</p>
        <p>Salam,<br><strong>Tim Taekwondo Academy</strong></p>
        <div class="footer">Jangan bagikan kredensial ini ke siapapun.</div>
    </div>
</body>
</html>