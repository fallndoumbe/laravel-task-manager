<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                📝 Mes Tâches
            </h2>
            <a href="{{ route('tasks.create') }}"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                ➕ Nouvelle tâche
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if($tasks->isEmpty())
                <div class="bg-white shadow-sm sm:rounded-lg p-12 text-center">
                    <div class="text-5xl mb-4">📋</div>
                    <h3 class="text-xl font-semibold mb-2">Aucune tâche pour le moment</h3>
                    <p class="text-gray-600 mb-6">Commencez par créer votre première tâche !</p>
                    <a href="{{ route('tasks.create') }}"
                       class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                        Créer ma première tâche
                    </a>
                </div>
            @else
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tâche</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Créée le</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @foreach($tasks as $task)
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="font-medium {{ $task->completed ? 'line-through text-gray-500' : '' }}">
                                            {{ $task->title }}
                                        </div>
                                        @if($task->description)
                                            <div class="text-sm text-gray-500">
                                                {{ Str::limit($task->description, 50) }}
                                            </div>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3">
                                        @if($task->completed)
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">
                                                ✅ Terminée
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded-full">
                                                ⏳ En cours
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 text-sm text-gray-500">
                                        {{ $task->created_at->format('d/m/Y') }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">

                                            {{-- TERMINER / REFAIRE --}}
                                            <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="px-3 py-1 text-xs rounded
                                                    {{ $task->completed ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                                    {{ $task->completed ? '🔄 Refaire' : '✅ Terminer' }}
                                                </button>
                                            </form>

                                            {{-- VOIR --}}
                                            <a href="{{ route('tasks.show', $task) }}"
                                               class="px-3 py-1 text-xs bg-gray-100 rounded">
                                                👁️ Voir
                                            </a>

                                            {{-- MODIFIER --}}
                                            <a href="{{ route('tasks.edit', $task) }}"
                                               class="px-3 py-1 text-xs bg-indigo-600 text-white rounded">
                                                ✏️ Modifier
                                            </a>

                                            {{-- SUPPRIMER --}}
                                            <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                                  onsubmit="return confirm('Voulez-vous vraiment supprimer cette tâche ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 text-xs bg-red-600 text-white rounded hover:bg-red-700">
                                                    🗑️ Supprimer
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4 text-sm text-gray-500">
                            Total : {{ $tasks->count() }} tâche(s)
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
