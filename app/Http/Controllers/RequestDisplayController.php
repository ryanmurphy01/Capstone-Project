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
            -> join('courses', 'teacher_courses.course_code', '=', 'courses.id')
            -> where('teacher_courses.status_id', 1)
            -> get(['teacher_courses.*', 'accounts.first_name', 'accounts.last_name', 'courses.course_name', 'courses.course_code']);

        return view('AdminViews/adminRequests', ['records'=>$data]);
    }

    function approvedRequests() { //retrives only approved

        $data = DB::table('accounts')
            //join the courses and accounts table via junction, then return names and course info
            -> join('teacher_courses', 'accounts.id', '=', 'teacher_courses.account_id')
            -> join('courses', 'teacher_courses.course_code', '=', 'courses.id')
            -> where('teacher_courses.status_id', 2)
            -> get(['teacher_courses.*', 'accounts.first_name', 'accounts.last_name', 'courses.course_name', 'courses.course_code']);

        return view('AdminViews/adminApprovedRequests', ['records'=>$data]);
    }

    function deniedRequests() { //retrives only denied

        $data = DB::table('accounts')
            //join the courses and accounts table via junction, then return names and course info
            -> join('teacher_courses', 'accounts.id', '=', 'teacher_courses.account_id')
            -> join('courses', 'teacher_courses.course_code', '=', 'courses.id')
            -> where('teacher_courses.status_id', 3)
            -> get(['teacher_courses.*', 'accounts.first_name', 'accounts.last_name', 'courses.course_name', 'courses.course_code']);

        return view('AdminViews/adminDeniedRequests', ['records'=>$data]);
    }
}
