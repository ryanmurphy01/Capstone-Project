<?php

use App\Http\Controllers\IHistory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProgramController;

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
    
    return view('InstructorViews/instructorSchedule');
});


Route::get('/login',[MainController::class, 'login'])->name('login') ->middleware('AlreadyLogged');
Route::post('/save',[MainController::class, 'save'])->name('save');
Route::post('/check',[MainController::class, 'check'])->name('check');
Route::get('/logout',[MainController::class, 'logout'])->name('logout');



Route::group(['middleware'=>['AuthCheck']], function(){

    Route::get('/instructors', [MainController::class, 'indexUsers'])->name('instructors.index');
});




//change this to use the proper method for setting
Route::get('/passwordSet', function () {
   
    return view('passwordSet');
});

//instructor routes
//main
Route::get('/schedule', function () {
   
    return view('InstructorViews/instructorSchedule');
});

//main
Route::get('/courses', function () {
   
    return view('InstructorViews/instructorCourses');
});

//main
Route::get('/welcome', function () {
    
    return view('InstructorViews/instructorWelcome');
});

//admin routes, mostly for testing, for now
//main
Route::get('/deactivated', function () {
    
    return view('AdminViews/adminDeactivatedInstructors');
})->name('deactivated');

Route::get('/unresponsive', function () {
    
    return view('AdminViews/adminUnresponsiveInstructors');
})->name('unresponsive');

//main
Route::get('/availability', function () {
    
    return view('AdminViews/adminSchedule');
})->name('availability');


Route::resource('programs', ProgramController::class);

//main Program routes
//Route::get('/programs', [ProgramController::class, 'indexPrograms']);
//Route::post('/saveProgram',[ProgramController::class, 'saveProgram'])->name('saveProgram');
//Route::delete('/programs/deleteProgram/{id}',[ProgramController::class, 'destroy'])->name('deleteProgram');

//main
Route::get('history', [IHistory::class, 'index'])->name('history.index');
// Route::get('/history', function () {
//     return view('AdminViews/adminHistory');
// });

//route for when you click on a certain instructor in the history page
Route::get('courseHistory/{id}', [IHistory::class, 'detail']);



//main
Route::get('/semester', function () {
    
    return view('AdminViews/adminSemester');
})->name('semester');

//main
Route::get('/email', function () {
    
    return view('AdminViews/adminEmail');
})->name('email');

//main
Route::get('/requests', function () {
    
    return view('AdminViews/adminRequests');
})->name('request.index');

Route::get('/approvedRequests', function () {
   
    return view('AdminViews/adminApprovedRequests');
});

Route::get('/deniedRequests', function () {
   
    return view('AdminViews/adminDeniedRequests');
});
