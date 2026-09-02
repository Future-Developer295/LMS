<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Classroom</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="{{ asset('Frontend_theme/css/style.css') }}">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            min-height: 100vh;
            margin: 0;
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            background: white;
            border-radius: 16px;
            padding: 35px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.10);
        }

        .classroom-logo {
            width: 58px;
            height: 58px;
            margin: 0 auto 15px;
        }

        .login-title {
            color: #3c4043;
            font-size: 28px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 5px;
        }

        .login-subtitle {
            color: #6c757d;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #444746;
        }

        .form-control {
            height: 48px;
            border-radius: 8px;
            border: 1px solid #dadce0;
        }

        .form-control:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 0 3px rgba(26,115,232,0.12);
        }

        .login-btn {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 8px;
            background: #1a73e8;
            color: white;
            font-weight: 600;
            margin-top: 10px;
        }

        .login-btn:hover {
            background: #1765c1;
        }

        .register-link {
            color: #1a73e8;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        .forgot-link {
            color: #1a73e8;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="login-page">

    <div class="login-card">

       
        <div class="text-center">
            <svg class="classroom-logo"
                 viewBox="0 0 108 108"
                 xmlns="http://www.w3.org/2000/svg">

                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M96.75 11.25h-85.5c-3.73 0-6.75 3.02-6.75 6.75v72c0 3.729 3.02 6.75 6.75 6.75h85.5c3.729 0 6.75-3.021 6.75-6.75V18c0-3.73-3.021-6.75-6.75-6.75z"
                    fill="#F4B400"/>

                <path
                    d="M13.5 20.25h81v67.5h-81v-67.5z"
                    fill="#0F9D58"/>

                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M36 56.25a5.063 5.063 0 100-10.126 5.063 5.063 0 000 10.126zm41.063-5.063a5.063 5.063 0 11-10.126 0 5.063 5.063 0 0110.126 0zM60.75 66.055c0-3.555 5.828-6.429 11.25-6.429s11.25 2.874 11.25 6.43v3.695h-22.5v-3.696zm-36 0c0-3.555 5.828-9 11.25-9 5.423 0 11.25 2.874 11.25 6.43v3.695h-22.5v-3.696z"
                    fill="#57BB8A"/>

                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M60.75 45.001c0 3.73-3.02 6.75-6.744 6.75a6.753 6.753 0 01-6.756-6.75 6.756 6.756 0 016.756-6.75c3.723 0 6.744 3.026 6.744 6.75zm-22.5 20.25c0-4.973 8.156-9 15.75-9 7.594 0 15.75 4.027 15.75 9v4.5h-31.5v-4.5z"
                    fill="#F7F7F7"/>
            </svg>
        </div>

        <h2 class="login-title">Welcome to Classroom</h2>

        <p class="login-subtitle">
            Sign in to continue to your student portal
        </p>

       
        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="fa-solid fa-circle-exclamation me-2"></i>
                {{ $errors->first() }}
            </div>
        @endif

      
        <form method="POST" action="{{ route('login') }}">
            @csrf

            
            <div class="mb-3">
                <label for="email" class="form-label">
                    Email Address
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control"
                    placeholder="Enter your email"
                    required
                    autofocus
                    autocomplete="username">
            </div>

          
            <div class="mb-2">
                <label for="password" class="form-label">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password">
            </div>

         
            <div class="d-flex justify-content-between align-items-center mb-3">

                <label class="d-flex align-items-center gap-2">
                    <input
                        type="checkbox"
                        name="remember">

                    <span class="text-muted small">
                        Remember me
                    </span>
                </label>

                @if (Route::has('password.request'))
                    <a
                        href="{{ route('password.request') }}"
                        class="forgot-link">
                        Forgot password?
                    </a>
                @endif

            </div>

           
            <button type="submit" class="login-btn">
                <i class="fa-solid fa-right-to-bracket me-2"></i>
                Log in
            </button>

        </form>

        <div class="text-center mt-4">

            <span class="text-muted">
                Don't have an account?
            </span>

            <a
                href="{{ route('register') }}"
                class="register-link">
                Create account
            </a>

        </div>

    </div>

</div>

</body>
</html>