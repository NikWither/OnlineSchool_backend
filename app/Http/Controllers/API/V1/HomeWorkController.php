<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Homework\StoreHomeworkRequest;
use App\Http\Requests\Homework\UpdateHomeworkRequest;
use App\Http\Resources\HomeworkResource;
use App\Models\Homework;
use Illuminate\Http\Request;

class HomeWorkController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->user()->id;
        
        $query = Homework::where('user_id', $user_id);
        
        return HomeworkResource::collection($query->get());
    }
}
