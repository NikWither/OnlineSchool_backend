<?php

namespace App\Services\Admin;

use App\DTOs\DownloadableFileDTO;
use App\Models\User;
use App\Models\Variant;
use Exception;
use Illuminate\Support\Facades\Storage;

class AdminUsersService
{
    public function getAllUsers()
    {
        $users = User::where('is_admin', false)->get();

        return $users;
    }
}