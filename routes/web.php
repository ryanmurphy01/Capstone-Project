<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

//change this to use the proper method for setting
Route::get('/passwordSet', function () {
    return view('passwordSet');
});

Route::get('/schedule', function () {
    return view('instructorSchedule');
});

//admin routes, mostly for testing, for now
Route::get('/instructors', function () {
    return view('adminViewInstructors');
});

Route::get('/deactivated', function () {
    return view('adminDeactivatedInstructors');
});

Route::get('/unresponsive', function () {
    return view('adminUnresponsiveInstructors');
});
