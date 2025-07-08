<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

abstract class BaseDocumentController extends Controller
{
    protected $modelClass;

    public function __construct()
    {
        $this->authorizeModel(); 
    }

    protected function authorizeModel()
    {
        if (!$this->modelClass) {
            abort(500, 'Модель не существует');
        }
    } 

    public function index()
    {
        return $this->modelClass::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,zip|max:20480',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $path = $file->store('documents', 'public');

            $originalName = $request->file('file')->getClientOriginalName();
        }

        $item = $this->modelClass::create([
            'title' => $data['title'],
            'original_name' => $originalName,
            'file_path' => $path,
        ]);

        return response()->json([
            $item
        ], 201);
    }

    public function show($id)
    {
        $item = $this->modelClass::find($id);

        if (!$item) {
            return response()->json([
                'message' => 'Документ не найден'
            ], 404);
        }

        if (!$item->file_path || !Storage::disk('public')->exists($item->file_path)) {
            return response()->json([
                'message' => 'Файл не существует или не найден'
            ], 404);
        }

        return response()->download(
            Storage::disk('public')->path($item->file_path),
            $item->original_name
        );
    }

    // public function update(Request $request, $id)
    // {
    //     $item = $this->modelClass::findOrFail($id);

    //     $data = $request->validate([
    //         'title' => 'sometimes|string|max:255',
    //     ]);

    //     $item->update($data);

    //     return response()->json($item);
    // }

    public function destroy($id)
    {
        $item = $this->modelClass::find($id);

        if (!$item) {
            return response()->json([
                'message' => 'Файл не найден'
            ]);
        }

        if ((!$item->file_path) || (!Storage::exists($item->file_path))) {
            return response()->json([
                'message' => 'Файл не существует или не найден'
            ], 404);
        }

        Storage::delete($item->file_path);
        $item->delete();

        return response()->json(['message' => 'successful delete'], 200);
    }
}
