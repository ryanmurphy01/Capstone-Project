<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;
use App\Models\program;
use Illuminate\Support\Facades\DB;

class ICourseRequestController extends Controller
{
    //function to get all the programs for the dropdown thing
    function iDropdown(){
        //retrieve all programs
        $data = program::all();
        //return an empty collection of courses to make the foreach not throw an error
        $data2 = collect(new course());

        return view('InstructorViews/instructorCourses', ['programs'=>$data], ['courses'=>$data2]);
    }


    //function to display only courses belonging to a certain program
    function courseRequest(Request $request) {

        //retrieve programs again since the reloaded page won't have them and it will throw an error
        $data = program::all();
        //take the ID of the program selected from the drop down
        $id = $request->selectPrograms;

        //match program with the ID provided and return courses that belong to it
        $data2 = DB::table('courses')
            -> join('courses_programs', 'courses.id', '=', 'courses_programs.course_code')
            -> where('courses_programs.program_id', $id)
            -> select('courses.*')
            -> get();

        //return the data to the view
        return view('InstructorViews/instructorCourses', ['courses'=>$data2], ['programs'=>$data]);
    }

    //function to display only courses belonging to a certain program
    function refreshDesciption(Request $request) {

        //retrieve programs again since the reloaded page won't have them and it will throw an error
        $data = program::all();
        //take the ID of the program selected from the drop down
        $id = $request->selectPrograms;

        //match program with the ID provided and return courses that belong to it
        $data2 = DB::table('courses')
            -> join('courses_programs', 'courses.id', '=', 'courses_programs.course_code')
            -> where('courses_programs.program_id', $id)
            -> select('courses.*')
            -> get();

        //return the data to the view
        return view('InstructorViews/instructorCourses', ['courses'=>$data2], ['programs'=>$data]);
    }
}
