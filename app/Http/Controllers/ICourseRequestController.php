<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;
use App\Models\program;
use Illuminate\Support\Facades\DB;

class ICourseRequestController extends Controller
{
    function index() {

        $id = session('LoggedUser');

        $data = DB::table('courses')
            //join the teacher courses and courses table to read out course details
            -> join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
            //check if the search matches any user's name. use($search_text)
            -> where('teacher_courses.account_id', '=', $id)
            -> select('courses.*')
            -> get();

        return view('InstructorViews/instructorCourses', ['courses'=>$data]);
    }



    //function to get all the programs
    function showProgams(Request $request){

        $search_text = $request->iProgramSearch;

        //if there is a search value provided
        if (!empty($search_text)) {
            $data = DB::table('programs')
            -> where('programs.program_name', 'LIKE', '%'.$search_text.'%')
            -> orWhere('programs.program_code', 'LIKE', '%'.$search_text.'%')
            -> select('programs.*')
            -> get();
        }
        //otherwise run the retrieve as usual
        else {
            $data = program::all();
        }

        return view('InstructorViews/instructorProgramForm', ['programs'=>$data]);
    }

    //function to get all courses matching the program, and the program details
    function showCourses(Request $request, $id) {

        $search_text = $request->iCourseSearch;

        //if there is a search value provided
        if (!empty($search_text)) {
            //join the course and junction table, then match only courses linked to the record with the
            //id provided in the function
            $data = DB::table('courses')
            -> join('courses_programs', 'courses.id', '=', 'courses_programs.course_code')
            //make sure only courses matching the program id provided are shown
            -> where('courses_programs.program_id', $id)
            //match the provided search in course code or name
            -> where(function ($query) use($search_text) {
                $query -> where('courses.course_code', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('courses.course_name', 'LIKE', '%'.$search_text.'%');
                })
            -> select('courses.*')
            -> get();
        }

        //otherwise only match courses with the right program ID
        else {
            //join the course and junction table, then match only courses linked to the record with the
            //id provided in the function
            $data = DB::table('courses')
            -> join('courses_programs', 'courses.id', '=', 'courses_programs.course_code')
            -> where('courses_programs.program_id', $id)
            -> select('courses.*')
            -> get();
        }

        $data2 = program::find($id);
        return view('InstructorViews/instructorCourseForm', ['courses'=>$data], ['programs'=>$data2]);
    }

    function addToSelection($id) {

        $Userid = session('LoggedUser');

        DB::table('teacher_courses')->insert([
            'account_id' => $Userid,
            //maybe put an if comparison to check if the course has already been taught
            //if so, auto accept it right here
            'course_id' => $id,
            //and put the status for pending here
            'status_id' => 1
        ]);

        return redirect('coursesReq');
    }

    function destroy($id){

        $Userid = session('LoggedUser');
        $delete = DB::table('teacher_courses')->where('course_id', '=', $id)->where('account_id', '=', $Userid)->delete();

        if($delete){
            print('it worked');
            return back()->with('success', 'Program has been deleted');
        } else {
            print('it broke');
            return back()->with('fail', 'Something went wrong');
        }
    }
}
