<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/coordinator', function () {
    return view('/coordinator/layout/navbar');
});