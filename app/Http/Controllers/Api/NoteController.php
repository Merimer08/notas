<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    public function __construct()
    {
        // Aplica las policies automáticamente a las acciones REST
        $this->authorizeResource(Note::class, 'note');
    }

    /**
     * GET /api/v1/notes
     * Listado con filtro por usuario, búsqueda, tags, ordenación y paginación.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $query = Note::query()
            ->where('user_id', $user->id)
            ->with('tags');

        // Búsqueda por título y contenido
        if ($q = $request->string('q')->toString()) {
            $query->where(function ($q2) use ($q) {
                $q2->where('title', 'like', "%{$q}%")
                   ->orWhere('content', 'like', "%{$q}%");
            });
        }

        // Filtro por etiquetas: ?tags=work,ideas
        if ($tags = $request->string('tags')->toString()) {
            $slugs = collect(explode(',', $tags))
                ->map(fn ($t) => trim($t))
                ->filter();
            if ($slugs->isNotEmpty()) {
                $query->whereHas('tags', function ($t) use ($slugs) {
                    $t->whereIn('slug', $slugs);
                });
            }
        }

        // Ordenación: ?sort=-created_at|created_at|title|-title|updated_at...
        $sort = $request->string('sort', '-created_at')->toString();
        $direction = str_starts_with($sort, '-') ? 'desc' : 'asc';
        $column = ltrim($sort, '-');
        $allowed = ['created_at', 'updated_at', 'title', 'pinned'];
        if (!in_array($column, $allowed, true)) {
            $column = 'created_at';
        }
        $query->orderBy($column, $direction)->orderBy('id', 'desc');

        // Paginación
        $perPage = min((int) $request->integer('per_page', 10), 50);

        return NoteResource::collection(
            $query->paginate($perPage)->appends($request->query())
        );
    }

    /**
     * POST /api/v1/notes
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:200'],
            'content'     => ['nullable', 'string'],
            'pinned'      => ['boolean'],
            'is_archived' => ['boolean'],
            'tags'        => ['array'],
            'tags.*'      => ['string', 'max:30'],
        ]);

        $note = new Note();
        $note->fill([
            'title'       => $data['title'],
            'content'     => $data['content'] ?? null,
            'pinned'      => (bool) ($data['pinned'] ?? false),
            'is_archived' => (bool) ($data['is_archived'] ?? false),
        ]);
        $note->user_id = $request->user()->id;
        $note->save();

        if (!empty($data['tags'])) {
            $this->syncTags($note, $data['tags']);
        }

        return NoteResource::make($note->load('tags'));
    }

    /**
     * GET /api/v1/notes/{note}
     */
    public function show(Note $note)
    {
        // authorizeResource ya aplica la policy 'view'
        return NoteResource::make($note->load('tags'));
    }

    /**
     * PUT/PATCH /api/v1/notes/{note}
     */
    public function update(Request $request, Note $note)
    {
        $data = $request->validate([
            'title'       => ['sometimes', 'required', 'string', 'max:200'],
            'content'     => ['sometimes', 'nullable', 'string'],
            'pinned'      => ['sometimes', 'boolean'],
            'is_archived' => ['sometimes', 'boolean'],
            'tags'        => ['sometimes', 'array'],
            'tags.*'      => ['string', 'max:30'],
        ]);

        $note->fill($data);
        $note->save();

        if (array_key_exists('tags', $data)) {
            $this->syncTags($note, $data['tags'] ?? []);
        }

        return NoteResource::make($note->load('tags'));
    }

    /**
     * DELETE /api/v1/notes/{note}
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return response()->noContent(); // 204
    }

    /**
     * Crea/normaliza etiquetas por nombre/slug y sincroniza el pivot.
     * Acepta array de strings: ['work', 'ideas', ...]
     */
    private function syncTags(Note $note, array $incoming): void
    {
        $tagIds = collect($incoming)
            ->map(function ($raw) {
                $name = trim((string) $raw);
                $slug = Str::slug($name);
                /** @var Tag $tag */
                $tag = Tag::firstOrCreate(['slug' => $slug], ['name' => $name]);
                return $tag->id;
            })
            ->unique()
            ->values();

        $note->tags()->sync($tagIds);
    }
}
<?php