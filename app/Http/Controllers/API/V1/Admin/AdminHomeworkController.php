<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Homework\StoreHomeworkRequest;
use App\Http\Requests\Homework\UpdateHomeworkRequest;
use App\Models\Homework;
use App\Models\User;
use App\Http\Resources\HomeWorkResource;
use Illuminate\Http\Request;

class AdminHomeworkController extends Controller
{
    // получение домашки заданного пользователя
    public function index(Request $request)
    {
        $user_id = $request->user_id;
        
        $homeworks = Homework::where('user_id', $user_id)->get();

        return HomeWorkResource::collection($homeworks)
            ->response()
            ->setStatusCode(200);
    }

    public function store(StoreHomeworkRequest $request)
    {
        $data = $request->validated();

        $homework = Homework::create($data);

        return (new HomeWorkResource($homework))->response()->setStatusCode(201);
    }

    public function update(UpdateHomeworkRequest $request, string $id)
    {
        $homework = Homework::findOrFail($id);

        $homework->update($request->validated());

        return (new HomeWorkResource($homework))->response()->setStatusCode(200);
    }

    public function destroy(string $id)
    {
        $homework = Homework::findOrFail($id);

        $homework->delete();

        return response()->noContent();
    }
}
