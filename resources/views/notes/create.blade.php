<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Nueva nota</h2></x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 bg-white shadow-sm rounded">
            <form method="POST" action="{{ route('notes.store') }}">
                @include('notes._form', ['note' => new \App\Models\Note(), 'submitText' => 'Crear Nota'])
            </form>
        </div>
    </div>
</x-app-layout>
