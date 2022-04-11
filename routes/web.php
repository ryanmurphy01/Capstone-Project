<?php

use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DeactivatedController;
use App\Http\Controllers\ICourseRequestController;
use App\Http\Controllers\IHistoryController;
use App\Http\Controllers\InstructorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RequestDisplayController;
use App\Http\Controllers\RequestEmail;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\TeacherAvailabilityController;

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


Route::get('/login',[MainController::class, 'login'])->name('login') ->middleware('AlreadyLogged');
//Route::post('/save',[MainController::class, 'save'])->name('save');
Route::post('/check',[MainController::class, 'check'])->name('check');
Route::get('/logout',[MainController::class, 'logout'])->name('logout');



Route::group(['middleware'=>['AuthCheck']], function(){

    Route::resource('instructors', InstructorController::class);
    Route::resource('programs', ProgramController::class);
    Route::resource('deactivated', DeactivatedController::class);
    Route::put('deactivated-update/{id}', [DeactivatedController::class, 'statusUpdate'])->name('deactivate.activate');

});

Route::post('courses/{id}',[CourseController::class, 'storeCourse'])->name('storeCourse');
//trying to search and index in one
Route::get('courses/{id}', [CourseController::class, 'index'])->name('courses');
Route::resource('courses', CourseController::class);
//route to search
// Route::get('courses/search', 'CourseController@search');


Route::get("/passwordReset",[MainController::class, 'showResetPage'])->name('forgot.password');
Route::post("/passwordReset", [MainController::class, 'sendResetLink'])->name('forgot.link');
Route::get("/passwordSet/{token}", [MainController::class, 'showResetForm'])->name('reset.password.form');
Route::post("/password/reset", [MainController::class, 'resetPassword'])->name('reset.password');

//instructor routes
//main

Route::get('/schedule',[AvailabilityController::class, 'index'])->name('schedule.index');
Route::post('/schedule/add',[AvailabilityController::class, 'add'])->name('schedule.add');
Route::delete('/schedule/delete/{id}',[AvailabilityController::class, 'delete'])->name('schedule.delete');


Route::resource('semester', SemesterController::class);



//main

Route::get('coursesReq', [ICourseRequestController::class, 'index'])->name('coursesReq');
Route::get('coursesReq/programs', [ICourseRequestController::class, 'showProgams'])->name('coursesReq/programs');
//pass the program as param and list associated courses
Route::get('coursesReq/courses/{id}', [ICourseRequestController::class, 'showCourses'])->name('coursesReq/courses');
//route to save course selected by user
Route::post('coursesReq/save/{id}',[ICourseRequestController::class, 'addToSelection'])->name('coursesReq/save');

// Route::get('coursesReqDesc', [ICourseRequestController::class, 'courseRequest'])->name('coursesReqDesc');
// Route::get('/courses', function () {
//     return view('InstructorViews/instructorCourses');
// });

//main
Route::get('/welcome', function () {

    return view('InstructorViews/instructorWelcome');
})->name('welcome');

//admin routes, mostly for testing, for now
//main


Route::get('/unresponsive', function () {

    return view('AdminViews/adminUnresponsiveInstructors');
})->name('unresponsive');

//main
Route::get('/availability', function () {

    return view('AdminViews/adminSchedule');
})->name('availability');




//main Program routes
//Route::get('/programs', [ProgramController::class, 'indexPrograms']);
//Route::post('/saveProgram',[ProgramController::class, 'saveProgram'])->name('saveProgram');
//Route::delete('/programs/deleteProgram/{id}',[ProgramController::class, 'destroy'])->name('deleteProgram');



//main
Route::get('history', [IHistoryController::class, 'index'])->name('history.index');
// Route::get('/history', function () {
//     return view('AdminViews/adminHistory');
// });

//route for when you click on a certain instructor in the history page
Route::get('courseHistory/{id}', [IHistoryController::class, 'detail']);


//main
Route::get('/email', [RequestEmail::class, 'index'])->name('email');
Route::get('/email/send', [RequestEmail::class, 'sendEmail'])->name('email.send');

//main
Route::get('requests', [RequestDisplayController::class, 'index'])->name('requests');
Route::get('approvedRequests', [RequestDisplayController::class, 'approvedRequests'])->name('approvedRequests');
Route::get('deniedRequests', [RequestDisplayController::class, 'deniedRequests'])->name('deniedRequests');
