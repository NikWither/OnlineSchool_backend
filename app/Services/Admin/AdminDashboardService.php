<?php

namespace App\Services\Admin;

use App\Models\Book;
use App\Models\Course;
use App\Models\Note;
use App\Models\Test;
use App\Models\User;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDashboardService
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
            'users' => $users,
            'notes' => $notes,
            'variants' => $variants,
            'courses' => $courses,
            'tests' => $tests,
            'books' => $books,
        ];
    }
}