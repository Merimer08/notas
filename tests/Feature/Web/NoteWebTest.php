<?php

namespace Tests\Feature\Web;

use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoteWebTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_shows_my_notes(): void
    {
        $u = User::factory()->create();
        Note::factory()->for($u)->create(['title' => 'Desde UI']);

        $this->actingAs($u)
             ->get('/notes')
             ->assertOk()
             ->assertSee('Desde UI');
    }

    public function test_can_delete_note_from_ui(): void
    {
        $u = User::factory()->create();
        $note = Note::factory()->for($u)->create(['title' => 'A borrar']);

        $this->actingAs($u)
             ->delete(route('notes.destroy', $note))
             ->assertRedirect(route('notes.index'));

        $this->assertModelMissing($note);
    }
}
