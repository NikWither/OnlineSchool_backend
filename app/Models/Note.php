<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Tag;

class Note extends Model
{
    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'notes_tags');
    }
}
