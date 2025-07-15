<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use App\Models\User;
use App\Services\Admin\AdminUsersService;
use Illuminate\Http\Request;


class AdminUsersController extends Controller
{
    protected $service;

    public function __construct(AdminUsersService $service)
    {   
        $this->service = $service;
    }


    public function index()
    {
        $users = $this->service->getAllUsers();

        return UsersResource::collection($users);
    }


    public function store(Request $request)
    {
        
    }

    public function show(User $user)
    {
        return new UsersResource($user);
    }

    public function update(Request $request, User $user)
    {
        // $data = $request->validate([
        //     ''
        // ]);        
        return;
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'Пользователь удален'
        ], 200);
    }
}
