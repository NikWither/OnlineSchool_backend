<?php

use App\Http\Controllers\API\V1\Admin\AdminAssigmentController;
use App\Http\Controllers\API\V1\Admin\AdminBidController;
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
// Admin
use App\Http\Controllers\API\V1\Admin\AdminHomeworkController;
use App\Http\Controllers\API\V1\Admin\AdminNotesController;
use App\Http\Controllers\API\V1\Admin\AdminTagsController;
use App\Http\Controllers\API\V1\Admin\AdminUsersController;
use App\Http\Controllers\API\V1\Admin\DashboardController;
// Middleware
use App\Http\Middleware\IsAdmin;
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
// Route::post('/admin', [AuthController::class, 'loginAdmin']);
Route::get('/statistics/{id}', [AdminStatisticController::class, 'show']);

// заявка с формы homepage
Route::post('/create-lead', [AdminBidController::class, 'store']);

Route::prefix('v1')->middleware(['auth:sanctum'])->group(function () {
    // auth users routes
    Route::apiResource('notes', NotesController::class);
    Route::apiResource('variants', VariantsController::class);
    Route::apiResource('homeworks', HomeWorkController::class);
    
    // admin routes
    Route::prefix('admin')->middleware([IsAdmin::class])->group(function () {
        
        Route::apiResource('users', AdminUsersController::class);
        Route::apiResource('homeworks', AdminHomeworkController::class);
        Route::apiResource('assigments', AdminAssigmentController::class);

        // files
        Route::apiResource('notes', AdminNotesController::class);
        Route::apiResource('variants', AdminVariantsController::class);
        Route::apiResource('tasks', AdminTasksController::class);

        // заявка
        Route::get('/leads', [AdminBidController::class, 'index']);
        // Route::delete('/bit', [AdminBidController::class, 'delete']);

        Route::get('/dashboard', [DashboardController::class, 'index']);
    });
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

