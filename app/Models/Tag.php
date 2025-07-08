<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Note;

class Tag extends Model
{
    protected $fillable = ['title'];
    
    public function notes():BelongsToMany
    {
        return $this->belongsToMany(Note::class, 'notes_tags');
    }
}
