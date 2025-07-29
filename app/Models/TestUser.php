<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{
    protected $table = 'test_user';
    protected $fillable = [
        'user_id',
        'test_id',
        'status',
    ];
}
