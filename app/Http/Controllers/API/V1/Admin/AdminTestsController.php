<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Variant\StoreVariantRequest;
use App\Models\Test;
use App\Services\Admin\AdminTestService;

class AdminTestsController extends Controller
{
    protected $service;
    
    public function __construct(AdminTestService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Test::all();
    }

    public function store(StoreVariantRequest $request)
    {
        $item = $this->service->createTest($request);

        return response()->json($item, 201);
    }

    public function show(int $id)
    {
        $document = $this->service->downloadDocument($id);

        return response()->download($document->path, $document->name);
    }

    public function destroy(Test $test)
    {
        $test->delete();

        return response()->json([
            'message' => 'Файл удален'
        ], 200);
    }
}
