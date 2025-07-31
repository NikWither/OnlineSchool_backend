<?php

namespace App\Services\Admin;

use App\DTOs\DownloadableFileDTO;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBooksService
{
    public function createBooks(Request $request): Book
    {
        $data = $request->validated();

        if (!$request->hasFile('file')) {
            throw new \Exception('Файл обязателен');
        }

        $file = $request->file('file');

        $path = $file->store('documents', 'public');
        $originalName = $file->getClientOriginalName();

        return Book::create([
            'title' => $data['title'],
            'original_name' => $originalName,
            'file_path' => $path,
        ]);
    }


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