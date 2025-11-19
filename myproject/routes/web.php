<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return ('halo laravel');
});

Route::get('/index', function () {
    return view('index');
});