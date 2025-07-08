<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Tag;

class Note extends Model
{
    protected $fillable = [
        'title', 
        'file_path', 
        'original_name', 
    ];
}
