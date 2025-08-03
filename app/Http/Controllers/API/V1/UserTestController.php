<?php

namespace App\Http\Controllers\API\V1;

use App\DTOs\DownloadableFileDTO;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserTestResource;
use App\Models\Test;
use App\Models\UserTest;
use App\Services\UserTestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserTestController extends Controller
{
    protected $service;

    public function __construct(UserTestService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $usersTest = $this->service->index($request->user()->id);

        return UserTestResource::collection($usersTest);
    }

    public function show($id)
    {
        $document = $this->service->downloadDocument($id);

        return response()->download($document->path, $document->name);
    }
}
