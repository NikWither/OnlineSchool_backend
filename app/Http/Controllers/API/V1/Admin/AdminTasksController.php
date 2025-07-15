<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Models\Task;
use App\Services\Admin\AdminTaskService;
use Illuminate\Http\Request;

class AdminTasksController
{
    protected $service;

    public function __construct(AdminTaskService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Task::all();
    }

    public function store(StoreTaskRequest $request)
    {
        $item = $this->service->createTasks($request);

        return response()->json($item, 210);
    }

    public function show(int $id)
    {
        $document = $this->service->downloadDocument($id);

        return response()->download($document->path, $document->name);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json([
            'message' => 'Файл удален'
        ], 200);
    }
}
