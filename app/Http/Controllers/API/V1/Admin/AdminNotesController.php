<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;


class AdminNotesController extends Controller
{
    public function index()
    {
        return Note::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|min:2'
        ]);

        $note = Note::create($data);

        return $note;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string|min:2'
        ]);

        $note = Note::findOrFail($id);

        $note->update($data);

        return $note;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::findOrFail($id);

        $note->delete();

        return [
            'message' => 'ok'
        ];
    }
}
