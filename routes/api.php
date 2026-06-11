<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeApiController;
use App\Http\Controllers\Api\ServiceApiController;
use App\Http\Controllers\Api\ProjectApiController;
use App\Http\Controllers\Api\CooperationApiController;

Route::get('/home', [HomeApiController::class, 'index']);

Route::get('/services', [ServiceApiController::class, 'index']);
Route::get('/services/{slug}', [ServiceApiController::class, 'show']);

Route::get('/projects', [ProjectApiController::class, 'index']);
Route::get('/projects/{slug}', [ProjectApiController::class, 'show']);

Route::post('/cooperation', [CooperationApiController::class, 'store']);


Route::get('/test', function () {
    return response()->json([
        'success' => true
    ]);
});