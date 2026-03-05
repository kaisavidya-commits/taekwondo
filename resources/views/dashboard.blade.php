<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Andromeda</title>
    
    {{-- Font & Icons --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --navy-dark: #14133B;
            --blue-gray: #555C84;
            --maroon: #8B2A2E;
            --burgundy: #6E0F18;
            --light-gray: #B7B8C7;
            --dark-gray: #8A8C95;
            --soft-bg: #F4F5FA;
        }

        body {
            background: var(--soft-bg);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }

        .card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(20,19,59,0.1);
            width: 100%;
            max-width: 400px;
            padding: 32px 24px;
            border: 1px solid var(--light-gray);
        }

        .avatar {
            width: 70px;
            height: 70px;
            background: var(--navy-dark);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            color: white;
            font-size: 32px;
            border: 3px solid var(--maroon);
        }

        h3 {
            color: var(--navy-dark);
            font-weight: 600;
            text-align: center;
            margin-bottom: 4px;
        }

        .badge {
            background: var(--blue-gray);
            color: white;
            padding: 4px 12px;
            border-radius: 100px;
            font-size: 12px;
            width: fit-content;
            margin: 0 auto 20px;
        }

        .info {
            background: var(--soft-bg);
            border-radius: 16px;
            padding: 16px;
            margin: 20px 0;
            border: 1px solid var(--light-gray);
        }

        .row {
            display: flex;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px dashed var(--light-gray);
        }

        .row:last-child {
            border-bottom: none;
        }

        .row i {
            width: 24px;
            color: var(--burgundy);
        }

        .row span {
            color: var(--dark-gray);
            font-size: 14px;
            margin-left: auto;
        }

        .btn {
            background: var(--maroon);
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 50px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.2s;
            border: 1px solid var(--burgundy);
            font-size: 15px;
        }

        .btn:hover {
            background: var(--burgundy);
        }

        .link {
            text-align: center;
            margin-top: 16px;
            font-size: 13px;
        }

        .link a {
            color: var(--navy-dark);
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="card">
        {{-- AVATAR --}}
        <div class="avatar">
            <i class="fas fa-user"></i>
        </div>

        {{-- USER INFO --}}
        <h3>{{ auth()->user()->name ?? 'User' }}</h3>
        <div class="badge">Member Taekwondo</div>

        {{-- DETAIL --}}
        <div class="info">
            <div class="row">
                <i class="fas fa-envelope"></i>
                <span>{{ auth()->user()->email ?? '-' }}</span>
            </div>
            <div class="row">
                <i class="fas fa-calendar"></i>
                <span>{{ now()->format('d M Y') }}</span>
            </div>
        </div>

        {{-- LOGOUT --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>

        {{-- LINK HOME --}}
        <div class="link">
            <a href="/"><i class="fas fa-home"></i> Kembali ke Home</a>
        </div>
    </div>

</body>
</html>