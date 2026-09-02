<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign Up - Classroom</title>

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
    overflow-y: auto;
}

        .register-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .register-card {
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

        .register-title {
            color: #3c4043;
            font-size: 28px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 5px;
        }

        .register-subtitle {
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

        .register-btn {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 8px;
            background: #1a73e8;
            color: white;
            font-weight: 600;
            margin-top: 10px;
        }

        .register-btn:hover {
            background: #1765c1;
        }

        .login-link {
            color: #1a73e8;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .error-box {
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="register-page">

    <div class="register-card">

       
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

        <h2 class="register-title">
            Create your account
        </h2>

        <p class="register-subtitle">
            Join Classroom as a student
        </p>

      
        @if ($errors->any())
            <div class="alert alert-danger error-box">
                <i class="fa-solid fa-circle-exclamation me-2"></i>

                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       
        <form method="POST" action="{{ route('register') }}">
            @csrf

           
            <div class="mb-3">
                <label for="name" class="form-label">
                    Full Name
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="form-control"
                    placeholder="Enter your full name"
                    required
                    autofocus
                    autocomplete="name">
            </div>

          
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
                    autocomplete="username">
            </div>

           
            <div class="mb-3">
                <label for="password" class="form-label">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Create a password"
                    required
                    autocomplete="new-password">
            </div>

           
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                    Confirm Password
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Confirm your password"
                    required
                    autocomplete="new-password">
            </div>

            
            <button type="submit" class="register-btn">
                <i class="fa-solid fa-user-plus me-2"></i>
                Create Account
            </button>

        </form>

   
        <div class="text-center mt-4">

            <span class="text-muted">
                Already have an account?
            </span>

            <a
                href="{{ route('login') }}"
                class="login-link">
                Log in
            </a>

        </div>

    </div>

</div>

</body>
</html>