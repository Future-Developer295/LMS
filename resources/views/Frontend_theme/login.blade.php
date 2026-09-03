<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Login - Classroom</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('Frontend_theme/css/style.css') }}">

    <style>/* Main yellow theme */
body {
    margin: 0;
    min-height: 100vh;
    background: #fffdf5;
    font-family: Arial, sans-serif;
}
.student-login-wrapper{
    display: flex;
    justify-content: center;
    align-items: center;
}
.classroom-logo {
    width: 60px;
    height: 60px;
    display: block;
}
/* Login card */
.student-login-card {
    width: 100%;
    max-width: 430px;
    background: #fff;
    border: 1px solid #f0d98c;
    border-radius: 18px;
    padding: 40px;
    box-shadow: 0 5px 18px rgba(180, 140, 20, 0.15);
}

/* Logo background */
.login-logo {
    width: 60px;
    height: 60px;
    margin: 0 auto 18px;
    border-radius: 16px;
    background: #fff3c4;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #f4b400;
    font-size: 28px;
}

/* Heading */
.login-title {
    text-align: center;
    color: #3d3200;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 8px;
}

/* Subtitle */
.login-subtitle {
    text-align: center;
    color: #6b6250;
    margin-bottom: 30px;
}

/* Labels */
.form-label {
    color: #3d3200;
    font-weight: 600;
}

/* Inputs */
.form-control {
    min-height: 50px;
    border: 1px solid #e2c65c;
    border-radius: 10px;
    padding: 12px 14px;
}

.form-control:focus {
    border-color: #f4b400;
    box-shadow: 0 0 0 3px rgba(244, 180, 0, 0.18);
}

/* Login button */
.login-btn {
    width: 100%;
    min-height: 50px;
    border: none;
    border-radius: 10px;
    background: #f4b400;
    color: #3d3200;
    font-size: 16px;
    font-weight: 700;
    margin-top: 10px;
    transition: 0.2s;
}

.login-btn:hover {
    background: #d99f00;
    color: #fff;
}

/* Remember me */
.remember-row label {
    color: #6b6250;
    font-size: 14px;
}

/* Signup */
.register-text {
    text-align: center;
    margin-top: 25px;
    color: #6b6250;
}

.register-text a {
    color: #d99f00;
    text-decoration: none;
    font-weight: 600;
}

.register-text a:hover {
    color: #b88600;
    text-decoration: underline;
}

/* Error */
.login-error {
    background: #fff3cd;
    color: #856404;
    border: 1px solid #ffe08a;
    border-radius: 8px;
    padding: 12px;
    margin-bottom: 20px;
    font-size: 14px;
}</style>
</head>

<body>

<div class="student-login-wrapper">

    <div class="student-login-card">

        <div class="login-logo">

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

        <h1 class="login-title">Welcome back</h1>

        <p class="login-subtitle">
            Sign in to your Classroom account
        </p>

        @if ($errors->any())
            <div class="login-error">
                {{ $errors->first() }}
            </div>
        @endif

       <form method="POST" action="{{ route('student.login.submit') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">
                    Email
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    required
                    autofocus
                >
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
                    placeholder="Enter your password"
                    required
                >
            </div>

            <div class="remember-row">
                <input
                    id="remember"
                    type="checkbox"
                    name="remember"
                    value="1"
                >

                <label for="remember">
                    Remember me
                </label>
            </div>

            <button type="submit" class="login-btn">
                Login
            </button>
        </form>

   <div class="register-text">
    Don't have an account?
    <a href="{{ route('student.register') }}">Sign up</a>
</div>

    </div>

</div>

</body>
</html>