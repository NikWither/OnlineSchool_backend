<?php

namespace App\Services;

use App\DTOs\DownloadableFileDTO;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookService
{
    public function downloadDocument(int $id): DownloadableFileDTO
    {
        $variant = Variant::findOrFail($id);

        if (!$variant->file_path || !Storage::disk('public')->exists($variant->file_path)) {
             throw new \Exception("Файл с id = $id не найден", 404);
        }

        return new DownloadableFileDTO(
            Storage::disk('public')->path($variant->file_path),
            $variant->original_name
        );
    }
}