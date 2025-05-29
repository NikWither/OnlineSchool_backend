<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Controllers
use App\Http\Controllers\API\V1\Admin\UsersHomeworkController;
use App\Http\Controllers\API\V1\HomeWorkController;
use App\Http\Controllers\API\V1\NotesController;
use App\Http\Controllers\API\V1\VariantsController;
use App\Http\Controllers\Auth\AuthController;
// Middleware
use App\Http\Middleware\IsAdmin;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');;

Route::prefix('v1')->middleware(['auth:sanctum'])->group(function () {
    // auth users routes
    Route::apiResource('notes', NotesController::class);
    Route::apiResource('variants', VariantsController::class);
    Route::apiResource('homeworks', HomeWorkController::class);
    
    // admin routes
    Route::prefix('admin')->middleware([IsAdmin::class])->group(function () {
        Route::apiResource('usersInfo', UsersHomeworkController::class);
    });
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

