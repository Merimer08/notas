<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Editar nota</h2></x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 bg-white shadow-sm rounded">
            <form method="POST" action="{{ route('notes.update', $note) }}">
                @method('PUT')
                @include('notes._form', ['note' => $note, 'submitText' => 'Actualizar Nota'])
            </form>
        </div>
    </div>
</x-app-layout>
