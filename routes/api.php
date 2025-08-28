<?php

use App\Http\Controllers\API\V1\Admin\AdminAssigmentController;
use App\Http\Controllers\API\V1\Admin\AdminBidController;
use App\Http\Controllers\API\V1\Admin\AdminBooksController;
use App\Http\Controllers\API\V1\Admin\AdminStatisticController;
use App\Http\Controllers\API\V1\Admin\AdminTasksController;
use App\Http\Controllers\API\V1\Admin\AdminVariantsController;
use App\Http\Controllers\API\V1\Admin\DocumentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Controllers
use App\Http\Controllers\Auth\AuthController;
// Users
use App\Http\Controllers\API\V1\HomeWorkController;
use App\Http\Controllers\API\V1\NotesController;
use App\Http\Controllers\API\V1\VariantsController;
use App\Http\Controllers\API\V1\TasksController;
use App\Http\Controllers\API\V1\TimetableController;
// Admin
use App\Http\Controllers\API\V1\Admin\AdminHomeworkController;
use App\Http\Controllers\API\V1\Admin\AdminNotesController;
use App\Http\Controllers\API\V1\Admin\AdminStatisticsAssigmentsController;
use App\Http\Controllers\API\V1\Admin\AdminTestsController;
use App\Http\Controllers\API\V1\Admin\AdminTimetableController;
use App\Http\Controllers\API\V1\Admin\AdminUsersController;
use App\Http\Controllers\API\V1\Admin\AdminUserTestController;
use App\Http\Controllers\API\V1\Admin\DashboardController;
use App\Http\Controllers\API\V1\BooksController;
use App\Http\Controllers\API\V1\UserTestController;
// Middleware
use App\Http\Middleware\IsAdmin;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/statistics/{id}', [AdminStatisticController::class, 'show']);

// заявка с формы homepage
Route::post('/create-lead', [AdminBidController::class, 'store']);

Route::prefix('v1')->middleware(['auth:sanctum'])->group(function () {
    // auth users routes
    Route::apiResource('notes', NotesController::class);
    Route::apiResource('variants', VariantsController::class);
    Route::apiResource('tasks', TasksController::class);
    Route::apiResource('books', BooksController::class);

    // profile
    Route::apiResource('homeworks', HomeWorkController::class);
    Route::get('/timetable', [TimetableController::class, 'index']);
    Route::get('/user-test', [UserTestController::class, 'index']);
    Route::get('/user-test/{id}', [UserTestController::class, 'show']);
    

    // admin routes
    Route::prefix('admin')->middleware([IsAdmin::class])->group(function () {
        
        Route::apiResource('users', AdminUsersController::class);
        Route::apiResource('homeworks', AdminHomeworkController::class);
        // создание заданий для статистики
        Route::apiResource('assigments', AdminAssigmentController::class);

        // files
        Route::apiResource('notes', AdminNotesController::class);
        Route::apiResource('variants', AdminVariantsController::class);
        Route::apiResource('tasks', AdminTasksController::class);
        Route::apiResource('tests', AdminTestsController::class);
        Route::apiResource('books', AdminBooksController::class);

        // заявка
        Route::get('/leads', [AdminBidController::class, 'index']);

        // расписание 
        Route::apiResource('timetable', AdminTimetableController::class);
        // выдача тестов
        Route::apiResource('user-test', AdminUserTestController::class);
        Route::get('/dashboard', [DashboardController::class, 'index']);
    });
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

