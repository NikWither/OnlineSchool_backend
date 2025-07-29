<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Timetable\StoreTimetableRequest;
use App\Http\Requests\Timetable\UpdateTimetableRequest;
use App\Http\Resources\TimetableResources;
use App\Models\Timetable;
use Illuminate\Http\Request;

class AdminTimetableController extends Controller
{
    public function index()
    {
        $query = Timetable::with(['user', 'lesson'])->get();

        return TimetableResources::collection($query);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTimetableRequest $request)
    {
        $data = $request->validated();

        $timetable = Timetable::create($data);

        return response()->json([
            'message' => 'Расписание добавлено',
            'Расписание' => $timetable
        ], 200);
    }

    public function show(Timetable $timetable)
    {
        return response()->json([
            'timetable' => new TimetableResources($timetable),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimetableRequest $request, Timetable $timetable)
    {
        $data = $request->validated();

        $timetable->update($data);

        return response()->json([
            'timetable' => $timetable
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timetable $timetable)
    {
        $timetable->delete();

        return response()->json([
            'message' => 'Занятие удалено'
        ], 200);
    }
}
