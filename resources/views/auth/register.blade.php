<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inscription - TaskManager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* ARRIÈRE-PLAN BEIGE SUR TOUTE LA PAGE */
        body {
            background: #F5DEB3; /* Beige clair */
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* CENTRER LE FORMULAIRE */
        .page-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 15px;
            box-sizing: border-box;
        }

        /* CARTE AVEC WIDTH FIXE */
        .register-card {
            background: rgba(255, 248, 220, 0.98);
            border-radius: 8px;
            border: 1px solid #D2B48C;
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.1);
            width: 100%;
            max-width: 360px; /* Largeur fixe */
            padding: 20px;
            box-sizing: border-box; /* Important pour inclure padding dans width */
        }

        /* TITRE */
        .register-title {
            color: #654321;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        /* CHAMPS - WIDTH 100% MAIS AVEC BOX-SIZING */
        .form-group {
            margin-bottom: 12px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-label {
            color: #8B4513;
            font-weight: 600;
            font-size: 12px;
            margin-bottom: 4px;
            display: block;
        }

        .input-wrapper {
            position: relative;
            width: 100%;
            box-sizing: border-box;
        }

        .input-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #A0522D;
            font-size: 13px;
            z-index: 1;
        }

        /* INPUT - WIDTH 100% MAIS SANS DÉBORDER */
        .form-input {
            width: 100%;
            padding: 8px 8px 8px 32px;
            border: 1px solid #D2B48C;
            border-radius: 4px;
            font-size: 13px;
            color: #654321;
            background: white;
            transition: all 0.2s;
            box-sizing: border-box; /* TRÈS IMPORTANT */
            display: block;
        }

        .form-input:focus {
            outline: none;
            border-color: #A0522D;
            box-shadow: 0 0 0 1px rgba(160, 82, 45, 0.2);
        }

        .form-input::placeholder {
            color: #A1887F;
            opacity: 0.7;
            font-size: 12px;
        }

        /* ERREURS */
        .error-message {
            color: #DC2626;
            font-size: 11px;
            margin-top: 3px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* BOUTON */
        .btn-primary {
            background: #A0522D;
            color: white;
            padding: 9px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: background 0.2s;
            box-sizing: border-box;
        }

        .btn-primary:hover {
            background: #8B4513;
        }

        /* LIEN CONNEXION */
        .login-section {
            text-align: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #D2B48C;
            width: 100%;
            box-sizing: border-box;
        }

        .login-text {
            color: #654321;
            font-size: 12px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .login-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            background: white;
            color: #A0522D;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 500;
            border: 1px solid #D2B48C;
            transition: all 0.2s;
            box-sizing: border-box;
        }

        .login-link:hover {
            background: #F5DEB3;
            border-color: #A0522D;
            color: #8B4513;
        }

        /* MESSAGE DE STATUS */
        .status-message {
            background: rgba(160, 82, 45, 0.1);
            border: 1px solid #A0522D;
            border-radius: 4px;
            padding: 8px;
            margin-bottom: 12px;
            color: #654321;
            text-align: center;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            width: 100%;
            box-sizing: border-box;
        }

        /* GARANTIR QUE RIEN NE DÉBORDE */
        * {
            box-sizing: border-box;
        }

        form {
            width: 100%;
            box-sizing: border-box;
        }

        /* RESPONSIVE */
        @media (max-width: 480px) {
            .page-wrapper {
                padding: 10px;
            }

            .register-card {
                padding: 18px 15px;
                max-width: 100%;
                width: 100%;
            }

            .register-title {
                font-size: 18px;
            }

            .form-input {
                padding: 7px 7px 7px 30px;
                font-size: 12px;
            }
        }

        @media (max-width: 380px) {
            .register-card {
                padding: 15px 12px;
            }

            .register-title {
                font-size: 16px;
            }

            .form-input {
                padding: 6px 6px 6px 28px;
            }
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="register-card">
            <!-- Session Status -->
            @if (session('status'))
                <div class="status-message">
                    <i class="fas fa-info-circle"></i>
                    {{ session('status') }}
                </div>
            @endif

            <h2 class="register-title">
                <i class="fas fa-user-plus"></i>
                Inscription
            </h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-user mr-1"></i>
                        Nom
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input
                            id="name"
                            class="form-input"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Votre nom"
                        />
                    </div>
                    @if ($errors->has('name'))
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope mr-1"></i>
                        Email
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
                            autocomplete="email"
                            placeholder="exemple@email.com"
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
                        <i class="fas fa-lock mr-1"></i>
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
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                    </div>
                    @if ($errors->has('password'))
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        <i class="fas fa-lock mr-1"></i>
                        Confirmation
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input
                            id="password_confirmation"
                            class="form-input"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    @endif
                </div>

                <!-- Register Button -->
                <button type="submit" class="btn-primary">
                    <i class="fas fa-user-plus"></i>
                    S'inscrire
                </button>
            </form>

            <!-- Login Link -->
            <div class="login-section">
                <p class="login-text">
                    <i class="fas fa-sign-in-alt"></i>
                    Déjà un compte ?
                </p>
                <a href="{{ route('login') }}" class="login-link">
                    <i class="fas fa-sign-in-alt"></i>
                    Se connecter
                </a>
            </div>
        </div>
    </div>
</body>
</html>
