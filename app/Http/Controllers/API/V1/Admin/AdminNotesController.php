<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Requests\Note\StoreNoteRequest;
use App\Services\Admin\AdminNotesService;

class AdminNotesController
{
   protected $service;

   public function __construct(AdminNotesService $service){
      $this->service = $service;
   }

   public function index()
   {
      return Note::all();
   }

   public function store(StoreNoteRequest $request)
   {
      $item = $this->service->createNotes($request);

      return response()->json($item, 201);
   }

   public function show(int $id)
   {
      $document = $this->service->downloadDocument($id);

      return response()->download($document->path, $document->name);
   }

   public function destroy(Note $note)
   {
      $note->delete();

      return response()->json([
         'message' => 'Файл удален'
      ], 200);
   }
}
