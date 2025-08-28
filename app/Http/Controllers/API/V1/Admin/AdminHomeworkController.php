<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Homework\StoreHomeworkRequest;
use App\Http\Requests\Homework\UpdateHomeworkRequest;
use App\Models\Homework;
use App\Http\Resources\HomeworkResource;
use App\Services\Admin\AdminHomeworkService;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class AdminHomeworkController extends Controller
{
    protected $service;

    public function __construct(AdminHomeworkService $service)
    {
        $this->service = $service;
    }

    #[OA\Get(
        path: "/api/v1/admin/homeworks",
        summary: "Получить список всех домашних заданий",
        tags: ["Admin Homework"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Список домашних заданий",
                content: new OA\MediaType(
                        mediaType: "application/json",
                        schema: new OA\Schema(
                            type: "array",
                            items: new OA\Items(ref: "#/components/schemas/HomeworkResponse")
                        )
                    )
                )
            ]
        )
    ]
    public function index(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer'
        ]);

        $homeworks = $this->service->getHomeworksUser($request->user_id);

        // Изменили return
        return response()->json(HomeworkResource::collection($homeworks), 200);
    }

    public function show(Homework $homework)
    {
        return response()->json(new HomeworkResource($homework), 200);
    }

    public function store(StoreHomeworkRequest $request)
    {
        $homework = Homework::create($request->validated());

        return (new HomeworkResource($homework))->response()->setStatusCode(201);
    }

    public function update(UpdateHomeworkRequest $request, Homework $homework)
    {
        $homework->update($request->validated());

        return (new HomeworkResource($homework))->response()->setStatusCode(200);
    }

    public function destroy(Homework $homework)
    {
        $homework->delete();

        return response()->json([
            'message' => 'Домашнее задание удалено'
        ], 200);
    }
}
