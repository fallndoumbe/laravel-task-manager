<!-- Remplacez TOUT le contenu par : -->
@props(['class' => ''])

{{-- Logo personnalisé --}}
<div class="{{ $class }}">
    {{-- Option A : Texte seulement --}}
    <span class="font-bold text-xl text-gray-800">📋 TaskManager</span>

    {{-- OU Option B : Avec icône --}}
    <!-- <div class="flex items-center">
        <span class="text-2xl mr-2">📋</span>
        <span class="font-bold text-xl text-gray-800">TaskManager</span>
    </div> -->

    {{-- OU Option C : Image --}}
    <!-- <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto"> -->
</div>
