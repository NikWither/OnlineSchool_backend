<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Services\TaskService;

class TasksController extends Controller
{
    protected $service;
    
    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Task::all();
    }

    public function show(int $id)
    {
        $document = $this->service->downloadDocument($id);

        return response()->download($document->path, $document->name);
    }
}
