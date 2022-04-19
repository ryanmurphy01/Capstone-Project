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

        //Get current semester
        $data2 = DB::table('semesters')
        ->where('semesters.current_semester', 1)
        ->get()->first();

        $data = DB::table('courses')
            //join the teacher courses and courses table to read out course details
            -> join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
            //join with semester table so only courses from current semester are displayed
            -> join('semesters', 'teacher_courses.semester_id', '=', 'semesters.id')
            //check if the search matches any user's name. use($search_text)
            -> where('teacher_courses.account_id', '=', $id)
            //check that the courses are from the current semester
            -> where('teacher_courses.semester_id', '=', $data2->id)
            -> select('courses.*')
            -> orderBy('courses.course_name', 'asc')
            -> paginate(10);

        return view('InstructorViews/instructorCourses', ['courses'=>$data], ['semester'=>$data2]);
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
            -> orderBy('programs.program_name', 'asc')
            -> paginate(10);
        }
        //otherwise run the retrieve as usual
        else {
            $data = program::orderBy('programs.program_name', 'asc')-> paginate(10);
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
            -> orderBy('courses.course_name', 'asc')
            -> paginate(10);
        }

        //otherwise only match courses with the right program ID
        else {
            //join the course and junction table, then match only courses linked to the record with the
            //id provided in the function
            $data = DB::table('courses')
            -> join('courses_programs', 'courses.id', '=', 'courses_programs.course_code')
            -> where('courses_programs.program_id', $id)
            -> select('courses.*')
            -> orderBy('courses.course_name', 'asc')
            -> paginate(10);
        }

        $data2 = program::find($id);
        return view('InstructorViews/instructorCourseForm', ['courses'=>$data], ['programs'=>$data2]);
    }

    //function for teachers to request courses, checks for dupes and if the course has been taught before
    function addToSelection($id) {

        //get the current semester info
        $data2 = DB::table('semesters')
        ->where('semesters.current_semester', 1)
        ->get()->first();

        $Userid = session('LoggedUser');

        //check if the table already has a record for this course and user
        $temp = DB::table('teacher_courses')
            -> where('account_id', '=', $Userid)
            -> where('course_id', '=', $id)
            -> where('status_id', '=', 2)
            -> get();

            print($temp);

        if ($temp->isNotEmpty()) {
            //check if there's a record for this specific semester already to stop dupes
            $dupeCheck = DB::table('teacher_courses')
            -> where('account_id', '=', $Userid)
            -> where('course_id', '=', $id)
            -> where('semester_id', '=', $data2->id)
            -> get();

            if ($dupeCheck->isNotEmpty()) {
                //tell the user that this course has already been requested
                return back()->with('fail', 'This course has already been requested for this semester');
            }
            //if the record exists in the past but not for this semester, add a record for this semester
            //and approve is automatically
            else {
                DB::table('teacher_courses')->insert([
                    'account_id' => $Userid,
                    //maybe put an if comparison to check if the course has already been taught
                    //if so, auto accept it right here
                    'course_id' => $id,
                    //and put the status for accepted here
                    'status_id' => 2,
                    //add the current semester's id to the record
                    'semester_id' => $data2->id
                ]);
            }

        }
        //if the record does not exist in the past, then proceed as normal
        else {
            DB::table('teacher_courses')->insert([
                'account_id' => $Userid,
                //maybe put an if comparison to check if the course has already been taught
                //if so, auto accept it right here
                'course_id' => $id,
                //and put the status for pending here
                'status_id' => 1,
                //add the current semester's id to the record
                'semester_id' => $data2->id
            ]);
        }

        return redirect('coursesReq');
    }

    function destroy($id){

        $data2 = DB::table('semesters')
        ->where('semesters.current_semester', 1)
        ->get()->first();
        $Userid = session('LoggedUser');

        $delete = DB::table('teacher_courses')->where('course_id', '=', $id)->where('account_id', '=', $Userid)->where('semester_id', '=', $data2->id)->delete();

        if($delete){
            print('it worked');
            return back()->with('success', 'Program has been deleted');
        } else {
            print('it broke');
            return back()->with('fail', 'Something went wrong');
        }
    }
}
