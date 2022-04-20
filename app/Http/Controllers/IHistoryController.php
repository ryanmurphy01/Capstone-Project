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
            //search the courses table for any courses that match the search param
                //then return the records in the junction that match
                $coursesMatched = DB::table('courses')
                //join the teacher courses and courses table
                -> join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
                //find courses that match
                -> orWhere(function ($query) use($search_text) {
                    $query -> where('courses.course_code', 'LIKE', '%'.$search_text.'%')
                        -> orWhere('courses.course_name', 'LIKE', '%'.$search_text.'%');
                    })
                //return records in the junction that match
                -> select('teacher_courses.*')
                -> get();

            //if no matching courses were found, then it's a simple search for user's names
            if (!empty($search_text) && $coursesMatched->isEmpty()) {
                $data = DB::table('accounts')
                -> join('account_types', 'accounts.id', '=', 'account_types.account_id')
                //uncomment this if we want only active accounts
                //-> where('status_id', 1)
                -> where(function ($query) use($search_text) {
                    $query -> where('first_name', 'LIKE', '%'.$search_text.'%')
                        -> orWhere('last_name', 'LIKE', '%'.$search_text.'%')
                        -> orWhere('employee_id', 'LIKE', '%'.$search_text.'%');
                    })
                -> where('account_types.type_id', '=', 2)
                -> select('accounts.*')
                -> orderBy('accounts.last_name', 'asc')
                -> paginate(10);
            }
            //if courses were matched though, then find users matching the id in the junction records retrieved earlier
            //do this for all course matches one by one
            elseif (!empty($search_text) && $coursesMatched->isNotEmpty()) {
                //initialize an empty collection since if we make it in the loop, it'll reset every time
                $data  = collect();
                //go through each retrieved record
                foreach ($coursesMatched as $course) {
                    //make a new record
                    $newRecord = DB::table('accounts')
                    -> join('account_types', 'accounts.id', '=', 'account_types.account_id')
                    -> where('accounts.id', '=', $course->account_id)
                    -> orWhere(function ($query) use($search_text) {
                        $query -> where('accounts.first_name', 'LIKE', '%'.$search_text.'%')
                            -> orWhere('accounts.last_name', 'LIKE', '%'.$search_text.'%')
                            -> orWhere('employee_id', 'LIKE', '%'.$search_text.'%');
                        })
                    -> where('account_types.type_id', '=', 2)
                    -> select('accounts.*')
                    -> orderBy('accounts.last_name', 'asc')
                    -> paginate(10);

                    //make sure it's not empty, which it shouldn't be at this point, but just in case
                    if ($newRecord->isNotEmpty()){
                        $data->push($newRecord);
                    }
                }
                //remove the empty first item that is created when making a new empty array
                $data = $data->shift();
                //dd($data);
            }
        }
        //otherwise get all accounts
        else {
            $data = DB::table('accounts')
            -> join('account_types', 'accounts.id', '=', 'account_types.account_id')
            -> where('account_types.type_id', '=', 2)
            -> select('accounts.*')
            -> orderBy('accounts.last_name', 'asc')
            -> paginate(10);
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
                //check if the search matches any user's name. use($search_text)
                -> where('teacher_courses.account_id', '=', $id)
                -> where(function ($query) use($search_text) {
                    $query -> where('courses.course_code', 'LIKE', '%'.$search_text.'%')
                        -> orWhere('courses.course_name', 'LIKE', '%'.$search_text.'%');
                    })
                //return the courses, junction records and semester code
                -> orderBy('courses.course_name', 'asc')
                -> paginate(10, ['courses.*', 'teacher_courses.*']);
        }
        //otherwise run the retrieve as usual
        else {
            $data2 = DB::table('courses')
                //join the teacher courses and courses table to read out course details
                -> join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
                //check if the search matches any user's name. use($search_text)
                -> where('teacher_courses.account_id', '=', $id)
                -> orderBy('courses.course_name', 'asc')
                -> paginate(10, ['courses.*', 'teacher_courses.*']);
        }

        return view('AdminViews/adminInstructorHistory', ['account'=>$data], ['courses'=>$data2]);
    }
}
