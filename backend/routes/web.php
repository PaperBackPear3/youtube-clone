<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {

    $contents = Storage::disk('s3')->get('file.jpg');
    return response($contents)->header('Content-Type', 'image/jpeg');

    return ['Laravel' => app()->version()];
});

require __DIR__ . '/auth.php';
