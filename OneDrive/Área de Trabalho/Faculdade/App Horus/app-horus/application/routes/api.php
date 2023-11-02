<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use LaravelQRCode\Facades\QRCode;
use QR_Code\QR_Code;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user/create', [UsersController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/permissions', [PermissionsController::class, 'index']);

Route::get('/courses', [CoursesController::class, 'index']);
Route::post('/courses', [CoursesController::class, 'store']);
Route::put('/courses/{id}', [CoursesController::class, 'update']);
Route::delete('/courses/{id}', [CoursesController::class, 'destroy']);


Route::get('/subjects', [SubjectsController::class, 'index']);
Route::post('/subjects', [SubjectsController::class, 'store']);
Route::put('/subjects/{id}', [SubjectsController::class, 'update']);
Route::delete('/subjects/{id}', [SubjectsController::class, 'destroy']);


Route::get('/qrcode', [CoursesController::class, 'index']);