<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\ReplyController;

use Illuminate\Support\Facades\Route;

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);

Route::get('/topics', [TopicController::class, 'index']);
Route::get('/topics/{topic}', [TopicController::class, 'show']);
Route::post('/topics', [TopicController::class, 'store']);

Route::post('/topics/{topic}/replies', [ReplyController::class, 'store']);

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');