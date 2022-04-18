<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;
use Illuminate\Support\Facades\DB;

class IHistoryController extends Controller
{
    function index(Request $request){

        //extract the instructor or course the user is looking for
        $search_text = $request->aHistorySearch;

        //if search is input
        if (!empty($search_text)) {
            $data = DB::table('accounts')
            //join the courses and accounts table via junction, then return names and course info
            -> join('teacher_courses', 'accounts.id', '=', 'teacher_courses.account_id')
            -> join('courses', 'teacher_courses.course_id', '=', 'courses.id')
            //join to semester table too
            -> join('semesters', 'teacher_courses.semester_id', '=', 'semesters.id')
            //check to make sure only teachers are displayed here, join the status and check that the number is 2
            -> join('account_types', 'accounts.id', '=', 'account_types.account_id')
            //check for instructor name or course detail matches
            -> where(function ($query) use($search_text) {
                $query -> where('first_name', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('last_name', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('employee_id', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('courses.course_code', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('courses.course_name', 'LIKE', '%'.$search_text.'%')
                    //check to see if search matches any semester
                    -> orWhere('semesters.code', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('semesters.name', 'LIKE', '%'.$search_text.'%');
                })
            -> where('account_types.type_id', '=', 2)
            -> select('accounts.*')
            -> get();
        }
        //otherwise get all accounts
        else {
            $data = DB::table('accounts')
            -> join('account_types', 'accounts.id', '=', 'account_types.account_id')
            //-> where('account_types.type_id', '=', 2)
            -> select('accounts.*')
            -> get();
            //simple way, if we want to go back to admins and teachers shown here
            //$data = account::all();
            //may want to return only active users, in which case, uncomment and use line below instead
            // $data = DB::table('accounts')->where('status_id', 1)->get();
        }

        return view('AdminViews/adminHistory', ['accounts'=>$data]);
    }

    //function to show details of a certain instructor when clicked
    function detail($id, Request $request) {

        $search_text = $request->aHistorySearch;

        $data = account::find($id);

        //if there is a search value provided
        if (!empty($search_text)) {
            $data2 = DB::table('courses')
                //join the teacher courses and courses table to read out course details
                -> join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
                //join with semester table
                -> join('semesters', 'teacher_courses.semester_id', '=', 'semesters.id')
                //check if the search matches any user's name. use($search_text)
                -> where('teacher_courses.account_id', '=', $id)
                -> where(function ($query) use($search_text) {
                    $query -> where('courses.course_code', 'LIKE', '%'.$search_text.'%')
                        -> orWhere('courses.course_name', 'LIKE', '%'.$search_text.'%')
                        -> orWhere('semesters.code', 'LIKE', '%'.$search_text.'%')
                        -> orWhere('semesters.name', 'LIKE', '%'.$search_text.'%');
                    })
                    //return the courses, junction records and semester code
                -> get(['courses.*', 'teacher_courses.*', 'semesters.code']);
        }
        //otherwise run the retrieve as usual
        else {
            $data2 = DB::table('courses')
                //join the teacher courses and courses table to read out course details
                -> join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
                //join with semester table
                -> join('semesters', 'teacher_courses.semester_id', '=', 'semesters.id')
                //check if the search matches any user's name. use($search_text)
                -> where('teacher_courses.account_id', '=', $id)
                -> get(['courses.*', 'teacher_courses.*', 'semesters.code']);
        }

        return view('AdminViews/adminInstructorHistory', ['account'=>$data], ['courses'=>$data2]);
    }
}
