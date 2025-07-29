<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserTimetable;
use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->user()->id;

        $timetable = Timetable::where('user_id', $user_id)
        ->with('lesson')
        ->get();

        return UserTimetable::collection($timetable);
    }
}
