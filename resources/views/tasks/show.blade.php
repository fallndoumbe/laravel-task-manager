<x-app-layout>
    <x-slot name="header">
        <style>
            /* STYLE MARRON/BEIGE POUR SHOW */
            .page-container {
                background: linear-gradient(135deg, #FAF3E0 0%, #F5E6CA 100%);
                min-height: 100vh;
                padding: 2rem 1rem;
            }

            .detail-card {
                background: white;
                border-radius: 12px;
                border: 1px solid #E8D9C5;
                box-shadow: 0 4px 12px rgba(93, 64, 55, 0.08);
                max-width: 900px;
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

            .action-buttons {
                display: flex;
                gap: 0.75rem;
            }

            .btn-edit {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.75rem 1.5rem;
                background: #8B4513;
                color: white;
                border-radius: 8px;
                font-weight: 500;
                text-decoration: none;
                transition: background 0.3s;
            }

            .btn-edit:hover {
                background: #654321;
            }

            .btn-back {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.75rem 1.5rem;
                background: white;
                color: #5D4037;
                border: 2px solid #E8D9C5;
                border-radius: 8px;
                font-weight: 500;
                text-decoration: none;
                transition: all 0.3s;
            }

            .btn-back:hover {
                background: #FAF3E0;
                border-color: #8B4513;
            }

            /* CONTENU DE LA TÂCHE */
            .task-content {
                margin-bottom: 2rem;
            }

            .task-title {
                color: #3E2723;
                font-size: 1.75rem;
                font-weight: 600;
                margin-bottom: 1rem;
            }

            .task-title.completed {
                text-decoration: line-through;
                color: #795548;
                opacity: 0.7;
            }

            /* STATUS BADGE */
            .status-badge {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.5rem 1rem;
                border-radius: 999px;
                font-weight: 500;
                font-size: 0.875rem;
                margin-bottom: 1.5rem;
            }

            .status-completed {
                background: #D1FAE5;
                color: #065F46;
                border: 1px solid #A7F3D0;
            }

            .status-pending {
                background: #FEF3C7;
                color: #92400e;
                border: 1px solid #FDE68A;
            }

            /* DESCRIPTION */
            .description-section {
                margin-bottom: 2rem;
            }

            .description-label {
                color: #5D4037;
                font-weight: 600;
                font-size: 1.125rem;
                margin-bottom: 0.75rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .description-box {
                background: #FAF3E0;
                border: 1px solid #E8D9C5;
                border-radius: 8px;
                padding: 1.25rem;
                color: #3E2723;
                line-height: 1.6;
            }

            /* INFOS DATE */
            .info-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1rem;
                margin-bottom: 2rem;
            }

            .info-card {
                background: #FAF3E0;
                border: 1px solid #E8D9C5;
                border-radius: 8px;
                padding: 1.25rem;
            }

            .info-label {
                color: #795548;
                font-size: 0.875rem;
                margin-bottom: 0.25rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .info-value {
                color: #3E2723;
                font-weight: 500;
                font-size: 1rem;
            }

            /* ACTIONS */
            .actions-section {
                padding-top: 1.5rem;
                border-top: 1px solid #F5E6CA;
                display: flex;
                flex-wrap: wrap;
                gap: 0.75rem;
            }

            .action-form {
                display: inline-flex;
            }

            .btn-toggle {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.75rem 1.5rem;
                border: none;
                border-radius: 8px;
                font-weight: 500;
                cursor: pointer;
                transition: background 0.3s;
            }

            .btn-toggle-complete {
                background: #10B981;
                color: white;
            }

            .btn-toggle-complete:hover {
                background: #059669;
            }

            .btn-toggle-undo {
                background: #F59E0B;
                color: white;
            }

            .btn-toggle-undo:hover {
                background: #D97706;
            }

            .btn-delete {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.75rem 1.5rem;
                background: #DC2626;
                color: white;
                border: none;
                border-radius: 8px;
                font-weight: 500;
                cursor: pointer;
                transition: background 0.3s;
            }

            .btn-delete:hover {
                background: #B91C1C;
            }

            /* RESPONSIVE */
            @media (max-width: 768px) {
                .page-container {
                    padding: 1rem;
                }

                .detail-card {
                    padding: 1.5rem;
                }

                .header-section {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 1rem;
                }

                .action-buttons {
                    width: 100%;
                    justify-content: flex-start;
                }

                .actions-section {
                    flex-direction: column;
                }

                .btn-edit, .btn-back, .btn-toggle, .btn-delete {
                    width: 100%;
                    justify-content: center;
                }
            }

            @media (max-width: 480px) {
                .info-grid {
                    grid-template-columns: 1fr;
                }

                .task-title {
                    font-size: 1.5rem;
                }
            }
        </style>

        <div class="header-section">
            <h1 class="page-title">
                <i class="fas fa-file-alt"></i>
                Détails de la tâche
            </h1>
            <div class="action-buttons">
                <a href="{{ route('tasks.edit', $task) }}" class="btn-edit">
                    <i class="fas fa-edit"></i>
                    Modifier
                </a>
                <a href="{{ route('tasks.index') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i>
                    Retour
                </a>
            </div>
        </div>
    </x-slot>

    <div class="page-container">
        <div class="detail-card">
            <div class="task-content">
                <h2 class="task-title {{ $task->completed ? 'completed' : '' }}">
                    {{ $task->title }}
                </h2>

                @if($task->completed)
                    <span class="status-badge status-completed">
                        <i class="fas fa-check-circle"></i>
                        Tâche terminée
                    </span>
                @else
                    <span class="status-badge status-pending">
                        <i class="fas fa-clock"></i>
                        Tâche en cours
                    </span>
                @endif
            </div>

            @if($task->description)
            <div class="description-section">
                <h3 class="description-label">
                    <i class="fas fa-align-left"></i>
                    Description
                </h3>
                <div class="description-box">
                    {{ $task->description }}
                </div>
            </div>
            @endif

            <div class="info-grid">
                <div class="info-card">
                    <p class="info-label">
                        <i class="fas fa-calendar-plus"></i>
                        Créée le
                    </p>
                    <p class="info-value">{{ $task->created_at->format('d/m/Y à H:i') }}</p>
                </div>

                <div class="info-card">
                    <p class="info-label">
                        <i class="fas fa-history"></i>
                        Dernière modification
                    </p>
                    <p class="info-value">{{ $task->updated_at->format('d/m/Y à H:i') }}</p>
                </div>
            </div>

            <div class="actions-section">
                <!-- CORRECTION : utiliser tasks.toggleComplete au lieu de tasks.toggle -->
                <form action="{{ route('tasks.toggleComplete', $task) }}" method="POST" class="action-form">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn-toggle {{ $task->completed ? 'btn-toggle-undo' : 'btn-toggle-complete' }}">
                        @if($task->completed)
                            <i class="fas fa-redo"></i>Marquer comme non terminée
                        @else
                            <i class="fas fa-check"></i>Marquer comme terminée
                        @endif
                    </button>
                </form>

                <!-- Supprimer -->
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="action-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                        <i class="fas fa-trash"></i>Supprimer cette tâche
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
