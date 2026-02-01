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

        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            .hero-bg {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
            .feature-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .feature-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen hero-bg">
            <!-- Navigation -->
            <nav class="bg-white/10 backdrop-blur-md">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">
                        <div class="flex items-center">
                            <div class="shrink-0">
                                <h1 class="text-2xl font-bold text-white">📋 TaskManager</h1>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-white hover:text-gray-200 px-4 py-2 rounded-lg bg-white/20">
                                        Tableau de bord
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="text-white hover:text-gray-200 px-4 py-2 rounded-lg bg-white/20">
                                        Connexion
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-white hover:text-gray-200 px-4 py-2 rounded-lg bg-indigo-600">
                                            Inscription
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Hero Section -->
            <div class="py-20 px-4">
                <div class="max-w-7xl mx-auto text-center">
                    <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                        Gérez vos tâches<br>
                        <span class="text-yellow-300">en toute simplicité</span>
                    </h1>
                    <p class="text-xl text-white/90 mb-10 max-w-3xl mx-auto">
                        L'application ultime pour organiser votre travail, suivre vos progrès et booster votre productivité.
                        Inscrivez-vous gratuitement et commencez dès maintenant !
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                               class="inline-flex items-center justify-center px-8 py-3 text-lg font-medium text-indigo-600 bg-white rounded-lg hover:bg-gray-100 transition duration-300">
                                🚀 Accéder à mon espace
                            </a>
                        @else
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center justify-center px-8 py-3 text-lg font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition duration-300">
                                📝 S'inscrire gratuitement
                            </a>
                            <a href="{{ route('login') }}"
                               class="inline-flex items-center justify-center px-8 py-3 text-lg font-medium text-white bg-transparent border-2 border-white rounded-lg hover:bg-white/10 transition duration-300">
                                🔑 Se connecter
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="py-16 bg-white/10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-bold text-white text-center mb-12">Pourquoi choisir TaskManager ?</h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Feature 1 -->
                        <div class="feature-card bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20">
                            <div class="text-4xl mb-4">✅</div>
                            <h3 class="text-xl font-semibold text-white mb-3">Gestion simple</h3>
                            <p class="text-white/80">
                                Créez, modifiez et organisez vos tâches en quelques clics. Interface intuitive et rapide.
                            </p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="feature-card bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20">
                            <div class="text-4xl mb-4">🔒</div>
                            <h3 class="text-xl font-semibold text-white mb-3">Sécurité totale</h3>
                            <p class="text-white/80">
                                Vos données sont protégées. Chaque utilisateur a son espace personnel sécurisé.
                            </p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="feature-card bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20">
                            <div class="text-4xl mb-4">📊</div>
                            <h3 class="text-xl font-semibold text-white mb-3">Suivi complet</h3>
                            <p class="text-white/80">
                                Marquez vos tâches comme terminées, suivez votre productivité et vos progrès.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-black/30 py-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <p class="text-white/70">
                            © 2024 TaskManager - Projet Laravel. Développé avec ❤️ pour la gestion de tâches.
                        </p>
                        <p class="text-white/60 text-sm mt-2">
                            Technologies : Laravel, Tailwind CSS, MySQL, Alpine.js
                        </p>
                        <div class="mt-4">
                            @auth
                                <a href="{{ route('tasks.index') }}" class="text-white/80 hover:text-white mx-2">Mes Tâches</a> |
                                <a href="{{ route('dashboard') }}" class="text-white/80 hover:text-white mx-2">Tableau de bord</a> |
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-white/80 hover:text-white mx-2">
                                        Déconnexion
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-white/80 hover:text-white mx-2">Connexion</a> |
                                <a href="{{ route('register') }}" class="text-white/80 hover:text-white mx-2">Inscription</a> |
                                <a href="#features" class="text-white/80 hover:text-white mx-2">Fonctionnalités</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Alpine.js -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    </body>
</html>
