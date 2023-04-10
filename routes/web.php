<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/coordinator', function () {
    return view('/coordinator/students/list_students');
});
Route::get('/coordinator/students/assign_supervisors', function () {
    return view('/coordinator/students/assign_supervisors');
});