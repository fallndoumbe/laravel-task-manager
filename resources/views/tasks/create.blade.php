<x-app-layout>
    <x-slot name="header">
        <style>
            /* STYLE MARRON/BEIGE */
            .page-container {
                background: linear-gradient(135deg, #FAF3E0 0%, #F5E6CA 100%);
                min-height: 100vh;
                padding: 2rem 1rem;
            }

            .form-card {
                background: white;
                border-radius: 12px;
                border: 1px solid #E8D9C5;
                box-shadow: 0 4px 12px rgba(93, 64, 55, 0.08);
                max-width: 800px;
                margin: 0 auto;
                padding: 2rem;
            }

            .form-title {
                color: #5D4037;
                font-size: 1.75rem;
                font-weight: 600;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
                gap: 0.75rem;
                padding-bottom: 1rem;
                border-bottom: 2px solid #F5E6CA;
            }

            .form-group {
                margin-bottom: 1.5rem;
            }

            .form-label {
                display: block;
                color: #5D4037;
                font-weight: 600;
                margin-bottom: 0.5rem;
                font-size: 0.95rem;
            }

            .required::after {
                content: " *";
                color: #DC2626;
            }

            .form-input {
                width: 100%;
                padding: 0.75rem 1rem;
                border: 2px solid #E8D9C5;
                border-radius: 8px;
                font-size: 1rem;
                color: #3E2723;
                background: white;
                transition: all 0.3s ease;
                font-family: inherit;
            }

            .form-input:focus {
                outline: none;
                border-color: #8B4513;
                box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
            }

            .form-textarea {
                width: 100%;
                padding: 0.75rem 1rem;
                border: 2px solid #E8D9C5;
                border-radius: 8px;
                font-size: 1rem;
                color: #3E2723;
                background: white;
                transition: all 0.3s ease;
                font-family: inherit;
                resize: vertical;
                min-height: 120px;
                line-height: 1.5;
            }

            .form-textarea:focus {
                outline: none;
                border-color: #8B4513;
                box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
            }

            .error-message {
                color: #DC2626;
                font-size: 0.875rem;
                margin-top: 0.5rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .form-actions {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 2rem;
                padding-top: 1.5rem;
                border-top: 1px solid #F5E6CA;
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
                transition: all 0.3s ease;
            }

            .btn-back:hover {
                background: #FAF3E0;
                border-color: #8B4513;
            }

            .btn-submit {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.75rem 1.5rem;
                background: #8B4513;
                color: white;
                border: none;
                border-radius: 8px;
                font-weight: 500;
                cursor: pointer;
                transition: background 0.3s ease;
            }

            .btn-submit:hover {
                background: #654321;
            }

            .form-help {
                color: #795548;
                font-size: 0.875rem;
                margin-top: 0.5rem;
                opacity: 0.8;
            }

            /* RESPONSIVE */
            @media (max-width: 768px) {
                .page-container {
                    padding: 1rem;
                }

                .form-card {
                    padding: 1.5rem;
                }

                .form-title {
                    font-size: 1.5rem;
                }

                .form-actions {
                    flex-direction: column;
                    gap: 1rem;
                }

                .btn-back, .btn-submit {
                    width: 100%;
                    justify-content: center;
                }
            }
        </style>

        <div class="header-section">
            <h1 class="form-title">
                <i class="fas fa-plus-circle"></i>
                Créer une nouvelle tâche
            </h1>
        </div>
    </x-slot>

    <div class="page-container">
        <div class="form-card">
            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf

                <!-- Titre -->
                <div class="form-group">
                    <label for="title" class="form-label required">
                        <i class="fas fa-heading mr-1"></i>
                        Titre de la tâche
                    </label>
                    <input
                        id="title"
                        class="form-input"
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        placeholder="Entrez le titre de votre tâche"
                        maxlength="200"
                    />
                    <div class="form-help">
                        <i class="fas fa-info-circle mr-1"></i>
                        Maximum 200 caractères
                    </div>
                    @if ($errors->has('title'))
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description" class="form-label">
                        <i class="fas fa-align-left mr-1"></i>
                        Description
                    </label>
                    <textarea
                        id="description"
                        name="description"
                        class="form-textarea"
                        placeholder="Décrivez votre tâche (optionnel)"
                        rows="6"
                        maxlength="1000"
                    >{{ old('description') }}</textarea>
                    <div class="form-help">
                        <i class="fas fa-info-circle mr-1"></i>
                        Maximum 1000 caractères. Ajoutez des détails pour mieux organiser votre travail.
                    </div>
                    @if ($errors->has('description'))
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <a href="{{ route('tasks.index') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i>
                        Retour à la liste
                    </a>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i>
                        Enregistrer la tâche
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
