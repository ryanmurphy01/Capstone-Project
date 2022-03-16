<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;

class IHistory extends Controller
{
    //Get all accounts for instructors view
    function index(){
        $data = account::all();

        return view('AdminViews/adminHistory', ['accounts'=>$data]);
    }

    //function to show details of a certain instructor when clicked
    function detail($id) {

        $data = account::find($id);
        return view('AdminViews/adminInstructorHistory', ['accounts'=>$data]);
    }
}
