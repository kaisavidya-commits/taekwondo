<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login — {{ config('app.name', 'Taekwondo') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    @verbatim
        :root {
            --navy-dark: #14133B;
            --blue-gray: #555C84;
            --maroon: #8B2A2E;
            --burgundy: #6E0F18;
            --light-gray: #B7B8C7;
            --dark-gray: #8A8C95;
            --soft-bg: #F4F5FA;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            display: flex;
            overflow: hidden;
        }

        /* ── Left Panel ── */
        .left-panel {
            position: relative;
            width: 52%;
            background: var(--burgundy);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 3rem;
            overflow: hidden;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            top: -80px; right: -60px;
            width: 340px; height: 340px;
            background: var(--maroon);
            border-radius: 50%;
            opacity: 0.45;
            animation: floatCircle 8s ease-in-out infinite;
        }

        .left-panel::after {
            content: '';
            position: absolute;
            bottom: -100px; left: -60px;
            width: 420px; height: 420px;
            background: var(--navy-dark);
            border-radius: 50%;
            opacity: 0.35;
            animation: floatCircle 12s ease-in-out infinite reverse;
        }

        @keyframes floatCircle {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(-15px, -15px) scale(1.05); }
            66% { transform: translate(15px, 15px) scale(0.95); }
        }

        .silhouette {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
            animation: fadeInScale 1.2s cubic-bezier(0.22,1,0.36,1) both;
        }

        .silhouette svg {
            width: 70%;
            max-width: 300px;
            opacity: 0.10;
            fill: #fff;
            animation: kickFloat 5s ease-in-out infinite;
        }

        @keyframes kickFloat {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            33% { transform: translateY(-15px) rotate(2deg); }
            66% { transform: translateY(5px) rotate(-1deg); }
        }

        .left-content { 
            position: relative; 
            z-index: 2; 
            animation: slideUpContent 0.8s cubic-bezier(0.22,1,0.36,1) 0.2s both;
        }

        @keyframes slideUpContent {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .tkd-badge {
            display: inline-block;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.25);
            color: rgba(255,255,255,0.85);
            font-size: 0.7rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            padding: 0.35rem 0.85rem;
            border-radius: 100px;
            margin-bottom: 1.25rem;
            font-weight: 600;
            animation: badgePop 0.6s cubic-bezier(0.34,1.56,0.64,1) 0.3s both;
            transform-origin: left;
        }

        @keyframes badgePop {
            from { opacity: 0; transform: scale(0.6) translateX(-20px); }
            to { opacity: 1; transform: scale(1) translateX(0); }
        }

        .left-heading {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(3rem, 5vw, 4.5rem);
            color: #fff;
            line-height: 0.95;
            letter-spacing: 0.03em;
            margin-bottom: 1rem;
        }

        .left-heading span { color: var(--light-gray); opacity: 0.55; }

        .left-heading .line {
            display: inline-block;
            animation: slideRight 0.5s cubic-bezier(0.22,1,0.36,1) both;
        }

        .left-heading .line:nth-child(1) { animation-delay: 0.4s; }
        .left-heading .line:nth-child(2) { animation-delay: 0.5s; }
        .left-heading .line:nth-child(3) { animation-delay: 0.6s; }

        @keyframes slideRight {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .left-desc {
            font-size: 0.88rem;
            color: rgba(255,255,255,0.6);
            line-height: 1.65;
            max-width: 300px;
            animation: fadeInUp 0.6s cubic-bezier(0.22,1,0.36,1) 0.7s both;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .belt-stripes {
            display: flex;
            gap: 5px;
            margin-top: 2.5rem;
            animation: stripeContainer 0.8s 0.8s both;
        }

        @keyframes stripeContainer {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .belt-stripes span {
            height: 4px;
            border-radius: 2px;
            flex: 1;
            transform-origin: left;
            animation: stripeGrow 0.5s cubic-bezier(0.34,1.56,0.64,1) both;
        }

        @keyframes stripeGrow {
            from { transform: scaleX(0); opacity: 0; }
            to { transform: scaleX(1); opacity: 1; }
        }

        .belt-stripes span:nth-child(1) { 
            background: #fff; opacity: 0.9;
            animation-delay: 0.9s; 
        }
        .belt-stripes span:nth-child(2) { 
            background: var(--light-gray); opacity: 0.5;
            animation-delay: 1.0s; 
        }
        .belt-stripes span:nth-child(3) { 
            background: var(--maroon); opacity: 0.8;
            animation-delay: 1.1s; 
        }
        .belt-stripes span:nth-child(4) { 
            background: var(--navy-dark); opacity: 0.9;
            animation-delay: 1.2s; 
        }
        .belt-stripes span:nth-child(5) { 
            background: #fff; opacity: 0.3;
            animation-delay: 1.3s; 
        }

        /* ── Right Panel ── */
        .right-panel {
            flex: 1;
            background: var(--soft-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2.5rem;
            position: relative;
            animation: slideInRight 0.8s cubic-bezier(0.22,1,0.36,1) 0.1s both;
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .right-panel::before {
            content: '';
            position: absolute;
            top: 0; right: 0;
            width: 220px; height: 220px;
            background: radial-gradient(circle, rgba(139,42,46,0.07), transparent 70%);
            pointer-events: none;
            animation: pulseGlow 4s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% { opacity: 0.5; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        .form-box {
            width: 100%;
            max-width: 380px;
        }

        .form-logo {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            margin-bottom: 2.5rem;
            animation: slideDownLogo 0.6s 0.3s both;
        }

        @keyframes slideDownLogo {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-logo-icon {
            width: 38px; height: 38px;
            background: var(--burgundy);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: rotateIcon 0.8s 0.4s both;
        }

        @keyframes rotateIcon {
            from { transform: rotate(-180deg) scale(0); }
            to { transform: rotate(0) scale(1); }
        }

        .form-logo-text {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.3rem;
            letter-spacing: 0.06em;
            color: var(--navy-dark);
        }

        .form-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2rem;
            color: var(--navy-dark);
            letter-spacing: 0.04em;
            margin-bottom: 0.3rem;
            animation: fadeInTitle 0.6s 0.5s both;
        }

        @keyframes fadeInTitle {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-subtitle {
            font-size: 0.83rem;
            color: var(--dark-gray);
            margin-bottom: 2rem;
            animation: fadeIn 0.6s 0.6s both;
        }

        .session-status {
            background: rgba(110,15,24,0.08);
            border-left: 3px solid var(--burgundy);
            color: var(--burgundy);
            padding: 0.7rem 1rem;
            border-radius: 6px;
            font-size: 0.83rem;
            margin-bottom: 1.5rem;
            animation: slideInStatus 0.5s 0.7s both;
        }

        @keyframes slideInStatus {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .form-group { 
            margin-bottom: 1.2rem;
            animation: slideUpForm 0.5s cubic-bezier(0.22,1,0.36,1) both;
        }

        .form-group:nth-of-type(1) { animation-delay: 0.8s; }
        .form-group:nth-of-type(2) { animation-delay: 0.9s; }

        @keyframes slideUpForm {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        label {
            display: block;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--blue-gray);
            margin-bottom: 0.45rem;
        }

        .input-wrap { 
            position: relative;
            animation: inputBorderGlow 2s infinite;
        }

        @keyframes inputBorderGlow {
            0%, 100% { filter: drop-shadow(0 0 0 rgba(139,42,46,0)); }
            50% { filter: drop-shadow(0 0 5px rgba(139,42,46,0.3)); }
        }

        .input-icon {
            position: absolute;
            left: 12px; top: 50%;
            transform: translateY(-50%);
            width: 16px; height: 16px;
            pointer-events: none;
            opacity: 0.45;
            transition: opacity 0.2s;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.72rem 1rem 0.72rem 2.5rem;
            border: 1.5px solid var(--light-gray);
            border-radius: 8px;
            font-size: 0.92rem;
            font-family: 'Inter', sans-serif;
            color: var(--navy-dark);
            background: #fff;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, transform 0.2s;
        }

        input[type="email"]:hover,
        input[type="password"]:hover {
            transform: scale(1.01);
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: var(--maroon);
            box-shadow: 0 0 0 3px rgba(139,42,46,0.1);
            transform: scale(1.02);
        }

        .input-error {
            font-size: 0.75rem;
            color: var(--maroon);
            margin-top: 0.35rem;
            animation: shakeError 0.3s ease-in-out;
        }

        @keyframes shakeError {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
        }

        .row-between {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.75rem;
            animation: slideUpRow 0.5s 1.0s both;
        }

        @keyframes slideUpRow {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 0.45rem;
            cursor: pointer;
        }

        .remember-label input[type="checkbox"] {
            accent-color: var(--burgundy);
            width: 15px; height: 15px;
            transition: transform 0.2s;
        }

        .remember-label input[type="checkbox"]:checked {
            transform: scale(1.2);
        }

        .remember-label span {
            font-size: 0.82rem;
            color: var(--dark-gray);
        }

        .forgot-link {
            font-size: 0.82rem;
            color: var(--maroon);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s, transform 0.2s;
            display: inline-block;
        }

        .forgot-link:hover { 
            color: var(--burgundy); 
            transform: translateX(3px);
            text-decoration: underline; 
        }

        .btn-login {
            width: 100%;
            padding: 0.82rem;
            background: var(--burgundy);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 0.85rem;
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
            animation: btnPop 0.6s 1.1s both, pulseRing 2.5s 1.7s infinite;
        }

        @keyframes btnPop {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes pulseRing {
            0% { box-shadow: 0 0 0 0 rgba(139,42,46,0.4); }
            70% { box-shadow: 0 0 0 10px rgba(139,42,46,0); }
            100% { box-shadow: 0 0 0 0 rgba(139,42,46,0); }
        }

        .btn-login:hover {
            background: var(--maroon);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(110,15,24,0.3);
        }

        .btn-login:active { transform: translateY(0); }

        .btn-login::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            opacity: 0;
            transition: transform 0.5s, opacity 0.3s;
        }

        .btn-login:active::after {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
            transition: 0s;
        }

        .form-footer {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.8rem;
            color: var(--dark-gray);
            animation: fadeInFooter 0.6s 1.2s both;
        }

        @keyframes fadeInFooter {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .form-footer a {
            color: var(--maroon);
            font-weight: 600;
            text-decoration: none;
            position: relative;
        }

        .form-footer a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 1px;
            background: var(--maroon);
            transform: scaleX(0);
            transition: transform 0.3s;
            transform-origin: right;
        }

        .form-footer a:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        @media (max-width: 700px) {
            .left-panel { display: none; }
            .right-panel { padding: 2rem 1.5rem; }
            body { overflow-y: auto; }
        }

        /* Loading state animation */
        .btn-login.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .btn-login.loading span {
            opacity: 0;
        }

        .btn-login.loading::before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid white;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    @endverbatim
    </style>
</head>
<body>

    <!-- Left Branding Panel -->
    <div class="left-panel">
        <div class="silhouette">
            <svg viewBox="0 0 200 300" xmlns="http://www.w3.org/2000/svg">
                <circle cx="100" cy="30" r="22"/>
                <rect x="82" y="54" width="36" height="70" rx="10"/>
                <path d="M82 75 Q50 55 30 40" stroke="white" stroke-width="14" stroke-linecap="round" fill="none"/>
                <path d="M118 75 Q148 90 162 110" stroke="white" stroke-width="14" stroke-linecap="round" fill="none"/>
                <path d="M95 124 Q90 170 88 220" stroke="white" stroke-width="16" stroke-linecap="round" fill="none"/>
                <path d="M88 220 Q84 250 70 265" stroke="white" stroke-width="14" stroke-linecap="round" fill="none"/>
                <path d="M105 124 Q120 155 145 165" stroke="white" stroke-width="16" stroke-linecap="round" fill="none"/>
                <path d="M145 165 Q175 170 195 155" stroke="white" stroke-width="14" stroke-linecap="round" fill="none"/>
            </svg>
        </div>
        <div class="left-content">
            <div class="tkd-badge">🥋 &nbsp;Taekwondo Portal</div>
            <h1 class="left-heading">
                <span class="line">Train.</span><br>
                <span class="line">Compete.</span><br>
                <span class="line">Conquer.</span>
            </h1>
            <p class="left-desc">
                Sign in to access your training schedule, belt records, and club announcements.
            </p>
            <div class="belt-stripes">
                <span></span><span></span><span></span><span></span><span></span>
            </div>
        </div>
    </div>

    <!-- Right Form Panel -->
    <div class="right-panel">
        <div class="form-box">

            <div class="form-logo">
                <div class="form-logo-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L3 7v5c0 5.25 3.75 10.15 9 11.25C17.25 22.15 21 17.25 21 12V7L12 2z" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/>
                        <path d="M9 12l2 2 4-4" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="form-logo-text">{{ config('app.name', 'TKD Club') }}</span>
            </div>

            <h2 class="form-title">Member Login</h2>
            <p class="form-subtitle">Welcome back, athlete</p>

            @if (session('status'))
                <div class="session-status">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrap">
                        <input id="email" type="email" name="email"
                            value="{{ old('email') }}" required autofocus
                            autocomplete="username" placeholder="athlete@tkdclub.com">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="var(--maroon)" stroke-width="1.6" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </div>
                    @error('email')<p class="input-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <input id="password" type="password" name="password"
                            required autocomplete="current-password" placeholder="••••••••">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="var(--maroon)" stroke-width="1.6" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4" stroke-linecap="round"/>
                        </svg>
                    </div>
                    @error('password')<p class="input-error">{{ $message }}</p>@enderror
                </div>

                <div class="row-between">
                    <label class="remember-label">
                        <input type="checkbox" name="remember" id="remember_me">
                        <span>Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>

                <button type="submit" class="btn-login" id="loginBtn">
                    <span>Sign In</span>
                </button>

                <div class="form-footer">
                    Not a member yet? <a href="{{ route('pendaftaran') }}">Join the club</a>
                </div>

            </form>
        </div>
    </div>

    <script>
        document.getElementById('loginForm')?.addEventListener('submit', function(e) {
            const btn = document.getElementById('loginBtn');
            btn.classList.add('loading');
        });
    </script>

</body>
</html>