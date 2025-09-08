<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'pinned',
        'is_archived',
        'user_id',
    ];

    protected $casts = [
        'pinned' => 'bool',
        'is_archived' => 'bool',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Ojo: el pivot se llama 'note_tag'
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'note_tag');
    }
}
