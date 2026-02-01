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
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                📋 Détails de la tâche
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('tasks.edit', $task) }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    ✏️ Modifier
                </a>
                <a href="{{ route('tasks.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                    ↩️ Retour
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold @if($task->completed) line-through text-gray-500 @endif">
                            {{ $task->title }}
                        </h3>

                        @if($task->completed)
                            <span class="mt-2 px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                ✅ Tâche terminée
                            </span>
                        @else
                            <span class="mt-2 px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                ⏳ Tâche en cours
                            </span>
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
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-700 mb-2">Description :</h4>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-gray-800">{{ $task->description }}</p>
                        </div>
                    </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-500">Créée le</p>
                            <p class="font-medium">{{ $task->created_at->format('d/m/Y à H:i') }}</p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-500">Dernière modification</p>
                            <p class="font-medium">{{ $task->updated_at->format('d/m/Y à H:i') }}</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-200">
                        <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm @if($task->completed) bg-yellow-600 hover:bg-yellow-700 @else bg-green-600 hover:bg-green-700 @endif text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
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
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm bg-red-600 hover:bg-red-700 text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
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
@endsection
</x-app-layout>
