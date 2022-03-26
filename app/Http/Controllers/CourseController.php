<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //function to get all courses matching the program, and the program details
    function index($id) {

        //join the course and junction table, then match only courses linked to the record with the
        //id provided in the function
        $data = DB::table('courses')
        -> join('courses_programs', 'courses.id', '=', 'courses_programs.course_code')
        -> where('courses_programs.program_id', $id)
        -> select('courses.*')
        -> get();
        $data2 = program::find($id);
        return view('AdminViews/adminCourses', ['courses'=>$data], ['programs'=>$data2]);
    }

    //Function to save new courses into the database
    function storeCourse(Request $request, $id){

        $request->validate([
            'courseName'=>'required',
            'courseCode'=>'required',
            'description'=>'required',
            'creditHours'=>'required|numeric'
        ]);

        //Insert into database
        $course = new course;
        $course->course_code = $request->courseCode;
        $course->course_name = $request->courseName;
        $course->description = $request->description;
        $course->credit_hours = $request->creditHours;
        $save = $course->save();

        DB::table('courses_programs')->insert([
            'course_code' => $course->id,
            'program_id' => $id

        ]);



        if($save){
            print('it worked');
            return back()->with('success', 'New Course has been added');
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
