<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;
use Illuminate\Support\Facades\DB;

class IHistoryController extends Controller
{
    //alright so for some reason, a simple join with the teacher_courses table and accounts table won't work
    //did it this way instead
    function index(Request $request){

        //extract the instructor or course the user is looking for
        $search_text = $request->aHistorySearch;

        //search the courses table for any courses that match the search param
        //then return the records in the junction that match
        $coursesMatched = DB::table('courses')
            //join the teacher courses and courses table
            -> join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_code')
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
            //uncomment this if we want only active accounts
            //-> where('status_id', 1)
            -> where(function ($query) use($search_text) {
                $query -> where('first_name', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('last_name', 'LIKE', '%'.$search_text.'%');
                })
            -> select('accounts.*')
            -> get();
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
                -> where('accounts.id', '=', $course->account_id)
                -> orWhere(function ($query) use($search_text) {
                    $query -> where('accounts.first_name', 'LIKE', '%'.$search_text.'%')
                        -> orWhere('accounts.last_name', 'LIKE', '%'.$search_text.'%');
                    })
                -> select('accounts.*')
                -> get();

                //make sure it's not empty, which it shouldn't be at this point, but just in case
                if ($newRecord->isNotEmpty()){
                    $data->push($newRecord);
                }
            }
            //remove the empty first item that is created when making a new empty array
            $data = $data->shift();
        }
        //return all users if the search is returned empty
        else {
            $data = account::all();
            //may want to return only active users, in which case, uncomment and use line below instead
            // $data = DB::table('accounts')->where('status_id', 1)->get();
        }

        return view('AdminViews/adminHistory', ['accounts'=>$data]);
    }

    //function to show details of a certain instructor when clicked
    function detail($id) {

        $data = account::find($id);

        $data2 = DB::table('courses')
            //join the teacher courses and courses table to read out course details
            -> join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_code')
            //check if the search matches any user's name. use($search_text)
            -> where('teacher_courses.account_id', '=', $id)
            -> select('courses.*')
            -> get();

        return view('AdminViews/adminInstructorHistory', ['account'=>$data], ['courses'=>$data2]);
    }
}
