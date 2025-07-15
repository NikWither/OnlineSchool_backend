<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Video;

class Course extends Model
{
    protected $guarded = [];

    public function video(): HasMany
    {
        return $this->hasMany(Video::class);
    }
}
