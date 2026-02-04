<x-app-layout>
    <x-slot name="header">
        <style>
            /* STYLE SIMPLE ET PROPRE */
            .page-container {
                background: linear-gradient(135deg, #FAF3E0 0%, #F5E6CA 100%);
                min-height: 100vh;
                padding: 2rem 1rem;
            }

            .content-card {
                background: white;
                border-radius: 12px;
                border: 1px solid #E8D9C5;
                box-shadow: 0 4px 12px rgba(93, 64, 55, 0.08);
                max-width: 1200px;
                margin: 0 auto;
                padding: 2rem;
            }

            .header-section {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 2rem;
                padding-bottom: 1rem;
                border-bottom: 2px solid #F5E6CA;
            }

            .page-title {
                color: #5D4037;
                font-size: 1.75rem;
                font-weight: 600;
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .btn-new-task {
                background: #8B4513;
                color: white;
                padding: 0.75rem 1.5rem;
                border-radius: 8px;
                font-weight: 500;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                transition: background 0.3s;
            }

            .btn-new-task:hover {
                background: #654321;
            }

            /* TABLEAU SIMPLE */
            .tasks-table {
                width: 100%;
                border-collapse: separate;
                border-spacing: 0;
            }

            .tasks-table th {
                background: #F5E6CA;
                color: #5D4037;
                font-weight: 600;
                padding: 1rem;
                text-align: left;
                border-bottom: 2px solid #E8D9C5;
            }

            .tasks-table td {
                padding: 1rem;
                border-bottom: 1px solid #F5E6CA;
                vertical-align: middle; /* CHANGE: top à middle */
            }

            .tasks-table tr:hover {
                background: #FAF3E0;
            }

            /* STYLE DES TÂCHES */
            .task-title {
                color: #3E2723;
                font-weight: 500;
                margin-bottom: 0.25rem;
            }

            .task-description {
                color: #795548;
                font-size: 0.875rem;
                line-height: 1.4;
            }

            .task-completed {
                text-decoration: line-through;
                opacity: 0.7;
            }

            /* STATUS */
            .status-badge {
                padding: 0.25rem 0.75rem;
                border-radius: 999px;
                font-size: 0.75rem;
                font-weight: 500;
                display: inline-flex;
                align-items: center;
                gap: 0.25rem;
            }

            .status-pending {
                background: #FEF3C7;
                color: #92400e;
            }

            .status-completed {
                background: #D1FAE5;
                color: #065F46;
            }

            /* ACTIONS - MODIFICATION COMPLÈTE POUR ALIGNEMENT */
            .actions-cell {
                min-width: 320px; /* Augmenté pour plus d'espace */
            }

            .action-buttons {
                display: flex;
                gap: 0.5rem;
                flex-wrap: nowrap; /* CHANGE: wrap à nowrap */
                align-items: center;
                justify-content: flex-start; /* Aligne tout à gauche */
                width: 100%;
            }

            /* TOUS LES BOUTONS ONT LE MÊME STYLE DE CONTAINER */
            .action-item {
                display: inline-flex;
                align-items: center;
                margin: 0;
                height: 32px; /* HAUTEUR FIXE POUR TOUS */
            }

            /* LES FORMULAIRES DOIVENT AVOIR LE MÊME STYLE */
            .action-item form {
                display: inline-flex;
                margin: 0;
                height: 100%;
            }

            /* LES LIENS DOIVENT AVOIR LE MÊME STYLE */
            .action-item a {
                display: inline-flex;
                align-items: center;
                height: 100%;
            }

            .action-btn {
                padding: 0.375rem 0.75rem;
                border-radius: 6px;
                font-size: 0.75rem;
                font-weight: 500;
                border: none;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 0.25rem;
                transition: all 0.2s;
                text-decoration: none;
                white-space: nowrap;
                height: 100%; /* PREND TOUTE LA HAUTEUR */
                line-height: 1; /* ÉVITE LES DÉCALAGES */
                box-sizing: border-box; /* INCLUT PADDING DANS LA HAUTEUR */
            }

            /* COULEURS DES BOUTONS */
            .btn-complete {
                background: #10B981;
                color: white;
            }

            .btn-complete:hover {
                background: #059669;
            }

            .btn-redo {
                background: #F59E0B;
                color: white;
            }

            .btn-redo:hover {
                background: #D97706;
            }

            .btn-view {
                background: #D7CCC8;
                color: #5D4037;
            }

            .btn-view:hover {
                background: #A1887F;
                color: white;
            }

            .btn-edit {
                background: #8B4513;
                color: white;
            }

            .btn-edit:hover {
                background: #654321;
            }

            .btn-delete {
                background: #DC2626;
                color: white;
            }

            .btn-delete:hover {
                background: #B91C1C;
            }

            /* MESSAGE VIDE */
            .empty-state {
                text-align: center;
                padding: 3rem;
                color: #795548;
            }

            .empty-icon {
                font-size: 3rem;
                color: #D7CCC8;
                margin-bottom: 1rem;
            }

            /* STATS */
            .stats-container {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 1rem;
                margin-bottom: 2rem;
            }

            .stat-card {
                background: #FAF3E0;
                border: 1px solid #E8D9C5;
                border-radius: 8px;
                padding: 1rem;
                text-align: center;
            }

            .stat-number {
                font-size: 2rem;
                font-weight: 600;
                color: #5D4037;
                margin-bottom: 0.25rem;
            }

            .stat-label {
                font-size: 0.875rem;
                color: #795548;
            }

            /* SUCCESS MESSAGE */
            .alert-success {
                background: #D1FAE5;
                border: 1px solid #A7F3D0;
                color: #065F46;
                padding: 1rem;
                border-radius: 8px;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            /* RESPONSIVE */
            @media (max-width: 768px) {
                .content-card {
                    padding: 1rem;
                }

                .header-section {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 1rem;
                }

                .stats-container {
                    grid-template-columns: 1fr;
                }

                .tasks-table {
                    display: block;
                    overflow-x: auto;
                }

                .actions-cell {
                    min-width: 280px;
                }

                .action-buttons {
                    flex-wrap: wrap; /* Sur mobile, on permet le wrap */
                }

                .action-btn {
                    padding: 0.35rem 0.65rem;
                    font-size: 0.7rem;
                }
            }

            @media (max-width: 480px) {
                .actions-cell {
                    min-width: 200px;
                }

                .action-buttons {
                    gap: 0.25rem;
                }

                .action-btn {
                    padding: 0.3rem 0.5rem;
                    font-size: 0.65rem;
                }
            }
        </style>

        <div class="header-section">
            <div>
                <h1 class="page-title">
                    <i class="fas fa-tasks"></i>
                    Mes Tâches
                </h1>
                <p style="color: #795548; font-size: 0.875rem; margin-top: 0.25rem;">
                    Gestion complète de vos tâches
                </p>
            </div>
            <a href="{{ route('tasks.create') }}" class="btn-new-task">
                <i class="fas fa-plus"></i>
                Nouvelle tâche
            </a>
        </div>
    </x-slot>

    <div class="page-container">
        <div class="content-card">
            @if(session('success'))
                <div class="alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Statistiques -->
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-number">{{ $tasks->count() }}</div>
                    <div class="stat-label">Tâches totales</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $tasks->where('completed', false)->count() }}</div>
                    <div class="stat-label">En cours</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $tasks->where('completed', true)->count() }}</div>
                    <div class="stat-label">Terminées</div>
                </div>
            </div>

            @if($tasks->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <h3 style="color: #5D4037; margin-bottom: 0.5rem;">Aucune tâche</h3>
                    <p style="margin-bottom: 1.5rem;">Commencez par créer votre première tâche</p>
                    <a href="{{ route('tasks.create') }}" class="btn-new-task">
                        <i class="fas fa-plus"></i>
                        Créer une tâche
                    </a>
                </div>
            @else
                <table class="tasks-table">
                    <thead>
                        <tr>
                            <th>Tâche</th>
                            <th>Statut</th>
                            <th>Créée le</th>
                            <th class="actions-cell">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td>
                                <div class="task-title {{ $task->completed ? 'task-completed' : '' }}">
                                    {{ $task->title }}
                                </div>
                                @if($task->description)
                                    <div class="task-description">
                                        {{ Str::limit($task->description, 100) }}
                                    </div>
                                @endif
                            </td>

                            <td>
                                @if($task->completed)
                                    <span class="status-badge status-completed">
                                        <i class="fas fa-check-circle"></i>
                                        Terminée
                                    </span>
                                @else
                                    <span class="status-badge status-pending">
                                        <i class="fas fa-clock"></i>
                                        En cours
                                    </span>
                                @endif
                            </td>

                            <td style="color: #795548;">
                                {{ $task->created_at->format('d/m/Y') }}
                            </td>

                            <td class="actions-cell">
                                <div class="action-buttons">
                                    <!-- Terminer/Refaire -->
                                    <div class="action-item">
                                        <form action="{{ route('tasks.toggleComplete', $task) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="action-btn {{ $task->completed ? 'btn-redo' : 'btn-complete' }}">
                                                @if($task->completed)
                                                    <i class="fas fa-redo"></i> Refaire
                                                @else
                                                    <i class="fas fa-check"></i> Terminer
                                                @endif
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Voir -->
                                    <div class="action-item">
                                        <a href="{{ route('tasks.show', $task) }}" class="action-btn btn-view">
                                            <i class="fas fa-eye"></i> Voir
                                        </a>
                                    </div>

                                    <!-- Modifier -->
                                    <div class="action-item">
                                        <a href="{{ route('tasks.edit', $task) }}" class="action-btn btn-edit">
                                            <i class="fas fa-edit"></i> Modifier
                                        </a>
                                    </div>

                                    <!-- Supprimer -->
                                    <div class="action-item">
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                              onsubmit="return confirm('Supprimer cette tâche ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn btn-delete">
                                                <i class="fas fa-trash"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Total -->
                <div style="margin-top: 2rem; padding-top: 1rem; border-top: 1px solid #F5E6CA; color: #795548; font-size: 0.875rem;">
                    <i class="fas fa-info-circle"></i>
                    Total : {{ $tasks->count() }} tâche(s)
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
