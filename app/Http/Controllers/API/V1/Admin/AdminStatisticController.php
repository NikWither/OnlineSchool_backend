<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class AdminStatisticController extends Controller
{
    public function show($id)
    {
        $statistics = Statistic::with(['user', 'assignment'])->find($id);

        return $statistics;
    }
}
