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
        $test = Test::findOrFail($id);

        if (!$test->file_path || !Storage::disk('public')->exists($test->file_path)) {
             throw new \Exception("Файл с id = $id не найден", 404);
        }
        
        return new DownloadableFileDTO(
            Storage::disk('public')->path($test->file_path),
            $test->original_name
        );
    }
}
