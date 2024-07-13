<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $a = 5;
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
