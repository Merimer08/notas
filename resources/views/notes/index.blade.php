<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Notas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
                <div class="mb-4 p-3 bg-green-50 border border-green-200 rounded text-green-800">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-4">
                <form action="{{ route('notes.index') }}" method="GET" class="flex flex-wrap items-center gap-2">
                    <input
                        type="text"
                        name="q"
                        value="{{ request('q') }}"
                        placeholder="Buscar en notas..."
                        class="rounded-md shadow-sm border-gray-300"
                    >
                    <input
                        type="text"
                        name="tags"
                        value="{{ request('tags') }}"
                        placeholder="tags: work,ideas"
                        class="rounded-md shadow-sm border-gray-300"
                    >
                    <select name="sort" class="rounded-md shadow-sm border-gray-300">
                        <option value="-created_at" @selected(request('sort','-created_at')==='-created_at')>Más recientes</option>
                        <option value="created_at"  @selected(request('sort')==='created_at')>Más antiguas</option>
                        <option value="title"       @selected(request('sort')==='title')>Título A-Z</option>
                        <option value="-title"      @selected(request('sort')==='-title')>Título Z-A</option>
                        <option value="-updated_at" @selected(request('sort')==='-updated_at')>Editadas rec.</option>
                    </select>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Buscar</button>
                </form>

                <a href="{{ route('notes.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-md">
                    + Crear Nota
                </a>
            </div>

            <div class="flex items-center justify-between mb-3 text-sm text-gray-600">
                <div>{{ $notes->total() }} resultados</div>
                @if(request()->hasAny(['q','tags','sort']))
                    <a href="{{ route('notes.index') }}" class="underline">Limpiar filtros</a>
                @endif
            </div>

            {{-- Chips de filtros activos --}}
            <div class="mb-3 flex flex-wrap gap-2">
                @if(request('q'))
                    <a href="{{ route('notes.index', collect(request()->except(['q','page']))->all()) }}"
                       class="text-xs px-2 py-1 rounded-full border hover:bg-gray-50">
                        q: “{{ request('q') }}” ✕
                    </a>
                @endif

                @if(request('tags'))
                    @php
                        $all = collect(explode(',', request('tags')))->map(fn($t)=>trim($t))->filter()->values();
                    @endphp
                    @foreach($all as $slug)
                        @php
                            $remaining = $all->reject(fn($x)=>$x===$slug)->implode(',');
                        @endphp
                        <a href="{{ route('notes.index', array_filter(array_merge(request()->except('page'), ['tags' => $remaining]))) }}"
                           class="text-xs px-2 py-1 rounded-full border hover:bg-gray-50">
                            #{{ $slug }} ✕
                        </a>
                    @endforeach
                @endif
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @forelse ($notes as $note)
                    <div class="p-4 border-b last:border-0">
                        <div class="flex items-center gap-2 mb-1">
                            @if($note->pinned)
                                <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full">Pinned</span>
                            @endif
                            @if($note->is_archived)
                                <span class="text-xs bg-gray-100 text-gray-700 px-2 py-0.5 rounded-full">Archivada</span>
                            @endif
                        </div>

                        <h3 class="text-lg font-bold">
                            <a href="{{ route('notes.show', $note) }}" class="hover:underline">{{ $note->title }}</a>
                        </h3>

                        <p class="text-gray-600 mt-2">
                            {{ $note->content ? \Illuminate\Support\Str::limit($note->content, 150) : '— sin contenido —' }}
                        </p>

                        <div class="mt-2 flex flex-wrap gap-2">
                            @foreach ($note->tags as $tag)
                                <a href="{{ route('notes.index', array_merge(request()->except('page'), ['tags' => $tag->slug])) }}"
                                   class="text-xs bg-gray-200 text-gray-700 px-2 py-1 rounded-full hover:bg-gray-300">
                                    #{{ $tag->slug }}
                                </a>
                            @endforeach
                        </div>

                        <div class="mt-4 flex gap-3">
                            <a href="{{ route('notes.edit', $note) }}" class="text-blue-600 hover:underline">Editar</a>
                            <form action="{{ route('notes.destroy', $note) }}" method="POST"
                                  onsubmit="return confirm('¿Estás segura de que quieres eliminar esta nota?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-500">
                        <p>Aún no tienes notas.</p>
                        <a href="{{ route('notes.create') }}"
                           class="mt-4 inline-block px-4 py-2 bg-green-600 text-white rounded-md">
                            Crea tu primera nota
                        </a>
                    </div>
                @endforelse

                <div class="mt-4">
                    {{ $notes->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
