<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\program;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //function to take user to course page with courses from a selected program listed
    // function index($id) {

    //     $data = program::find($id);
    //     return view('AdminViews/adminCourses', ['programs'=>$data]);
    // }

    //TODO, i have no idea if this is right lol
    //function to get all courses matching the program, and the program details
    function listCourses($id) {

        $data = course::all()->where('program_id', $id);
        $data2 = program::find($id);
        return view('AdminViews/adminCourses', ['courses'=>$data], ['programs'=>$data2]);
    }

    //Function to save new courses into the database
    function store(Request $request){


        //TODO uncomment the name lines once the migration is updated
        //Validate request
         $request->validate([
        //'courseName'=>'required',
        'description'=>'required',
        'creditHours'=>'required|numeric'
        ]);

        //Insert into database
        $course = new course;
        //$course->course_name = $request->courseName;
        $course->description = $request->description;
        $course->credit_hours = $request->creditHours;
        $save = $course->save();

        if($save){
            print('it worked');
            return back()->with('success', 'New Program has been added');
        } else {
            print('it broke');
            return back()->with('fail', 'Something went wrong');
        }
    }

    //double check this too
    function destroy($id){

        $course = course::where('id', '=', $id)->first();
        $delete = $course->delete();

        if($delete){
            print('it worked');
            return back()->with('success', 'Course has been deleted');
        } else {
            print('it broke');
            return back()->with('fail', 'Something went wrong');
        }
    }
}
