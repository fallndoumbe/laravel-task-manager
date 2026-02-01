<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ✏️ Modifier la tâche
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('tasks.update', $task) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Titre *')" />
                            <x-text-input id="title" class="block mt-1 w-full"
                                          type="text" name="title" :value="old('title', $task->title)" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description"
                                      class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                      rows="4">{{ old('description', $task->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="completed" value="1"
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                       {{ $task->completed ? 'checked' : '' }}>
                                <span class="ms-2 text-sm text-gray-600">
                                    Tâche terminée
                                </span>
                            </label>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <div>
                                <x-secondary-link :href="route('tasks.index')">
                                    ↩️ Annuler
                                </x-secondary-link>
                                <x-secondary-link :href="route('tasks.show', $task)" class="ms-3">
                                    👁️ Voir les détails
                                </x-secondary-link>
                            </div>

                            <div class="flex space-x-3">
                                <x-primary-button>
                                    💾 Enregistrer les modifications
                                </x-primary-button>
                            </div>
                        </div>
                    </form>

                    <!-- Option de suppression -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <p class="text-sm text-gray-600 mb-3">
                            Supprimer définitivement cette tâche ?
                        </p>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ? Cette action est irréversible.')">
                            @csrf
                            @method('DELETE')
                            <x-danger-button type="submit">
                                🗑️ Supprimer cette tâche
                            </x-danger-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
