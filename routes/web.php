<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/coordinator', function () {
    return view('/coordinator/students/list_students');
});

Route::get('/coordinator/students/assign_supervisors', function () {
    return view('/coordinator/students/assign_supervisors');
});




// Route::get('/login', function () {
//     return view('login');
// });

