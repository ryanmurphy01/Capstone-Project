<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RequestEmail extends Controller
{
    function index(){
        //Get current semester
        $data = DB::table('semesters')
        ->where('semesters.current_semester', 1)->first();

        return view('AdminViews/adminEmail', ['currentSemester'=>$data]);

    }


    function sendEmail(){
        //Get current semester
        $currentSemester = DB::table('semesters')
        ->where('semesters.current_semester', 1)
        ->get()->first();

        //Get all active users
        $activeUsers = DB::table('accounts')->where('status_id', 1)->get();

        $action_link = route('login');

        $body = "Hello! This is a reminder to please fillout your availability for the upcoming ". $currentSemester->name." Semester. Please visit the website below to update your availability";

        foreach($activeUsers as $user){

            Mail::send('email-reminder', ['action_link'=>$action_link,'body'=>$body], function($message) use ($user) {
                $message->from('parttimeteststclair@gmail.com','Part Time App');
                $message->to($user->personal_email, 'name')
                ->subject('Update Availability');
            });

         }

         return back()->with('success', 'Emails Sent');
    }
}
