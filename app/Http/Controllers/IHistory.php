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
}
