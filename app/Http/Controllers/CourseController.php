<?php

namespace App\Http\Controllers;

use App\Models\program;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //function to take user to course page with courses from a selected program listed
    function index($id) {

        $data = program::find($id);
        return view('AdminViews/adminCourses', ['programs'=>$data]);
    }
}
