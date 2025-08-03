<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Test extends Model
{
    protected $guarded = [];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot('status');
    }

    // Хуки

    protected static function booted(): void
    {
        static::created(function (Test $test) {
            $users = User::all();

            foreach ($users as $user) {
                UserTest::create([
                    'user_id' => $user->id,
                    'test_id' => $test->id,
                    'status' => 'not_available',
                ]);
            }
        });
    }
}
