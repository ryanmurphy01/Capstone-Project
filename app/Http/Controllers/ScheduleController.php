<?php

namespace App\Http\Controllers;

use App\Models\teacher_availabilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    function index() {

        $data = DB::table('teacher_availabilities')
            //join avail table to accounts by ID
            -> join('accounts', 'teacher_availabilities.account_id', '=', 'accounts.id')
            //makes sure status is active
            -> where('accounts.status_id', 1)
            //return the schedule record along with account first and last name
            -> get(['teacher_availabilities.*', 'accounts.first_name', 'accounts.last_name']);



        //Get active teacher users
        $activeTeachers = DB::table('accounts')
                    ->join('account_types', 'accounts.id', '=', 'account_types.account_id')
                    ->where('accounts.status_id', 1)
                    ->where('account_types.type_id', 2)
                    ->get(['accounts.*', 'account_types.type_id']);

        return view('AdminViews/adminSchedule', ['activeTeachers'=>$activeTeachers]);
    }
}
