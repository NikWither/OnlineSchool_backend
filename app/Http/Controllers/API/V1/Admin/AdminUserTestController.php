<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\DTOs\UserTestDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestAssigment\UpdateUserTestRequest;
use App\Http\Requests\UserTest\StoreUserTestRequest;
use App\Http\Resources\Admin\UserTestResource;
use App\Models\UserTest;
use App\Services\Admin\AdminUserTestService;

class AdminUserTestController extends Controller
{
        protected $service;

        public function __construct(AdminUserTestService $service)
        {
                $this->service = $service;
        }

        public function index()
        {
                return UserTestResource::collection($this->service->index());
        }

        public function store(StoreUserTestRequest $request)
        {                
                $userTest = $this->service->create($request->toDTO());

                return response()->json([
                        'user_test' => $userTest, 
                ], 201);
        }

        public function show(string $id)
        {                
                return UserTestResource::collection(
                        $this->service->show($id)
                );
        }

        public function update(UpdateUserTestRequest $request, string $id)
        {
                $userTest = $this->service->update((int) $id, $request->toDTO());

                return response()->json([
                        'user_test' => $userTest,
                        'message' => 'Обновлён'
                ], 202);
        }

        public function destroy(string $id)
        {
                $this->service->delete($id);

                return response()->json([
                        'message' => 'Запись удалена'
                ]);
        }
}
                                                                                                                                                                                                                                                        