<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            👤 {{ __('Mon Profil Personnel') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Carte 1 avec style amélioré -->
            <div class="p-6 sm:p-10 bg-white shadow-xl rounded-2xl border-l-4 border-blue-500 transform transition-all duration-300 hover:shadow-2xl">
                <div class="max-w-2xl">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="mr-3">📝</span> Informations personnelles
                    </h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Carte 2 avec style amélioré -->
            <div class="p-6 sm:p-10 bg-white shadow-xl rounded-2xl border-l-4 border-green-500 transform transition-all duration-300 hover:shadow-2xl">
                <div class="max-w-2xl">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="mr-3">🔒</span> Sécurité du compte
                    </h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Carte 3 avec style amélioré -->
            <div class="p-6 sm:p-10 bg-white shadow-xl rounded-2xl border-l-4 border-red-500 transform transition-all duration-300 hover:shadow-2xl">
                <div class="max-w-2xl">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="mr-3">⚠️</span> Zone dangereuse
                    </h3>
                    <p class="text-gray-600 mb-6">Une fois votre compte supprimé, toutes vos données seront effacées définitivement.</p>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
