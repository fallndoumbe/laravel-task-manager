<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Task Manager - Gestionnaire de Tâches</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            .nav-bg {
                background: #8B4513; /* SaddleBrown */
            }
            .hero-bg {
                background: #D2B48C; /* Tan */
            }
            .features-bg {
                background: #F5DEB3; /* Wheat */
            }
            .footer-bg {
                background: #654321; /* Dark Brown */
            }
            .feature-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                background: rgba(255, 248, 220, 0.8); /* Cornsilk avec transparence */
            }
            .feature-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(139, 69, 19, 0.2);
            }
            .btn-primary {
                background: #A0522D; /* Sienna */
            }
            .btn-primary:hover {
                background: #8B4513; /* SaddleBrown */
            }
            .btn-secondary {
                background: transparent;
                border: 2px solid #8B4513;
            }
            .btn-secondary:hover {
                background: rgba(139, 69, 19, 0.1);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <!-- Navigation - Marron foncé -->
        <nav class="nav-bg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <div class="shrink-0 flex items-center">
                            <i class="fas fa-tasks text-2xl text-beige-100 mr-3"></i>
                            <h1 class="text-2xl font-bold text-beige-100"> TaskManager</h1>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-beige-100 hover:text-white px-4 py-2 rounded-lg bg-beige-100/20 flex items-center hover:bg-beige-100/30 transition">
                                    <i class="fas fa-tachometer-alt mr-2"></i>
                                    Tableau de bord
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-beige-100 hover:text-white px-4 py-2 rounded-lg bg-beige-100/20 flex items-center hover:bg-beige-100/30 transition">
                                    <i class="fas fa-sign-in-alt mr-2"></i>
                                    Connexion
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-beige-100 hover:text-white px-4 py-2 rounded-lg btn-primary flex items-center hover:shadow-lg transition">
                                        <i class="fas fa-user-plus mr-2"></i>
                                        Inscription
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section - Beige -->
        <div class="min-h-[60vh] hero-bg">
            <div class="py-20 px-4">
                <div class="max-w-7xl mx-auto text-center">
                    <div class="mb-8">
                        <i class="fas fa-tasks text-7xl text-brown-800 opacity-90 mb-4"></i>
                    </div>
                    <h1 class="text-5xl md:text-6xl font-bold text-brown-900 mb-6">
                        Gérez vos tâches<br>
                        <span class="text-brown-700 flex items-center justify-center">
                            <i class="fas fa-rocket mr-4"></i> avec sérénité
                        </span>
                    </h1>
                    <p class="text-xl text-brown-800 mb-10 max-w-3xl mx-auto">
                        <i class="fas fa-check-circle text-brown-700 mr-2"></i>
                        L'application ultime pour organiser votre travail, suivre vos progrès et booster votre productivité.
                        Inscrivez-vous gratuitement et commencez dès maintenant !
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                               class="inline-flex items-center justify-center px-8 py-3 text-lg font-medium text-beige-100 bg-brown-800 rounded-lg hover:bg-brown-900 transition duration-300 shadow-md">
                                <i class="fas fa-arrow-right mr-2"></i>
                                 Accéder à mon espace
                            </a>
                        @else
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center justify-center px-8 py-3 text-lg font-medium text-beige-100 btn-primary rounded-lg hover:shadow-lg transition duration-300 shadow-md">
                                <i class="fas fa-user-plus mr-2"></i>
                                 S'inscrire gratuitement
                            </a>
                            <a href="{{ route('login') }}"
                               class="inline-flex items-center justify-center px-8 py-3 text-lg font-medium text-brown-800 btn-secondary rounded-lg hover:bg-brown-800/10 transition duration-300">
                                <i class="fas fa-key mr-2"></i> Se connecter
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section - Beige clair -->
        <div class="features-bg">
            <div class="py-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-bold text-brown-900 text-center mb-12">
                        <i class="fas fa-star text-brown-700 mr-3"></i>
                        Pourquoi choisir TaskManager ?
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Feature 1 -->
                        <div class="feature-card p-6 rounded-xl border border-brown-300">
                            <div class="text-4xl mb-4">
                                <i class="fas fa-bolt text-brown-700"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-brown-900 mb-3">Rapide & Simple</h3>
                            <p class="text-brown-800">
                                <i class="fas fa-check text-brown-600 mr-1"></i>
                                Interface simple pour créer et organiser vos tâches en quelques clics.
                            </p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="feature-card p-6 rounded-xl border border-brown-300">
                            <div class="text-4xl mb-4">
                                <i class="fas fa-shield-alt text-brown-700"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-brown-900 mb-3">Sécurisé</h3>
                            <p class="text-brown-800">
                                <i class="fas fa-lock text-brown-600 mr-1"></i>
                                Vos données sont protégées. Espace personnel sécurisé.
                            </p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="feature-card p-6 rounded-xl border border-brown-300">
                            <div class="text-4xl mb-4">
                                <i class="fas fa-chart-line text-brown-700"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-brown-900 mb-3">Analytique</h3>
                            <p class="text-brown-800">
                                <i class="fas fa-chart-bar text-brown-600 mr-1"></i>
                                Suivez votre productivité avec des statistiques détaillées.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer - Marron très foncé -->
        <footer class="footer-bg">
            <div class="py-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <div class="mb-4">
                            <i class="fas fa-tasks text-3xl text-beige-200 mb-2"></i>
                            <p class="text-beige-200">
                                © 2026 TaskManager - Projet Laravel. Développé avec
                                <i class="fas fa-heart text-beige-300 mx-1"></i>
                                pour la gestion de tâches.
                            </p>
                        </div>
                        <p class="text-beige-300 text-sm mt-2">
                            <i class="fas fa-code mr-1"></i>
                            Technologies : Laravel, Tailwind CSS, MySQL
                        </p>
                        <div class="mt-6 flex flex-wrap justify-center gap-4">
                            @auth
                                <a href="{{ route('tasks.index') }}" class="text-beige-300 hover:text-beige-100 flex items-center transition">
                                    <i class="fas fa-tasks mr-2"></i> Mes Tâches
                                </a>
                                <span class="text-beige-400">|</span>
                                <a href="{{ route('dashboard') }}" class="text-beige-300 hover:text-beige-100 flex items-center transition">
                                    <i class="fas fa-tachometer-alt mr-2"></i> Tableau de bord
                                </a>
                                <span class="text-beige-400">|</span>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-beige-300 hover:text-beige-100 flex items-center transition">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-beige-300 hover:text-beige-100 flex items-center transition">
                                    <i class="fas fa-sign-in-alt mr-2"></i> Connexion
                                </a>
                                <span class="text-beige-400">|</span>
                                <a href="{{ route('register') }}" class="text-beige-300 hover:text-beige-100 flex items-center transition">
                                    <i class="fas fa-user-plus mr-2"></i> Inscription
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
