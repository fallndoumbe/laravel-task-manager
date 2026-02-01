@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">📋 Détails de la tâche</h5>
                    <div class="btn-group">
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm">
                            ✏️ Modifier
                        </a>
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm">
                            ↩️ Retour
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="mb-4">
                        <h4 class="card-title @if($task->completed) text-decoration-line-through text-muted @endif">
                            {{ $task->title }}
                        </h4>

                        @if($task->completed)
                            <span class="badge bg-success">✅ Terminée</span>
                        @else
                            <span class="badge bg-warning">⏳ En cours</span>
                        @endif
                    </div>

                    @if($task->description)
                    <div class="mb-4">
                        <h6 class="text-muted">Description :</h6>
                        <p class="card-text p-3 bg-light rounded">{{ $task->description }}</p>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>📅 Créée le :</strong><br>
                            {{ $task->created_at->format('d/m/Y à H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>🔄 Modifiée le :</strong><br>
                            {{ $task->updated_at->format('d/m/Y à H:i') }}</p>
                        </div>
                    </div>

                    <div class="mt-4 border-top pt-3">
                        <div class="btn-group">
                            <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="me-2">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn @if($task->completed) btn-warning @else btn-success @endif">
                                    @if($task->completed)
                                        🔄 Marquer comme non terminée
                                    @else
                                        ✅ Marquer comme terminée
                                    @endif
                                </button>
                            </form>

                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                                    🗑️ Supprimer cette tâche
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
