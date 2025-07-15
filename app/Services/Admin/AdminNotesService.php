<?php

namespace App\Services\Admin;

use App\DTOs\DownloadableFileDTO;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNotesService
{
    public function createNotes(Request $request): Note
    {
        $data = $request->validated();

        if (!$request->hasFile('file')) {
            throw new \Exception('Файл обязателен');
        }

        $file = $request->file('file');

        $path = $file->store('documents', 'public');
        $originalName = $file->getClientOriginalName();

        return Note::create([
            'title' => $data['title'],
            'original_name' => $originalName,
            'file_path' => $path,
        ]);
    }


    public function downloadDocument(int $id): DownloadableFileDTO
    {
        $note = Note::findOrFail($id);

        if (!$note->file_path || !Storage::disk('public')->exists($note->file_path)) {
             throw new \Exception("Файл с id = $id не найден", 404);
        }

        return new DownloadableFileDTO(
            Storage::disk('public')->path($note->file_path),
            $note->original_name
        );
    }
}