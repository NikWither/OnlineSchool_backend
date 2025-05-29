<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Resources\NotesResource;

class NotesController extends Controller
{
    public function index()
    {
        return NotesResource::collection(Note::with('tags')->get());
    }

    public function show(Note $note)
    {
        return new NotesResource($note);
    }
}
