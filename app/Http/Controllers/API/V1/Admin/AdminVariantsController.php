<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Variant\StoreVariantRequest;
use App\Models\Variant;
use App\Services\Admin\AdminVariantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminVariantsController
{
    protected $service;
    
    public function __construct(AdminVariantService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Variant::all();
    }

    public function store(StoreVariantRequest $request)
    {
        $item = $this->service->createVariant($request);

        return response()->json($item, 201);
    }

    public function show(int $id)
    {
        $document = $this->service->downloadDocument($id);

        return response()->download($document->path, $document->name);
    }

    public function destroy(Variant $variant)
    {
        $variant->delete();

        return response()->json([
            'message' => 'Файл удален'
        ], 200);
    }
}
