<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Note;
use App\Models\Variant;
use App\Models\Course;
use App\Models\Test;
use App\Models\Book;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $notes = Note::count();
        $variants = Variant::count();
        $courses = Course::count();
        $tests = Test::count();
        $books = Book::count();

        return [
            "users"=> $users,
            "notes"=> $notes,
            "variants"=> $variants,
            "courses"=> $courses,
            "tests" => $tests,
            "books" => $books,
        ];
    }
}
