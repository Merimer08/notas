// app/Models/Note.php
<?php
class Note extends Model
{
  protected $fillable = ['title','content','pinned','is_archived'];
  public function user(){ return $this->belongsTo(User::class); }
  public function tags(){ return $this->belongsToMany(Tag::class); }
}

// app/Models/Tag.php
class Tag extends Model
{
  protected $fillable = ['name','slug'];
  public function notes(){ return $this->belongsToMany(Note::class); }
}
