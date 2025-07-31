<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreBookRequest;
use App\Models\Book;
use App\Services\Admin\AdminBooksService;

class AdminBooksController extends Controller
{
   protected $service;

   public function __construct(AdminBooksService $service){
      $this->service = $service;
   }

   public function index()
   {
      return Book::all();
   }

   public function store(StoreBookRequest $request)
   {
      $item = $this->service->createBooks($request);

      return response()->json($item, 201);
   }

   public function show(int $id)
   {
      $document = $this->service->downloadDocument($id);

      return response()->download($document->path, $document->name);
   }

   public function destroy(Book $book)
   {
      $book->delete();

      return response()->json([
         'message' => 'Файл удален'
      ], 200);
   }
}
