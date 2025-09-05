<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;

class NotePolicy
{
    /**
     * El listado (`index`) no se decide por policy, sino
     * filtrando por user_id en la query. Aun así, podemos devolver true.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Solo el dueño puede ver.
     */
    public function view(User $user, Note $note): bool
    {
        return $note->user_id === $user->id;
    }

    /**
     * Cualquiera logueado puede crear su propia nota.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Solo el dueño puede actualizar.
     */
    public function update(User $user, Note $note): bool
    {
        return $note->user_id === $user->id;
    }

    /**
     * Solo el dueño puede borrar.
     */
    public function delete(User $user, Note $note): bool
    {
        return $note->user_id === $user->id;
    }

    /**
     * Si no usas SoftDeletes, puedes dejar estos en false.
     */
    public function restore(User $user, Note $note): bool
    {
        return false;
    }

    public function forceDelete(User $user, Note $note): bool
    {
        return false;
    }
}
