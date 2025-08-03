<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Services\BookService;

class BooksController extends Controller
{
    protected $service;
    
    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Book::all();
    }

    public function show(int $id)
    {
        $document = $this->service->downloadDocument($id);

        return response()->download($document->path, $document->name);
    }
}
