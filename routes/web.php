<?php

use App\Exports\availabilityExport;
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
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\TeacherAvailabilityController;
use App\Http\Controllers\UnresponsiveController;

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
//search and index in one
Route::get('courses/{id}', [CourseController::class, 'index'])->name('courses');
Route::resource('courses', CourseController::class);


Route::get("/passwordReset",[MainController::class, 'showResetPage'])->name('forgot.password');
Route::post("/passwordReset", [MainController::class, 'sendResetLink'])->name('forgot.link');
Route::get("/passwordSet/{token}", [MainController::class, 'showResetForm'])->name('reset.password.form');
Route::post("/password/reset", [MainController::class, 'resetPassword'])->name('reset.password');


Route::get('/schedule',[AvailabilityController::class, 'index'])->name('schedule.index');
Route::post('/schedule/add/{id}',[AvailabilityController::class, 'add'])->name('schedule.add');
Route::delete('/schedule/delete/{id}',[AvailabilityController::class, 'delete'])->name('schedule.delete');


Route::resource('semester', SemesterController::class);
Route::get('semester/{id}/{currentid}', [SemesterController::class, 'makeCurrent'])->name('semester.current');




Route::get('coursesReq', [ICourseRequestController::class, 'index'])->name('coursesReq');
Route::get('coursesReq/programs', [ICourseRequestController::class, 'showProgams'])->name('coursesReq/programs');
//pass the program as param and list associated courses
Route::get('coursesReq/courses/{id}', [ICourseRequestController::class, 'showCourses'])->name('coursesReq/courses');
//route to save course selected by user
Route::post('coursesReq/save/{id}',[ICourseRequestController::class, 'addToSelection'])->name('coursesReq/save');
//delete route to delete a course from the instructors selection
Route::post('coursesReq/remove/{id}',[ICourseRequestController::class, 'destroy'])->name('coursesReq/remove');


Route::get('availability', [ScheduleController::class, 'index'])->name('availability');
Route::get('availability/export/', [ScheduleController::class, 'export'])->name('avail.export');


// Route::get('coursesReqDesc', [ICourseRequestController::class, 'courseRequest'])->name('coursesReqDesc');
// Route::get('/courses', function () {
//     return view('InstructorViews/instructorCourses');
// });


Route::get('unresponsive', [UnresponsiveController::class, 'index'])->name('unresponsive');
Route::get('unresponsive/{id}',[UnresponsiveController::class, 'sendEmail'])->name('unresponsive.email');

//main
Route::get('/welcome', function () {

    return view('InstructorViews/instructorWelcome');
})->name('welcome');





//main Program routes
//Route::get('/programs', [ProgramController::class, 'indexPrograms']);
//Route::post('/saveProgram',[ProgramController::class, 'saveProgram'])->name('saveProgram');
//Route::delete('/programs/deleteProgram/{id}',[ProgramController::class, 'destroy'])->name('deleteProgram');


Route::get('history', [IHistoryController::class, 'index'])->name('history.index');
//route for when you click on a certain instructor in the history page
Route::get('courseHistory/{id}', [IHistoryController::class, 'detail'])->name('courseHistory');



Route::get('/email', [RequestEmail::class, 'index'])->name('email');
Route::get('/email/send', [RequestEmail::class, 'sendEmail'])->name('email.send');

Route::get('requests', [RequestDisplayController::class, 'index'])->name('requests');
//route to show approved requests
Route::get('approvedRequests', [RequestDisplayController::class, 'approvedRequests'])->name('approvedRequests');
//route to mark a request as approved
Route::get('approveRequest/{userId}/{courseCode}/{semesterid}', [RequestDisplayController::class, 'approveARequest'])->name('approveRequest');
//route to retrieve all denied requests
Route::get('deniedRequests', [RequestDisplayController::class, 'deniedRequests'])->name('deniedRequests');
//route to deny a teaching request
Route::get('denyRequest/{userId}/{courseCode}/{semesterid}', [RequestDisplayController::class, 'denyARequest'])->name('denyRequest');

