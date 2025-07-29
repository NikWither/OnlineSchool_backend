<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Timetable;

class Lesson extends Model
{
    protected $guarded = [];

    public function timetables(): HasMany
    {
        return $this->hasMany(Timetable::class);
    }
}
