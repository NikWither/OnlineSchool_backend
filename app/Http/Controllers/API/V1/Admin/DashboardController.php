<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Note;
use App\Models\Variant;
use App\Models\Course;
use App\Models\Tag;


class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $notes = Note::count();
        $variants = Variant::count();
        $tags = Tag::count();
        $courses = Course::count();

        return [
            "users"=> $users,
            "notes"=> $notes,
            "variants"=> $variants,
            "tags"=> $tags,
            "courses"=> $courses
        ];
    }
}
