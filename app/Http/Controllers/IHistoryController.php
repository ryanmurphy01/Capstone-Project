<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;
use Illuminate\Support\Facades\DB;

class IHistoryController extends Controller
{
    //Get all accounts for instructors view
    function index(Request $request){

        //extract the instructor or course the user is looking for
        $search_text = $request->aHistorySearch;

        if (!empty($search_text)) {
            $data = DB::table('accounts')
            //connect the accounts table to teacher courses table with id
            -> join('teacher_courses', 'accounts.id', '=', 'teacher_courses.account_id')
            //then join that with the courses table so we can search for courses
            -> join('courses', 'teacher_courses.course_code', '=', 'courses.id')
            //check if the search matches any user's name
            -> where(function ($query) use($search_text) {
                $query -> where('accounts.first_name', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('accounts.last_name', 'LIKE', '%'.$search_text.'%');
                    //uncomment and add these to the query if we need to match more than just names
                    // -> orWhere('accounts.contact_number', 'LIKE', '%'.$search_text.'%')
                    // -> orWhere('accounts.personal_email', 'LIKE', '%'.$search_text.'%')
                    // -> orWhere('accounts.school_email', 'LIKE', '%'.$search_text.'%')
                })
            //check if any courses match the search, by code or name
            -> where(function ($query) use($search_text) {
                $query -> where('courses.course_code', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('courses.course_name', 'LIKE', '%'.$search_text.'%');
                })
            -> select('accounts.*')
            -> get();
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
        return view('AdminViews/adminInstructorHistory', ['accounts'=>$data]);
    }
}
