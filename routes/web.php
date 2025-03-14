<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

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


require __DIR__.'/auth.php';
