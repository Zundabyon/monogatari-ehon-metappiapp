<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoryController;

// ---Routeはここに追加---
Route::get('/',                [HomeController::class,  'index'])  ->name('home');
Route::get('/stories',         [StoryController::class, 'index'])  ->name('stories.index');
Route::get('/stories/create',  [StoryController::class, 'create']) ->name('stories.create');
Route::post('/stories',        [StoryController::class, 'store'])  ->name('stories.store');
Route::get('/stories/shuffle', [StoryController::class, 'shuffle'])->name('stories.shuffle');
Route::get('/stories/{id}',    [StoryController::class, 'show'])   ->name('stories.show');
Route::post('/stories/{id}/like', [StoryController::class, 'like'])->name('stories.like');
Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/creater', 'creater')->name('creater');