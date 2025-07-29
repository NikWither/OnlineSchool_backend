<?php

namespace App\Services;

use App\DTOs\DownloadableFileDTO;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskService
{
    public function downloadDocument(int $id): DownloadableFileDTO
    {
        $task = Task::findOrFail($id);

        if (!$task->file_path || !Storage::disk('public')->exists($task->file_path)) {
             throw new \Exception("Файл с id = $id не найден", 404);
        }

        return new DownloadableFileDTO(
            Storage::disk('public')->path($task->file_path),
            $task->original_name
        );
    }
}