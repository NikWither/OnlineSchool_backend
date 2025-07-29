<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestAssigment\StoreTestAssigment;
use App\Http\Requests\TestAssigment\UpdateTestAssigmentRequest;
use App\Http\Resources\AdminUserResource;
use App\Models\TestUser;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTestAssigmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['tests:id,title,description'])->get();

        return AdminUserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestAssigment $request)
    {
        $data = $request->validated();

        $exists = TestUser::where('user_id', $data['user_id'])
            ->where('test_id', $data['test_id'])->exists();

        if ($exists) {
            return response()->json([
                'message' => 'Назначение этого теста у пользователя уже есть',
            ]);
        }

        
        $testUser = TestUser::create($data);

        return response()->json([
            'test_user' => $testUser, 
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::with('tests')->findOrFail($id);

        return new AdminUserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestAssigmentRequest $request, $id)
    {
        $data = $request->validated();

        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
