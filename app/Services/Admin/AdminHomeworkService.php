<?php

namespace App\Services\Admin;

use App\DTOs\DownloadableFileDTO;
use App\Models\Homework;
use App\Models\User;
use App\Models\Variant;
use Exception;
use Illuminate\Support\Facades\Storage;

class AdminHomeworkService
{
    public function getHomeworksUser(int $userId)
    {
        $homeworks = Homework::where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get();

        return $homeworks;
    }
}