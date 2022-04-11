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
            //there's a conflict since course_code exists in courses and the junction, and both are used here
            ->where('course_id', $courseCode)
            ->update(['status_id' => 2]);

        return redirect(route('requests'));
    }

    function denyARequest($userid, $courseCode) {

        $result = DB::table('teacher_courses')
            ->where('account_id', $userid)
            //there's a conflict since course_code exists in courses and the junction, and both are used here
            ->where('course_id', $courseCode)
            ->update(['status_id' => 3]);

        return redirect(route('requests'));
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
