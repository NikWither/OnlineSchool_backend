<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

abstract class BaseDocumentsUsersController extends Controller
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
}
