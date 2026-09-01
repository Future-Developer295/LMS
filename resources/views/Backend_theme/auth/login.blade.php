<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — EduAdmin Pro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --primary-container: #eef2ff;
            --on-primary: #ffffff;
            --accent: #d97706;
            --accent-container: #fef3c7;

            --success: #1e8e3e;
            --success-container: #e6f4ea;
            --warning: #b06000;
            --warning-container: #fef3c7;
            --danger: #ba1a1a;
            --danger-container: #ffdad6;

            --bg: #f7f7fb;
            --surface: #ffffff;
            --surface-hover: #f1f1fb;
            --surface-variant: #e9e9f8;

            --border: #e2e2ee;
            --border-soft: #edecf7;

            --text-primary: #202124;
            --text-secondary: #5f6368;
            --text-muted: #80868b;
            --text-inverse: #ffffff;

            --radius-sm: 0.5rem;
            --radius-md: 0.75rem;
            --radius-lg: 1rem;
            --radius-full: 9999px;

            --shadow-1: 0px 1px 3px rgba(0, 0, 0, 0.05);
            --shadow-2: 0px 4px 12px rgba(0, 0, 0, 0.10);

            --space-xs: 4px;
            --space-sm: 8px;
            --space-md: 16px;
            --space-lg: 24px;
            --space-xl: 32px;

            --sidebar-width: 256px;
            --sidebar-rail: 76px;
            --topbar-height: 72px;

            --font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        html,
        body {
            height: 100%;
            font-family: var(--font-family);
        }

        body {
            background: var(--bg);
            color: var(--text-primary);
        }

        .brand-panel {
            background: var(--primary);
            color: var(--on-primary);
            padding: var(--space-xl);
            position: relative;
            overflow: hidden;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .brand-logo .mark {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            background: rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .brand-logo .mark i {
            color: #fff
        }

        .brand-logo .word {
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: -0.01em;
        }

        .brand-hero h1 {
            font-size: 2.1rem;
            font-weight: 700;
            line-height: 1.2;
            max-width: 380px;
            margin-top: var(--space-xl);
        }

        .brand-hero p {
            color: rgba(255, 255, 255, 0.8);
            max-width: 360px;
            margin-top: var(--space-sm);
        }

        .hero-visual {
            position: relative;
            height: 210px;
            margin-top: var(--space-lg);
        }

        .stat-card {
            position: absolute;
            background: var(--surface);
            color: var(--text-primary);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-2);
            padding: var(--space-md);
        }

        .stat-card.primary-card {
            top: 0;
            left: 0;
            z-index: 2;
            width: 230px;
        }

        .stat-card.secondary-card {
            top: 88px;
            left: 150px;
            z-index: 1;
            width: 190px;
            transform: rotate(-3deg);
        }

        .stat-card .label {
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        .stat-card .value {
            font-size: 1.6rem;
            font-weight: 700;
            margin-top: 2px;
        }

        .stat-card .bars {
            display: flex;
            align-items: flex-end;
            gap: 4px;
            height: 36px;
            margin-top: var(--space-sm);
        }

        .stat-card .bars span {
            flex: 1;
            background: var(--primary-container);
            border-radius: 2px;
        }

        .stat-card .bars span.active {
            background: var(--primary);
        }

        .feature-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            padding-top: var(--space-md);
        }

        .feature-list .item {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .feature-list .item i {
            width: 18px;
            text-align: center;
            color: var(--accent);
        }

        .form-panel {
            background: var(--surface);
            padding: var(--space-xl);
        }

        .login-form {
            width: 100%;
            max-width: 380px;
        }

        .login-form h2 {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .login-form .sub {
            color: var(--text-secondary);
            font-size: 0.92rem;
            margin-bottom: var(--space-lg);
        }

        .login-form .field {
            margin-bottom: var(--space-md);
        }

        .login-form label {
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i.leading {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .login-form .form-control {
            padding: 0.65rem 2.4rem;
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            font-size: 0.95rem;
        }

        .login-form .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-container);
        }

        .login-form .form-control.is-invalid {
            border-color: var(--danger);
        }

        .toggle-pass {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            padding: 6px;
        }

      .login-form .error-text {
    color: var(--danger);
    font-size: 0.78rem;
    margin-top: 4px;
}

        .login-form .field.invalid .error-text {
            display: block;
        }

        .row-between {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: var(--space-lg);
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin: 0;
        }

        .remember input {
            accent-color: var(--primary);
        }

        .forgot-link {
            font-size: 0.85rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .login-form .btn-primary {
            width: 100%;
            background: var(--primary);
            border: none;
            padding: 0.72rem;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 0.95rem;
            transition: background 0.15s ease;
        }

        .login-form .btn-primary:hover {
            background: var(--primary-dark);
        }

        .login-form .btn-primary:disabled {
            opacity: 0.75;
            cursor: progress;
        }

        .form-footer-note {
            text-align: center;
            font-size: 0.83rem;
            color: var(--text-muted);
            margin-top: var(--space-lg);
        }

        .mobile-brand {
            display: none;
        }

        @media (max-width: 991.98px) {
            .mobile-brand {
                display: flex;
                align-items: center;
                gap: 8px;
                justify-content: center;
                margin-bottom: var(--space-xl);
            }

            .mobile-brand .mark {
                width: 36px;
                height: 36px;
                border-radius: var(--radius-md);
                background: var(--primary-container);
                color: var(--primary);
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .mobile-brand .word {
                font-weight: 700;
                color: var(--text-primary);
            }

            .form-panel {
                padding: var(--space-lg) var(--space-md);
            }
        }

        .toggle-pass:focus-visible,
        .forgot-link:focus-visible {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
            border-radius: 4px;
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                transition: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="login-page">
        <div class="row g-0 min-vh-100">

            <div class="col-lg-6 d-none d-lg-flex brand-panel">
                <div class="brand-logo">
                    <span class="mark"><i class="fa-solid fa-graduation-cap"></i></span>
                    <span class="word">EduAdmin Pro</span>
                </div>

                <div class="brand-hero">
                    <h1>Every class, every student, one dashboard.</h1>
                    <p>Manage teachers, attendance and assignments without switching tabs.</p>

                    <div class="hero-visual">
                        <div class="stat-card primary-card">
                            <div class="label">Today's attendance</div>
                            <div class="value">94%</div>
                            <div class="bars">
                                <span style="height:40%"></span>
                                <span style="height:65%" class="active"></span>
                                <span style="height:50%"></span>
                                <span style="height:80%" class="active"></span>
                                <span style="height:60%"></span>
                                <span style="height:90%" class="active"></span>
                                <span style="height:70%"></span>
                            </div>
                        </div>
                        <div class="stat-card secondary-card">
                            <div class="label">Next class</div>
                            <div class="value" style="font-size:1rem;">Physics · 10:30 AM</div>
                        </div>
                    </div>
                </div>

                <div class="feature-list">
                    <div class="item"><i class="fa-solid fa-calendar-check"></i> Attendance marked in seconds</div>
                    <div class="item"><i class="fa-solid fa-layer-group"></i> Classes and timetables, organized</div>
                    <div class="item"><i class="fa-solid fa-file-circle-check"></i> Assignments graded on time</div>
                </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center justify-content-center form-panel">
                <form class="login-form" id="loginForm" method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mobile-brand">
        <span class="mark">
            <i class="fa-solid fa-graduation-cap"></i>
        </span>
        <span class="word">EduAdmin Pro</span>
    </div>

    <h2>Welcome back</h2>
    <p class="sub">Login in to manage classes, attendance and assignments.</p>

    <div class="field" id="emailField">
        <label for="email">Email</label>

        <div class="input-wrap">
            <i class="fa-solid fa-envelope leading"></i>

            <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="you@school.edu"
                autocomplete="username"
            >
        </div>

        @error('email')
            <div class="error-text">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="field" id="passField">
        <label for="password">Password</label>

        <div class="input-wrap">
            <i class="fa-solid fa-lock leading"></i>

            <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="••••••••"
                autocomplete="current-password"
            >

            <button
                type="button"
                class="toggle-pass"
                id="togglePass"
                aria-label="Show password"
            >
                <i class="fa-solid fa-eye"></i>
            </button>
        </div>

        @error('password')
            <div class="error-text">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="row-between">
        <label class="remember">
            <input type="checkbox" name="remember">
            Remember me
        </label>
    </div>

    <button type="submit" class="btn btn-primary" id="submitBtn">
        Login
    </button>

    <p class="form-footer-note">
        Need access? Contact your school administrator.
    </p>
</form>
            </div>

        </div>
    </div>

    <script>
        const togglePass = document.getElementById('togglePass');
        const passwordInput = document.getElementById('password');
        togglePass.addEventListener('click', () => {
            const show = passwordInput.type === 'password';
            passwordInput.type = show ? 'text' : 'password';
            togglePass.innerHTML = show ? '<i class="fa-solid fa-eye-slash"></i>' :
                '<i class="fa-solid fa-eye"></i>';
            togglePass.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
        });

        const form = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const emailField = document.getElementById('emailField');
        const passField = document.getElementById('passField');
        const submitBtn = document.getElementById('submitBtn');

        function isValidEmailOrUsername(value) {
            if (!value) return false;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(value) || value.trim().length >= 3;
        }

        form.addEventListener('submit', function(e) {
            let valid = true;

            if (!isValidEmailOrUsername(emailInput.value)) {
                emailField.classList.add('invalid');
                emailInput.classList.add('is-invalid');
                emailInput.setAttribute('aria-invalid', 'true');
                valid = false;
            } else {
                emailField.classList.remove('invalid');
                emailInput.classList.remove('is-invalid');
                emailInput.setAttribute('aria-invalid', 'false');
            }

            if (passwordInput.value.length < 6) {
                passField.classList.add('invalid');
                passwordInput.classList.add('is-invalid');
                passwordInput.setAttribute('aria-invalid', 'true');
                valid = false;
            } else {
                passField.classList.remove('invalid');
                passwordInput.classList.remove('is-invalid');
                passwordInput.setAttribute('aria-invalid', 'false');
            }

            if (!valid) {
                e.preventDefault();
                return;
            }


            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Login...';
        });
    </script>
</body>

</html>
