<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Connexion</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: #F5DEB3; /* Wheat - Beige clair */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 480px;
        }

        .login-card {
            background: rgba(255, 248, 220, 0.95); /* Cornsilk */
            border-radius: 16px;
            border: 2px solid #D2B48C; /* Tan */
            box-shadow: 0 20px 40px rgba(139, 69, 19, 0.15);
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #A0522D, #8B4513);
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-icon {
            font-size: 48px;
            color: #8B4513; /* SaddleBrown */
            margin-bottom: 16px;
        }

        .login-title {
            color: #654321; /* Dark Brown */
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: #A0522D; /* Sienna */
            font-size: 16px;
            opacity: 0.8;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            color: #8B4513; /* SaddleBrown */
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #A0522D; /* Sienna */
            font-size: 18px;
        }

        .form-input {
            width: 100%;
            padding: 16px 16px 16px 52px;
            border: 2px solid #D2B48C; /* Tan */
            border-radius: 10px;
            font-size: 16px;
            color: #654321; /* Dark Brown */
            background: white;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-input:focus {
            outline: none;
            border-color: #A0522D; /* Sienna */
            box-shadow: 0 0 0 4px rgba(160, 82, 45, 0.1);
        }

        .form-input::placeholder {
            color: #A0522D; /* Sienna */
            opacity: 0.5;
        }

        .error-message {
            color: #DC2626;
            font-size: 14px;
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .remember-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid #D2B48C; /* Tan */
            border-radius: 4px;
            appearance: none;
            cursor: pointer;
            position: relative;
        }

        .checkbox:checked {
            background-color: #A0522D; /* Sienna */
            border-color: #A0522D;
        }

        .checkbox:checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 14px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .checkbox-label {
            color: #654321; /* Dark Brown */
            font-size: 14px;
            cursor: pointer;
        }

        .forgot-link {
            color: #A0522D; /* Sienna */
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #8B4513; /* SaddleBrown */
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            background: linear-gradient(135deg, #A0522D, #8B4513);
            color: white;
            padding: 18px;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 32px;
        }

        .login-button:hover {
            background: linear-gradient(135deg, #8B4513, #654321);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(139, 69, 19, 0.2);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .register-section {
            text-align: center;
            padding-top: 24px;
            border-top: 1px solid #D2B48C; /* Tan */
        }

        .register-text {
            color: #654321; /* Dark Brown */
            font-size: 16px;
            margin-bottom: 16px;
        }

        .register-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: white;
            color: #A0522D; /* Sienna */
            padding: 14px 28px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            border: 2px solid #D2B48C; /* Tan */
            transition: all 0.3s ease;
        }

        .register-link:hover {
            background: #F5DEB3; /* Wheat */
            border-color: #A0522D;
            color: #8B4513;
            transform: translateY(-2px);
        }

        .status-message {
            background: rgba(160, 82, 45, 0.1);
            border: 1px solid #A0522D;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 24px;
            color: #654321;
            text-align: center;
        }

        @media (max-width: 640px) {
            .login-card {
                padding: 30px 24px;
            }

            .login-title {
                font-size: 28px;
            }

            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Session Status -->
            @if (session('status'))
                <div class="status-message">
                    <i class="fas fa-info-circle mr-2"></i>
                    {{ session('status') }}
                </div>
            @endif

            <div class="login-header">
                <div class="login-icon">
                    <i class="fas fa-sign-in-alt"></i>
                </div>
                <h1 class="login-title">Connexion</h1>
                <p class="login-subtitle">Accédez à votre espace TaskManager</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope mr-2"></i>
                        Adresse Email
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input
                            id="email"
                            class="form-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="votre@email.com"
                        />
                    </div>
                    @if ($errors->has('email'))
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock mr-2"></i>
                        Mot de passe
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input
                            id="password"
                            class="form-input"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Votre mot de passe"
                        />
                    </div>
                    @if ($errors->has('password'))
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="remember-forgot">
                    <div class="remember-group">
                        <input id="remember_me" type="checkbox" class="checkbox" name="remember">
                        <label for="remember_me" class="checkbox-label">
                            <i class="fas fa-history mr-2"></i>
                            Se souvenir de moi
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            <i class="fas fa-key mr-2"></i>
                            Mot de passe oublié ?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit" class="login-button">
                    <i class="fas fa-sign-in-alt"></i>
                    Se connecter
                </button>
            </form>

            <!-- Register Link -->
            <div class="register-section">
                <p class="register-text">
                    <i class="fas fa-user mr-2"></i>
                    Pas encore de compte ?
                </p>
                <a href="{{ route('register') }}" class="register-link">
                    <i class="fas fa-user-plus"></i>
                    Créer un compte
                </a>
            </div>
        </div>
    </div>
</body>
</html>
