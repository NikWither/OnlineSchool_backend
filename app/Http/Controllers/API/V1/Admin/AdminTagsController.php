<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return response()->json($tags);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/admin/tags",
     *     summary="Создание тега (только для админов)",
     *     tags={"Admin Tags"},
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title"},
     *             @OA\Property(property="title", type="string", example="Полезный тег")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Тег создан",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="title", type="string")
     *         )
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=403, description="Forbidden")
     * )
     */

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|min:2'
        ]);

        $tag = Tag::create($data);

        return response()->json($tag);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string|min:2'
        ]);

        $tag = Tag::findOrFail($id);

        $tag->update($data);

        return response()->json($tag);
    }

    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);

        $tag->delete();

        return [
            'message' => 'ok'
        ];
    }
}
