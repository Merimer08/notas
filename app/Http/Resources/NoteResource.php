<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transforma el modelo Note a JSON de salida de la API.
     */
    public function toArray($request): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'content'     => $this->content,
            'pinned'      => (bool)$this->pinned,
            'is_archived' => (bool)$this->is_archived,
            'tags'        => $this->whenLoaded('tags', fn() => $this->tags->pluck('slug')->values()),
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
        ];
    }
}
