<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Homework;
use App\Models\Test;
use App\Models\Timetable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;



class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function homeWork(): HasMany
    {
        return $this->hasMany(Homework::class, 'user_id', 'id')->orderBy('created_at', 'desc');
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function timetable(): HasMany
    {
        return $this->hasMany(Timetable::class);
    }

    public function tests(): BelongsToMany
    {
        return $this->belongsToMany(Test::class)->withPivot('status');
    }
}
