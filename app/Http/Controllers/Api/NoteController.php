<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Note::class, 'note');
    }

    public function index(Request $request)
    {
        $user = $request->user();

        $q = Note::query()->where('user_id', $user->id)->with('tags');

        if ($s = $request->string('q')->toString()) {
            $q->where(fn($q2) => $q2->where('title', 'like', "%{$s}%")->orWhere('content', 'like', "%{$s}%"));
        }

        if ($tags = $request->get('tags')) {
            $slugs = is_array($tags) ? $tags : collect(explode(',', $tags))->map(fn($t)=>trim($t))->filter()->values()->all();
            if ($slugs) $q->whereHas('tags', fn($t) => $t->whereIn('slug', $slugs));
        }

        $sort = $request->string('sort', '-created_at')->toString();
        $direction = str_starts_with($sort,'-') ? 'desc' : 'asc';
        $column = ltrim($sort,'-');
        if (!in_array($column, ['created_at','updated_at','title','pinned'], true)) $column = 'created_at';
        $q->orderBy($column, $direction)->orderBy('id','desc');

        $perPage = min((int)$request->integer('per_page', 10), 50);

        return NoteResource::collection($q->paginate($perPage)->appends($request->query()));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required','string','max:200'],
            'content'     => ['nullable','string'],
            'pinned'      => ['boolean'],
            'is_archived' => ['boolean'],
            'tags'        => ['array'],
            'tags.*'      => ['string','max:30'],
        ]);

        $note = new Note([
            'title'       => $data['title'],
            'content'     => $data['content'] ?? null,
            'pinned'      => (bool)($data['pinned'] ?? false),
            'is_archived' => (bool)($data['is_archived'] ?? false),
        ]);
        $note->user_id = $request->user()->id;
        $note->save();

        if (!empty($data['tags'])) $this->syncTags($note, $data['tags']);

        return NoteResource::make($note->load('tags'))->response()->setStatusCode(201);
    }

    public function show(Note $note)
    {
        return NoteResource::make($note->load('tags'));
    }

    public function update(Request $request, Note $note)
    {
        $data = $request->validate([
            'title'       => ['sometimes','required','string','max:200'],
            'content'     => ['sometimes','nullable','string'],
            'pinned'      => ['sometimes','boolean'],
            'is_archived' => ['sometimes','boolean'],
            'tags'        => ['sometimes','array'],
            'tags.*'      => ['string','max:30'],
        ]);

        $note->fill($data)->save();
        if (array_key_exists('tags', $data)) $this->syncTags($note, $data['tags'] ?? []);

        return NoteResource::make($note->load('tags'));
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return response()->noContent();
    }

    private function syncTags(Note $note, array $incoming): void
    {
        $ids = collect($incoming)->map(function ($raw) {
            $name = trim((string)$raw);
            $slug = Str::slug($name);
            $tag  = Tag::firstOrCreate(['slug'=>$slug], ['name'=>$name]);
            return $tag->id;
        })->unique()->values();

        $note->tags()->sync($ids);
    }
}
