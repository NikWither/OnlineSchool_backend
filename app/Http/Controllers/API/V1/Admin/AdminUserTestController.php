<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestAssigment\UpdateUserTestRequest;
use App\Http\Requests\UserTest\StoreUserTestRequest;
use App\Http\Resources\Admin\UserTestResource;
use App\Models\UserTest;
class AdminUserTestController extends Controller
{
    public function index()
    {
        return UserTestResource::collection(
            UserTest::with(['user:id,name', 'test:id,title'])->get()
        );
    }

    public function store(StoreUserTestRequest $request)
    {
        $data = $request->validated();

        $userTest = UserTest::create($data);

        return response()->json([
            'user_test' => $userTest, 
        ], 201);
    }

    public function show(string $id)
    {
        $userTests = UserTest::with('test:id,title')
            ->where('user_id', $id)
            ->get();

        return UserTestResource::collection($userTests);
    }

    public function update(UpdateUserTestRequest $request, string $id)
    {
        $data = $request->validated();

        $userTest = UserTest::findOrFail($id);
        
        $userTest->update($data);

        return response()->json([
            'user_test' => $userTest,
            'message' => 'Обновлён'
        ], 202);
    }

    public function destroy(string $id)
    {
        $userTest = UserTest::findOrFail($id);

        $userTest->delete();

        return response()->json([
            'message' => 'Запись удалена'
        ]);
    }
}
