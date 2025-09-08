@csrf
<div class="mb-4">
    <label for="title" class="block text-gray-700">Título</label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $note->title ?? '') }}"
           class="w-full mt-1 rounded-md shadow-sm border-gray-300" required maxlength="200">
    @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>

<div class="mb-4">
    <label for="content" class="block text-gray-700">Contenido</label>
    <textarea name="content" id="content" rows="10"
              class="w-full mt-1 rounded-md shadow-sm border-gray-300">{{ old('content', $note->content ?? '') }}</textarea>
    @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>

<div class="mb-4 flex gap-6">
    <label class="inline-flex items-center gap-2">
        <input type="checkbox" name="pinned" value="1" @checked(old('pinned', $note->pinned ?? false))>
        <span>Fijada</span>
    </label>
    <label class="inline-flex items-center gap-2">
        <input type="checkbox" name="is_archived" value="1" @checked(old('is_archived', $note->is_archived ?? false))>
        <span>Archivada</span>
    </label>
</div>

<div class="mb-4">
    <label for="tags" class="block text-gray-700">Etiquetas (separadas por coma)</label>
    @php
        $tagsCSV = old('tags', isset($note) ? $note->tags->pluck('slug')->implode(',') : '');
    @endphp
    <input type="text" name="tags" id="tags" value="{{ $tagsCSV }}"
           placeholder="work, ideas"
           class="w-full mt-1 rounded-md shadow-sm border-gray-300">
    @error('tags') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>

<button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">
    {{ $submitText ?? 'Guardar' }}
</button>
