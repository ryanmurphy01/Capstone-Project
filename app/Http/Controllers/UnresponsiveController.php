<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UnresponsiveController extends Controller
{
    
    public function index(Request $request){

        //Get current semester
        $data2 = DB::table('semesters')->where('current_semester', 1)->first();
        //extract the instructor to be matched from the request
        $search_text = $request->aInstructorSearch;

        if (!empty($search_text)) {
            $data = DB::table('accounts')
            -> join('account_types', 'accounts.id', '=', 'account_types.account_id')
            -> where('status_id', 1)
            -> where(function ($query) use($search_text) {
                $query -> where('first_name', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('last_name', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('employee_id', 'LIKE', '%'.$search_text.'%');
                })
            -> where('account_types.type_id', '=', 2)
            -> select('accounts.*')
            -> orderBy('accounts.last_name', 'asc')
            -> paginate(10);;
        }
        //return all active users if the search is returned empty
        else {
            $data = DB::table('accounts')
            -> join('account_types', 'accounts.id', '=', 'account_types.account_id')
            -> where('status_id', 1)
            -> where('account_types.type_id', '=', 2)
            -> orderBy('accounts.last_name', 'asc')
            -> paginate(10);
        }


        return view('AdminViews/adminUnresponsiveInstructors', ['accounts'=>$data], ['semester'=>$data2]);

    }

    
    function sendEmail($id){
        //Get current semester
        $currentSemester = DB::table('semesters')
        ->where('semesters.current_semester', 1)->first();

        //Get all active users
        $user = DB::table('accounts')->where('id', $id)->first();

        $action_link = route('login');

        $body = "Hello! This is a reminder to please fillout your availability for the upcoming ". $currentSemester->name." Semester. Please visit the website below to update your availability";

        

            Mail::send('email-reminder', ['action_link'=>$action_link,'body'=>$body], function($message) use ($user) {
                $message->from('parttimeteststclair@gmail.com','Part Time App');
                $message->to($user->personal_email, 'name')
                ->subject('Update Availability');
            });

         return back()->with('success', 'Emails Sent');
    }

}
