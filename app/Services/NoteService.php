<?php

namespace App\Services;

use App\DTOs\DownloadableFileDTO;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoteService
{
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