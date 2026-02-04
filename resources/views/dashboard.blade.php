{{-- DASHBOARD.BLADE.PHP - VERSION TYPOGRAPHIE AMÉLIORÉE --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tableau de bord - TaskManager</title>

    <!-- Google Fonts pour une typographie élégante -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* TYPOGRAPHIE AMÉLIORÉE */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            line-height: 1.6;
            color: #3E2723;
            background: linear-gradient(135deg, #FAF3E0 0%, #F5E6CA 100%);
            min-height: 100vh;
        }

        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            letter-spacing: -0.02em;
        }

        /* PALETTE DE COULEURS RAFFINÉE */
        :root {
            --beige-light: #FAF3E0;
            --beige-cream: #F5E6CA;
            --beige-warm: #E8D9C5;
            --brown-light: #D7CCC8;
            --brown-medium: #A1887F;
            --brown-dark: #795548;
            --brown-rich: #5D4037;
            --brown-very-dark: #3E2723;
            --accent-gold: #D4AF37;
            --accent-gold-light: #F4D03F;
        }

        /* CLASSES UTILITAIRES */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* HEADER ÉLÉGANT */
        .main-header {
            background: linear-gradient(135deg, var(--brown-very-dark) 0%, var(--brown-rich) 100%);
            color: var(--beige-light);
            padding: 1.25rem 0;
            position: relative;
            overflow: hidden;
        }

        .main-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--accent-gold), var(--accent-gold-light));
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .brand-icon {
            font-size: 1.75rem;
            color: var(--accent-gold);
        }

        .brand-name {
            font-size: 1.5rem;
            font-weight: 600;
            font-family: 'Playfair Display', serif;
            letter-spacing: 0.5px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-name {
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--beige-cream);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logout-btn {
            background: rgba(212, 175, 55, 0.15);
            color: var(--accent-gold);
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: rgba(212, 175, 55, 0.25);
            transform: rotate(15deg);
        }

        /* BANNIÈRE DE BIENVENUE */
        .welcome-banner {
            background: linear-gradient(135deg, var(--brown-rich) 0%, var(--brown-very-dark) 100%);
            border-radius: 20px;
            padding: 3rem;
            margin: 2.5rem 0;
            color: var(--beige-light);
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(93, 64, 55, 0.2);
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.1) 0%, transparent 70%);
        }

        .welcome-content {
            position: relative;
            z-index: 1;
            max-width: 700px;
        }

        .welcome-title {
            font-size: 2.5rem;
            margin-bottom: 0.75rem;
            line-height: 1.2;
        }

        .welcome-subtitle {
            font-size: 1.125rem;
            color: var(--beige-cream);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        /* SECTION TITRES */
        .section-title {
            font-size: 1.75rem;
            color: var(--brown-very-dark);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title-icon {
            color: var(--accent-gold);
            font-size: 1.5rem;
        }

        /* CARTES D'ACTIONS */
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .action-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--beige-warm);
            box-shadow: 0 5px 15px rgba(93, 64, 55, 0.08);
        }

        .action-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(93, 64, 55, 0.15);
            border-color: var(--brown-medium);
        }

        .card-content {
            text-align: center;
        }

        .card-icon {
            font-size: 3rem;
            color: var(--brown-rich);
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .action-card:hover .card-icon {
            transform: scale(1.1);
            color: var(--accent-gold);
        }

        .card-title {
            font-size: 1.375rem;
            color: var(--brown-very-dark);
            margin-bottom: 0.75rem;
        }

        .card-description {
            color: var(--brown-dark);
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }

        .card-arrow {
            color: var(--accent-gold);
            font-size: 1.25rem;
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s ease;
        }

        .action-card:hover .card-arrow {
            opacity: 1;
            transform: translateX(0);
        }

        /* STATISTIQUES */
        .stats-container {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 3rem;
            border: 1px solid var(--beige-warm);
            box-shadow: 0 8px 25px rgba(93, 64, 55, 0.08);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .stat-card {
            background: linear-gradient(135deg, var(--beige-light) 0%, var(--beige-cream) 100%);
            border-radius: 14px;
            padding: 2rem;
            text-align: center;
            border: 1px solid var(--beige-warm);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            border-color: var(--brown-medium);
            box-shadow: 0 10px 25px rgba(93, 64, 55, 0.1);
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--brown-very-dark);
            margin-bottom: 0.5rem;
            font-family: 'Inter', sans-serif;
            line-height: 1;
        }

        .stat-icon {
            font-size: 2rem;
            color: var(--brown-dark);
            margin-bottom: 1rem;
        }

        .stat-label {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--brown-rich);
            letter-spacing: 0.5px;
        }

        /* FOOTER */
        .dashboard-footer {
            background: linear-gradient(135deg, var(--brown-rich) 0%, var(--brown-very-dark) 100%);
            border-radius: 14px;
            padding: 2rem;
            color: var(--beige-light);
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .footer-content {
                flex-direction: row;
                justify-content: space-between;
            }
        }

        .footer-help {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.95rem;
            color: var(--beige-cream);
        }

        .footer-nav {
            display: flex;
            gap: 2rem;
        }

        .footer-nav-link {
            color: var(--beige-light);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.3s ease;
        }

        .footer-nav-link:hover {
            color: var(--accent-gold);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .welcome-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .stat-number {
                font-size: 2.75rem;
            }

            .footer-nav {
                flex-wrap: wrap;
                justify-content: center;
                gap: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
            }

            .welcome-banner {
                padding: 2rem;
            }

            .welcome-title {
                font-size: 1.75rem;
            }

            .action-card, .stat-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="main-header">
        <div class="container header-content">
            <div class="brand">
                <i class="fas fa-tasks brand-icon"></i>
                <span class="brand-name">TaskManager</span>
            </div>

            <div class="user-info">
                <div class="user-name">
                    <i class="fas fa-user-circle"></i>
                    {{ Auth::user()->name }}
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn" title="Déconnexion">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <!-- Welcome Banner -->
        <section class="welcome-banner">
            <div class="welcome-content">
                <h1 class="welcome-title">Bonjour, {{ Auth::user()->name }} !</h1>
                <p class="welcome-subtitle">
                    <i class="fas fa-sparkles"></i>
                    Prêt à booster votre productivité ?
                </p>
            </div>
        </section>

        <!-- Quick Actions -->
        <section>
            <h2 class="section-title">
                <i class="fas fa-bolt section-title-icon"></i>
                Actions rapides
            </h2>

            <div class="actions-grid">
                <!-- Mes Tâches -->
                <a href="{{ route('tasks.index') }}" class="action-card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h3 class="card-title">Mes Tâches</h3>
                        <p class="card-description">Accédez à votre liste complète de tâches et gérez-les efficacement</p>
                        <div class="card-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>

                <!-- Nouvelle Tâche -->
                <a href="{{ route('tasks.create') }}" class="action-card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <h3 class="card-title">Nouvelle Tâche</h3>
                        <p class="card-description">Créez une nouvelle tâche avec des détails précis et une échéance</p>
                        <div class="card-arrow">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </a>

                <!-- Mon Profil -->
                <a href="{{ route('profile.edit') }}" class="action-card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <h3 class="card-title">Mon Profil</h3>
                        <p class="card-description">Gérez vos informations personnelles et paramètres de compte</p>
                        <div class="card-arrow">
                            <i class="fas fa-user-edit"></i>
                        </div>
                    </div>
                </a>
            </div>
        </section>

        <!-- Statistics -->
        @php
            $totalTasks = \App\Models\Task::where('user_id', Auth::id())->count();
            $pendingTasks = \App\Models\Task::where('user_id', Auth::id())->where('completed', false)->count();
            $completedTasks = \App\Models\Task::where('user_id', Auth::id())->where('completed', true)->count();
        @endphp

        <section class="stats-container">
            <h2 class="section-title">
                <i class="fas fa-chart-pie section-title-icon"></i>
                Vos statistiques
            </h2>

            <div class="stats-grid">
                <!-- Total Tasks -->
                <div class="stat-card">
                    <div class="stat-number">{{ $totalTasks }}</div>
                    <div class="stat-icon">
                        <i class="fas fa-list-check"></i>
                    </div>
                    <div class="stat-label">Tâches totales</div>
                </div>

                <!-- Pending Tasks -->
                <div class="stat-card">
                    <div class="stat-number">{{ $pendingTasks }}</div>
                    <div class="stat-icon">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="stat-label">En attente</div>
                </div>

                <!-- Completed Tasks -->
                <div class="stat-card">
                    <div class="stat-number">{{ $completedTasks }}</div>
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-label">Terminées</div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="dashboard-footer">
            <div class="footer-content">
                <div class="footer-help">
                    <i class="fas fa-info-circle"></i>
                    <span>Besoin d'aide ? Consultez notre guide d'utilisation</span>
                </div>

                <nav class="footer-nav">
                    <a href="{{ route('tasks.index') }}" class="footer-nav-link">
                        <i class="fas fa-home"></i>
                        <span>Accueil</span>
                    </a>
                    <a href="{{ route('tasks.create') }}" class="footer-nav-link">
                        <i class="fas fa-plus"></i>
                        <span>Nouvelle tâche</span>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="footer-nav-link">
                        <i class="fas fa-cog"></i>
                        <span>Paramètres</span>
                    </a>
                </nav>
            </div>
        </footer>
    </main>
</body>
</html>
