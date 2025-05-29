<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Homework\StoreHomeworkRequest;
use App\Http\Requests\Homework\UpdateHomeworkRequest;
use App\Http\Resources\HomeWorkResource;
use App\Models\HomeWork;
use Illuminate\Http\Request;

class HomeWorkController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->user()->id;
        
        $query = HomeWork::where('user_id', $user_id);
        
        return HomeWorkResource::collection($query->get());
    }

    public function store(StoreHomeworkRequest $request)
    {
        $data = $request->validated();

        $homework = HomeWork::create($data);

        return (new HomeWorkResource($homework))->response()->setStatusCode(201);
    }

    public function update(UpdateHomeworkRequest $request, string $id)
    {
        $homework = HomeWork::findOrFail($id);

        $homework->update($request->validated());

        return (new HomeWorkResource($homework))->response()->setStatusCode(200);
    }

    public function destroy(string $id)
    {
        $homework = HomeWork::findOrFail($id);

        $homework->delete();

        return response()->noContent();
    }
}
