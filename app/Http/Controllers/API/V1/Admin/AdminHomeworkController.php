<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Homework\StoreHomeworkRequest;
use App\Http\Requests\Homework\UpdateHomeworkRequest;
use App\Models\Homework;
use App\Models\User;
use App\Http\Resources\HomeWorkResource;
use App\Services\Admin\AdminHomeworkService;
use Illuminate\Http\Request;

class AdminHomeworkController extends Controller
{
    protected $service;

    public function __construct(AdminHomeworkService $service)
    {
        $this->service = $service;
    }

    // получение домашки заданного пользователя
    public function index(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer'
        ]);

        $homeworks = $this->service->getHomeworksUser($request->user_id);

        return HomeWorkResource::collection($homeworks)
            ->response()
            ->setStatusCode(200);
    }

    public function show(Homework $homework)
    {
        return new HomeworkResource($homework)->response()->setStatusCode(200);
    }

    public function store(StoreHomeworkRequest $request)
    {
        $homework = Homework::create($request->validated());

        return (new HomeWorkResource($homework))->response()->setStatusCode(201);
    }

    public function update(UpdateHomeworkRequest $request, Homework $homework)
    {
        $homework->update($request->validated());

        return (new HomeWorkResource($homework))->response()->setStatusCode(200);
    }

    public function destroy(Homework $homework)
    {
        $homework->delete();

        return response()->json([
            'message' => 'Домашнее задание удалено'
        ], 200);
    }
}
