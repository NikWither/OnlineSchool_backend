<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assigment\StoreAssigmentRequest;
use App\Http\Requests\Assigment\UpdateAssigmentRequest;
use App\Models\Assignment;
use Illuminate\Http\Request;

class AdminAssigmentController extends Controller
{
    public function index()
    {
        return Assignment::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssigmentRequest $request)
    {
        $assigment = Assignment::create($request->validated());

        return $assigment;
    }

    /**
     * Display the specified resource.
     */
    public function show(Assignment $assigment)
    {
        return $assigment;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssigmentRequest $request, Assignment $assignment)
    {
        $assignment->update($request->validated());

        return $assignment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assigment)
    {
        $assigment->delete();

        return response()->json([
            'message' => 'Задание успешно удалено'
        ], 200);
    }
}
