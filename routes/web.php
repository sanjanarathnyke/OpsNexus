<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/timeline', function () {
    return view('timeline');
})->name('timeline');

Route::get('/versioncontrol', function () {
    return view('versioncontrol');
})->name('versioncontrol');

Route::get('/payments', function () {
    return view('payments');
})->name('payments');

Route::get('/developer', function () {
    return view('developer');
})->name('developer');

Route::get('/subscription', function () {
    return view('subscription');
})->name('subscription');

Route::get('/notifications', function () {
    return view('notification');
})->name('notification');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');
