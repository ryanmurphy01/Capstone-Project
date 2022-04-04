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
        $name = $request->selectPrograms;

        //match program with the ID provided and return courses that belong to it
        $data2 = DB::table('courses')
            //connect the courses table to junction with course ID
            -> join('courses_programs', 'courses.id', '=', 'courses_programs.course_code')
            //then link the junction to the program table so we can search by name
            -> join('programs', 'courses_programs.program_id', '=', 'programs.id')
            -> where('programs.program_name', $name)
            -> select('courses.*')
            -> get();

        //my way of trying to put the program selected back into the field
        $selectedProgram = program::where('program_name', '=', $name)->first();
        //works up to here, so something is wrong with the way it's sent back to the view
        print($selectedProgram);


        //return the data to the view
        return view('InstructorViews/instructorCourses', ['courses'=>$data2], ['programs'=>$data], ['selected'=>$selectedProgram]);
    }

}
