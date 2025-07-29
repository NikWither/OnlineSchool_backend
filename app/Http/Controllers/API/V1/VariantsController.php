<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Variant;
use App\Services\VariantService;

class VariantsController extends Controller
{
    protected $service;
    
    public function __construct(VariantService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Variant::all();
    }

    public function show(int $id)
    {
        $document = $this->service->downloadDocument($id);

        return response()->download($document->path, $document->name);
    }
}
