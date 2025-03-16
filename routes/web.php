<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/resume', function () {
    return view('resume');
})->name('resume');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');

Route::get('/projects/tetrashift', function () {
    return view('projects.tetrashift');
})->name('projects.tetrashift');

Route::get('/projects/timedwords', function () {
    return view('projects.timedwords');
})->name('projects.timedwords');

Route::get('/projects/20words', function () {
    return view('projects.20words');
})->name('projects.20words');

require __DIR__.'/auth.php';
