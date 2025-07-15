<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bid\StoreBidRequest;
use App\Models\Bid;
use Illuminate\Http\Request;

class AdminBidController extends Controller
{
    public function index()
    {
        return Bid::all();
    }

    public function store(StoreBidRequest $request)
    {
        $data = $request->validated();

        Bid::create($data);

        return response()->json([
            'message' => 'заявка создана',
        ], 201);
    }

    public function destroy(Bid $bid)
    {
        $bid->delete();

        return response()->json([
            'message' => 'заявка удалена',
        ], 200);
    }
}
