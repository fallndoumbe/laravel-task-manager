@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mes Tâches</div>

                <div class="card-body">
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">
                        + Nouvelle Tâche
                    </a>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($tasks->isEmpty())
                        <p>Vous n'avez pas encore de tâches.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>
                                        @if($task->completed)
                                            <span class="badge bg-success">Terminée</span>
                                        @else
                                            <span class="badge bg-warning">En cours</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-info">
                                                {{ $task->completed ? 'Marquer non terminée' : 'Marquer terminée' }}
                                            </button>
                                        </form>

                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary">Modifier</a>

                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Supprimer cette tâche ?')">
                                                Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
