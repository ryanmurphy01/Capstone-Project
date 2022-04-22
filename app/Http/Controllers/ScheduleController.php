<?php

namespace App\Http\Controllers;

use App\Models\teacher_availabilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\availabilityExport;
use Maatwebsite\Excel\Facades\Excel;

class ScheduleController extends Controller
{
    function index(Request $request) {

        //Get current semester
        $data2 = DB::table('semesters')
        ->where('semesters.current_semester', 1)
        ->get()->first();

        $search_text = $request->aScheduleSearch;

        //if there is a search value provided
        if (!empty($search_text)) {
            $activeTeachers = DB::table('accounts')
                ->join('account_types', 'accounts.id', '=', 'account_types.account_id')
                ->where('accounts.status_id', 1)
                ->where('account_types.type_id', 2)
                -> where(function ($query) use($search_text) {
                    $query -> where('first_name', 'LIKE', '%'.$search_text.'%')
                        -> orWhere('last_name', 'LIKE', '%'.$search_text.'%')
                        -> orWhere('employee_id', 'LIKE', '%'.$search_text.'%');
                    })
                -> orderBy('accounts.last_name', 'asc')
                -> paginate(5, ['accounts.*', 'account_types.type_id']);
        }
        //otherwise run the retrieve as usual
        else {
            //Get active teacher users
            $activeTeachers = DB::table('accounts')
                ->join('account_types', 'accounts.id', '=', 'account_types.account_id')
                ->where('accounts.status_id', 1)
                ->where('account_types.type_id', 2)
                -> orderBy('accounts.last_name', 'asc')
                -> paginate(5, ['accounts.*', 'account_types.type_id']);
        }

        return view('AdminViews/adminSchedule', ['activeTeachers'=>$activeTeachers], ['semester'=>$data2]);
    }

    public function export()
    {
        return Excel::download(new availabilityExport, 'availability.xlsx');
    }
}
