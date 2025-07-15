<?php

namespace App\Services\Admin;

use App\DTOs\DownloadableFileDTO;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTaskService
{
    public function createTasks(Request $request): Task
    {
        $data = $request->validated();

        if (!$request->hasFile('file')) {
            throw new \Exception('Файл обязателен');
        }

        $file = $request->file('file');

        $path = $file->store('documents', 'public');
        $originalName = $file->getClientOriginalName();

        return Task::create([
            'title' => $data['title'],
            'original_name' => $originalName,
            'file_path' => $path,
        ]);
    }


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