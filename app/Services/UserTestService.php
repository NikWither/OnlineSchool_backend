<?php

namespace App\Services;

use App\DTOs\DownloadableFileDTO;
use App\Models\Test;
use App\Models\UserTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserTestService
{
    public function index($user_id)
    {
        $usersTest = UserTest::where('user_id',$user_id)
            ->where('status', '!=', 'not_available')
            ->get();

        return $usersTest;
    }


    public function downloadDocument(int $id): DownloadableFileDTO
    {
        $variant = Test::findOrFail($id);

        if (!$variant->file_path || !Storage::disk('public')->exists($variant->file_path)) {
             throw new \Exception("Файл с id = $id не найден", 404);
        }

        return new DownloadableFileDTO(
            Storage::disk('public')->path($variant->file_path),
            $variant->original_name
        );
    }
}