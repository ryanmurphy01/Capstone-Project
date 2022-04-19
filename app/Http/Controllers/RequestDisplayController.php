<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestDisplayController extends Controller
{
    function index(Request $request) { //retrieves only pending courses

        $search_text = $request->aRequestSearch;

        $data2 = DB::table('semesters')->where('current_semester', 1)->first();

        //if there is a search value provided
        if (!empty($search_text)) {
            $data = DB::table('accounts')
            //join the courses and accounts table via junction, then return names and course info
            -> join('teacher_courses', 'accounts.id', '=', 'teacher_courses.account_id')
            -> join('courses', 'teacher_courses.course_id', '=', 'courses.id')
            //join to semester table too
            -> join('semesters', 'teacher_courses.semester_id', '=', 'semesters.id')
            //check for instructor name or course detail matches
            -> where(function ($query) use($search_text) {
                $query -> where('first_name', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('last_name', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('courses.course_code', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('courses.course_name', 'LIKE', '%'.$search_text.'%')
                    //check to see if search matches any semester
                    -> orWhere('semesters.code', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('semesters.name', 'LIKE', '%'.$search_text.'%');
                })
            //and make sure the status is pending
            -> where('teacher_courses.status_id', 1)
            -> orderBy('semesters.code', 'asc')
            -> paginate(10, ['teacher_courses.*', 'accounts.first_name', 'accounts.last_name', 'courses.course_name', 'courses.course_code', 'semesters.code']);
        }
        //otherwise run the retrieve as usual
        else {
            $data = DB::table('accounts')
            //join the courses and accounts table via junction, then return names and course info
            -> join('teacher_courses', 'accounts.id', '=', 'teacher_courses.account_id')
            -> join('courses', 'teacher_courses.course_id', '=', 'courses.id')
            -> join('semesters', 'teacher_courses.semester_id', '=', 'semesters.id')
            -> where('teacher_courses.status_id', 1)
            -> orderBy('semesters.code', 'asc')
            -> paginate(10, ['teacher_courses.*', 'accounts.first_name', 'accounts.last_name', 'courses.course_name', 'courses.course_code', 'semesters.code']);
        }

        return view('AdminViews/adminRequests', ['records'=>$data], ['semester'=>$data2]);
    }

    function approveARequest($userid, $courseCode, $semesterid) {

        $result = DB::table('teacher_courses')
            ->where('account_id', $userid)
            ->where('course_id', $courseCode)
            //check to make sure semester id matches too
            ->where('semester_id', $semesterid)
            ->update(['status_id' => 2]);

        //go back to the page that sent the request, this way it can be used for denied and accept page too
        return redirect(url()->previous());
    }

    function denyARequest($userid, $courseCode, $semesterid) {

        $result = DB::table('teacher_courses')
            ->where('account_id', $userid)
            ->where('course_id', $courseCode)
            //check to make sure semester id matches too
            ->where('semester_id', $semesterid)
            ->update(['status_id' => 3]);

        //go back to the page that sent the request, this way it can be used for denied and accept page too
        return redirect(url()->previous());
    }

    function approvedRequests(Request $request) { //retrives only approved

        $search_text = $request->aRequestSearch;

        $data2 = DB::table('semesters')->where('current_semester', 1)->first();

        //if there is a search value provided
        if (!empty($search_text)) {
            $data = DB::table('accounts')
            //join the courses and accounts table via junction, then return names and course info
            -> join('teacher_courses', 'accounts.id', '=', 'teacher_courses.account_id')
            -> join('courses', 'teacher_courses.course_id', '=', 'courses.id')
            //join to semester table too
            -> join('semesters', 'teacher_courses.semester_id', '=', 'semesters.id')
            //check for instructor name or course detail matches
            -> where(function ($query) use($search_text) {
                $query -> where('first_name', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('last_name', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('courses.course_code', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('courses.course_name', 'LIKE', '%'.$search_text.'%')
                    //check to see if search matches any semester
                    -> orWhere('semesters.code', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('semesters.name', 'LIKE', '%'.$search_text.'%');
                })
            //and make sure the status is pending
            -> where('teacher_courses.status_id', 2)
            -> orderBy('semesters.code', 'asc')
            -> paginate(10, ['teacher_courses.*', 'accounts.first_name', 'accounts.last_name', 'courses.course_name', 'courses.course_code', 'semesters.code']);
            //-> get(['teacher_courses.*', 'accounts.first_name', 'accounts.last_name', 'courses.course_name', 'courses.course_code', 'semesters.code']);
        }
        //otherwise run the retrieve as usual
        else {
            $data = DB::table('accounts')
            //join the courses and accounts table via junction, then return names and course info
            -> join('teacher_courses', 'accounts.id', '=', 'teacher_courses.account_id')
            -> join('courses', 'teacher_courses.course_id', '=', 'courses.id')
            -> join('semesters', 'teacher_courses.semester_id', '=', 'semesters.id')
            -> where('teacher_courses.status_id', 2)
            -> orderBy('semesters.code', 'asc')
            -> paginate(10, ['teacher_courses.*', 'accounts.first_name', 'accounts.last_name', 'courses.course_name', 'courses.course_code', 'semesters.code']);
        }

        return view('AdminViews/adminApprovedRequests', ['records'=>$data], ['semester'=>$data2]);
    }

    function deniedRequests(Request $request) { //retrives only denied

        $search_text = $request->aRequestSearch;

        $data2 = DB::table('semesters')->where('current_semester', 1)->first();

        //if there is a search value provided
        if (!empty($search_text)) {
            $data = DB::table('accounts')
            //join the courses and accounts table via junction, then return names and course info
            -> join('teacher_courses', 'accounts.id', '=', 'teacher_courses.account_id')
            -> join('courses', 'teacher_courses.course_id', '=', 'courses.id')
            //join to semester table too
            -> join('semesters', 'teacher_courses.semester_id', '=', 'semesters.id')
            //check for instructor name or course detail matches
            -> where(function ($query) use($search_text) {
                $query -> where('first_name', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('last_name', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('courses.course_code', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('courses.course_name', 'LIKE', '%'.$search_text.'%')
                    //check to see if search matches any semester
                    -> orWhere('semesters.code', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('semesters.name', 'LIKE', '%'.$search_text.'%');
                })
            //and make sure the status is denied
            -> where('teacher_courses.status_id', 3)
            -> orderBy('semesters.code', 'asc')
            -> paginate(10, ['teacher_courses.*', 'accounts.first_name', 'accounts.last_name', 'courses.course_name', 'courses.course_code', 'semesters.code']);
        }

        //otherwise run the retrieve as usual
        else {
            $data = DB::table('accounts')
            //join the courses and accounts table via junction, then return names and course info
            -> join('teacher_courses', 'accounts.id', '=', 'teacher_courses.account_id')
            -> join('courses', 'teacher_courses.course_id', '=', 'courses.id')
            -> join('semesters', 'teacher_courses.semester_id', '=', 'semesters.id')
            -> where('teacher_courses.status_id', 3)
            -> orderBy('semesters.code', 'asc')
            -> paginate(10, ['teacher_courses.*', 'accounts.first_name', 'accounts.last_name', 'courses.course_name', 'courses.course_code', 'semesters.code']);
        }

        return view('AdminViews/adminDeniedRequests', ['records'=>$data], ['semester'=>$data2]);
    }
}
