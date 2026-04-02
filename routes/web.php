<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\DevelopersController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\GitHubWebhookController;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('index');
})->name('dashboard');

Route::get('/timeline', [TimelineController::class, 'index'])->name('timeline');
Route::post('/timeline', [TimelineController::class, 'store'])->name('timeline.store');
Route::put('/timeline/{timeline}', [TimelineController::class, 'update'])->name('timeline.update');
Route::delete('/timeline/{timeline}', [TimelineController::class, 'destroy'])->name('timeline.destroy');

Route::get('/versioncontrol', function () {
    return view('versioncontrol');
})->name('versioncontrol');

Route::get('/payments', function () {
    return view('payments');
})->name('payments');

Route::get('/developer', [DevelopersController::class, 'index'])->name('developer');
Route::post('/developer', [DevelopersController::class, 'store'])->name('developer.store');
Route::put('/developer/{developer}', [DevelopersController::class, 'update'])->name('developer.update');
Route::delete('/developer/{developer}', [DevelopersController::class, 'destroy'])->name('developer.destroy');

Route::get('/subscription', function () {
    return view('subscription');
})->name('subscription');

Route::get('/notifications', function () {
    return view('notification');
})->name('notification');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::post('/projects', [ProjectsController::class, 'store'])->name('projects.store');
Route::put('/projects/{project}', [ProjectsController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectsController::class, 'destroy'])->name('projects.destroy');

// webhook implementation
Route::post('/api/github/webhook', [GitHubWebhookController::class, 'handle']);
