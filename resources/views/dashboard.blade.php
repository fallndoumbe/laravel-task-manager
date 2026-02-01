{{-- DASHBOARD.BLADE.PHP - VERSION CORRIGÉE --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    🚀 Tableau de bord
                </h2>
                <p class="text-sm text-gray-600 mt-1">Gérez votre productivité en un seul endroit</p>
            </div>
            <div class="text-sm text-gray-500">
                {{ now()->format('d/m/Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Bannière de bienvenue SIMPLIFIÉE -->
            <div class="mb-10 p-8 bg-gradient-to-r from-indigo-600 to-purple-700 rounded-3xl shadow-2xl text-white">
                <div class="flex items-center">
                    <div class="text-5xl mr-4">👋</div>
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold">Bonjour, {{ Auth::user()->name }} !</h1>
                        <p class="text-indigo-100 mt-2 text-lg">Gérez vos tâches efficacement</p>
                    </div>
                </div>
            </div>

            <!-- Actions rapides SIMPLIFIÉES -->
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Actions rapides</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Action 1 -->
                    <a href="{{ route('tasks.index') }}"
                       class="bg-white rounded-2xl shadow-lg p-8 border border-indigo-100 hover:shadow-xl transition">
                        <div class="flex flex-col items-center text-center">
                            <div class="text-4xl mb-4">📋</div>
                            <h4 class="text-xl font-bold text-gray-800 mb-3">Mes Tâches</h4>
                            <p class="text-gray-600">Gérez votre liste de tâches</p>
                        </div>
                    </a>

                    <!-- Action 2 -->
                    <a href="{{ route('tasks.create') }}"
                       class="bg-white rounded-2xl shadow-lg p-8 border border-green-100 hover:shadow-xl transition">
                        <div class="flex flex-col items-center text-center">
                            <div class="text-4xl mb-4">➕</div>
                            <h4 class="text-xl font-bold text-gray-800 mb-3">Nouvelle Tâche</h4>
                            <p class="text-gray-600">Créez une nouvelle tâche</p>
                        </div>
                    </a>

                    <!-- Action 3 -->
                    <a href="{{ route('profile.edit') }}"
                       class="bg-white rounded-2xl shadow-lg p-8 border border-purple-100 hover:shadow-xl transition">
                        <div class="flex flex-col items-center text-center">
                            <div class="text-4xl mb-4">👤</div>
                            <h4 class="text-xl font-bold text-gray-800 mb-3">Mon Profil</h4>
                            <p class="text-gray-600">Modifiez vos informations</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Statistiques SIMPLIFIÉES -->
            @php
                $totalTasks = \App\Models\Task::where('user_id', Auth::id())->count();
                $pendingTasks = \App\Models\Task::where('user_id', Auth::id())->where('completed', false)->count();
                $completedTasks = \App\Models\Task::where('user_id', Auth::id())->where('completed', true)->count();
            @endphp

            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">📊 Statistiques</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center p-6 bg-blue-50 rounded-xl">
                        <div class="text-3xl font-bold text-blue-600">{{ $totalTasks }}</div>
                        <div class="text-gray-600">Tâches totales</div>
                    </div>
                    <div class="text-center p-6 bg-yellow-50 rounded-xl">
                        <div class="text-3xl font-bold text-yellow-600">{{ $pendingTasks }}</div>
                        <div class="text-gray-600">En attente</div>
                    </div>
                    <div class="text-center p-6 bg-green-50 rounded-xl">
                        <div class="text-3xl font-bold text-green-600">{{ $completedTasks }}</div>
                        <div class="text-gray-600">Terminées</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
