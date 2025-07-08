<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use App\Models\User;
use Illuminate\Http\Request;


class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->get();

        return UsersResource::collection($users);
    }
    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usersInfo)
    {   
        return new UsersResource($usersInfo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
