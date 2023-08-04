<?php

use App\Http\Controllers\NotebookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function () {
    Route::get('/notebook', [NotebookController::class, 'index']);
    Route::post('/notebook', [NotebookController::class, 'post']);
    Route::get('/notebook/{id}', [NotebookController::class, 'get']);
    Route::patch('/notebook/{id}', [NotebookController::class, 'patch']);
    Route::delete('/notebook/{id}', [NotebookController::class, 'delete']);
});

//// Получение всех записей
//Route::get('/api/v1/notebook', [NotebookController::class, 'index']);
//
//// Создание новой записи
//Route::post('/api/v1/notebook', [NotebookController::class, 'store']);
//
//// Получение одной записи по id
//Route::get('/api/v1/notebook/{id}', [NotebookController::class, 'show']);
//
//// Обновление записи по id
//Route::patch('/api/v1/notebook/{id}', [NotebookController::class, 'update']);
//
//// Удаление записи по id
//Route::delete('/api/v1/notebook/{id}', [NotebookController::class, 'delete']);
