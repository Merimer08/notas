<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Note::class, 'note');
    }

    public function index(Request $request)
    {
        $user = $request->user();

        $query = Note::query()
            ->where('user_id', $user->id)
            ->with('tags');

        if ($q = $request->string('q')->toString()) {
            $query->where(fn($q2) =>
                $q2->where('title', 'like', "%{$q}%")
                   ->orWhere('content', 'like', "%{$q}%")
            );
        }

        if ($tags = $request->string('tags')->toString()) {
            $slugs = collect(explode(',', $tags))->map(fn($t)=>trim($t))->filter();
            if ($slugs->isNotEmpty()) {
                $query->whereHas('tags', fn($t) => $t->whereIn('slug', $slugs));
            }
        }

        $sort = $request->string('sort', '-created_at')->toString();
        $direction = str_starts_with($sort,'-') ? 'desc':'asc';
        $column = ltrim($sort,'-');
        $allowed = ['created_at','updated_at','title','pinned'];
        if (!in_array($column,$allowed,true)) $column = 'created_at';
        $query->orderBy($column,$direction)->orderBy('id','desc');

        $perPage = min((int)$request->integer('per_page', 10), 50);

        return view('notes.index', [
            'notes' => $query->paginate($perPage)->appends($request->query()),
            'q'     => $q,
            'tags'  => $request->string('tags')->toString(),
            'sort'  => $sort,
        ]);
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required','string','max:200'],
            'content'     => ['nullable','string'],
            'pinned'      => ['boolean'],
            'is_archived' => ['boolean'],
            'tags'        => ['nullable','string'], // coma-separadas
        ]);

        $note = new Note($data);
        $note->user_id = $request->user()->id;
        $note->save();

        $this->syncTagsFromCSV($note, $data['tags'] ?? '');

        return redirect()->route('notes.index')->with('status', 'Nota creada');
    }

    public function show(Note $note)
    {
        $note->load('tags');
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        $note->load('tags');
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $data = $request->validate([
            'title'       => ['sometimes','required','string','max:200'],
            'content'     => ['sometimes','nullable','string'],
            'pinned'      => ['sometimes','boolean'],
            'is_archived' => ['sometimes','boolean'],
            'tags'        => ['nullable','string'],
        ]);

        $note->fill($data);
        $note->save();

        if ($request->has('tags')) {
            $this->syncTagsFromCSV($note, $data['tags'] ?? '');
        }

        return redirect()->route('notes.index')->with('status', 'Nota actualizada');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('status', 'Nota eliminada');
    }

    private function syncTagsFromCSV(Note $note, string $csv): void
    {
        $items = collect(explode(',', $csv))
            ->map(fn($t) => trim($t))
            ->filter()
            ->map(function ($name) {
                $slug = Str::slug($name);
                $tag = Tag::firstOrCreate(['slug'=>$slug], ['name'=>$name]);
                return $tag->id;
            })->values();

        $note->tags()->sync($items);
    }
}
