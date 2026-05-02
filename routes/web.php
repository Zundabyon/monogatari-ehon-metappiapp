<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoryController;

// ---Routeはここに追加---
Route::get('/',                [HomeController::class,  'index'])  ->name('home');
Route::get('/stories',         [StoryController::class, 'index'])  ->name('stories.index');
Route::get('/stories/create',  [StoryController::class, 'create']) ->name('stories.create');
Route::post('/stories',        [StoryController::class, 'store'])  ->name('stories.store');
Route::get('/stories/{id}',    [StoryController::class, 'show'])   ->name('stories.show');
Route::get('/stories/shuffle', [StoryController::class, 'shuffle'])->name('stories.shuffle');