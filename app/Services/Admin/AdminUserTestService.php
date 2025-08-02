<?php

namespace App\Services\Admin;

use App\DTOs\UserTestDTO;
use App\Models\UserTest;
use Illuminate\Support\Collection;

class AdminUserTestService
{
    public function index():Collection
    {
        return UserTest::with(['user:id,name', 'test:id,title'])->get();
    }

    public function create(UserTestDTO $dto): UserTest
    {
        return UserTest::create([
            'user_id' => $dto->user_id,
            'test_id' => $dto->test_id,
            'status' => $dto->status,
        ]);
    }

    public function show(string $userId):Collection
    {
        return UserTest::with('test:id,title')
            ->where('user_id', $userId)
            ->get();
    }

    public function update(int $id, array $request): UserTest
    {
        $userTest = UserTest::findOrFail($id);

        $status = $request['status'];

        $userTest->update([
            'status' => $status,
        ]);

        return $userTest;
    }

    public function delete(int $id)
    {
        UserTest::findOrFail($id)->delete();
    }
}