<?php

namespace App\Services\Admin;

use App\DTOs\DownloadableFileDTO;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTestService
{
    public function downloadDocument(int $id): DownloadableFileDTO
    {
        $test = Test::findOrFail($id);

        if (!$test->file_path || !Storage::disk('public')->exists($test->file_path)) {
             throw new \Exception("Файл с id = $id не найден", 404);
        }

        return new DownloadableFileDTO(
            Storage::disk('public')->path($test->file_path),
            $test->original_name
        );
    }

    public function createTest(Request $request): Test
    {
        $data = $request->validated();

        if (!$request->hasFile('file')) {
            throw new \Exception('Файл обязателен');
        }

        $file = $request->file('file');

        $path = $file->store('documents', 'public');
        $originalName = $file->getClientOriginalName();

        return Test::create([
            'title' => $data['title'],
            'original_name' => $originalName,
            'file_path' => $path,
        ]);
    }
}