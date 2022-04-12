<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestDisplayController extends Controller
{
    function index() { //retrieves only pending courses

        $data = DB::table('accounts')
            //join the courses and accounts table via junction, then return names and course info
            -> join('teacher_courses', 'accounts.id', '=', 'teacher_courses.account_id')
            -> join('courses', 'teacher_courses.course_id', '=', 'courses.id')
            -> where('teacher_courses.status_id', 1)
            -> get(['teacher_courses.*', 'accounts.first_name', 'accounts.last_name', 'courses.course_name', 'courses.course_code']);

        return view('AdminViews/adminRequests', ['records'=>$data]);
    }

    function approveARequest($userid, $courseCode) {

        $result = DB::table('teacher_courses')
            ->where('account_id', $userid)
            ->where('course_id', $courseCode)
            ->update(['status_id' => 2]);

        //go back to the page that sent the request, this way it can be used for denied and accept page too
        return redirect(url()->previous());
    }

    function denyARequest($userid, $courseCode) {

        $result = DB::table('teacher_courses')
            ->where('account_id', $userid)
            ->where('course_id', $courseCode)
            ->update(['status_id' => 3]);

        //go back to the page that sent the request, this way it can be used for denied and accept page too
        return redirect(url()->previous());
    }

    function approvedRequests() { //retrives only approved

        $data = DB::table('accounts')
            //join the courses and accounts table via junction, then return names and course info
            -> join('teacher_courses', 'accounts.id', '=', 'teacher_courses.account_id')
            -> join('courses', 'teacher_courses.course_id', '=', 'courses.id')
            -> where('teacher_courses.status_id', 2)
            -> get(['teacher_courses.*', 'accounts.first_name', 'accounts.last_name', 'courses.course_name', 'courses.course_code']);

        return view('AdminViews/adminApprovedRequests', ['records'=>$data]);
    }

    function deniedRequests() { //retrives only denied

        $data = DB::table('accounts')
            //join the courses and accounts table via junction, then return names and course info
            -> join('teacher_courses', 'accounts.id', '=', 'teacher_courses.account_id')
            -> join('courses', 'teacher_courses.course_id', '=', 'courses.id')
            -> where('teacher_courses.status_id', 3)
            -> get(['teacher_courses.*', 'accounts.first_name', 'accounts.last_name', 'courses.course_name', 'courses.course_code']);

        return view('AdminViews/adminDeniedRequests', ['records'=>$data]);
    }
}