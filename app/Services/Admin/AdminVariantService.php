<?php

namespace App\Services\Admin;

use App\DTOs\DownloadableFileDTO;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminVariantService
{
    public function createVariant(Request $request): Variant
    {
        $data = $request->validated();

        if (!$request->hasFile('file')) {
            throw new \Exception('Файл обязателен');
        }

        $file = $request->file('file');

        $path = $file->store('documents', 'public');
        $originalName = $file->getClientOriginalName();

        return Variant::create([
            'title' => $data['title'],
            'original_name' => $originalName,
            'file_path' => $path,
        ]);
    }


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