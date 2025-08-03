<?php

namespace App\Services;

use App\DTOs\DownloadableFileDTO;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookService
{
    public function downloadDocument(int $id): DownloadableFileDTO
    {
        $book = Book::findOrFail($id);

        if (!$book->file_path || !Storage::disk('public')->exists($book->file_path)) {
             throw new \Exception("Файл с id = $id не найден", 404);
        }

        return new DownloadableFileDTO(
            Storage::disk('public')->path($book->file_path),
            $book->original_name
        );
    }
}