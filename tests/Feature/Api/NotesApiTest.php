//test/Feature/Api/NotesApiTest.php
<?php

namespace Tests\Feature\Api;

use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class NotesApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_lists_only_my_notes(): void
    {
        $me = User::factory()->create();
        $other = User::factory()->create();

        Note::factory()->for($me)->create(['title' => 'mía']);
        Note::factory()->for($other)->create(['title' => 'ajena']);

        Sanctum::actingAs($me);

        $res = $this->getJson('/api/v1/notes');
        $res->assertOk()
            ->assertJsonFragment(['title' => 'mía'])
            ->assertJsonMissing(['title' => 'ajena']);
    }

    public function test_can_create_note_with_tags(): void
    {
        $me = User::factory()->create();
        Sanctum::actingAs($me);

        $payload = [
            'title'       => 'API creada',
            'content'     => 'hola',
            'pinned'      => false,
            'is_archived' => false,
            'tags'        => ['work', 'ideas'],
        ];

        $res = $this->postJson('/api/v1/notes', $payload);
        $res->assertCreated();

        $this->assertDatabaseHas('notes', [
            'title' => 'API creada',
            'user_id' => $me->id,
        ]);

        $note = Note::firstWhere('title', 'API creada');
        $this->assertNotNull($note);
        $this->assertCount(2, $note->tags);
        $this->assertTrue($note->tags->pluck('slug')->contains('work'));
        $this->assertTrue($note->tags->pluck('slug')->contains('ideas'));
    }
}
