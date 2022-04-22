<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AvailabilityController extends Controller
{
    function index(){

        //get current semester
        $currentSemester = DB::table('semesters')->where('current_semester', 1)->first();

        //Get account_id
        $accountId = session('LoggedUser');

        //get the instructor's currently input max hours
        $data = DB::table('accounts')
            -> where('id', $accountId)
            -> first('accounts.num_of_courses');

        //Get times for days of the week
         $mondayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 1)->where('semester_id', $currentSemester->id)->orderBy('start_time', 'asc')->get();
         $tuesdayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 2)->where('semester_id', $currentSemester->id)->orderBy('start_time', 'asc')->get();
         $wednesdayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 3)->where('semester_id', $currentSemester->id)->orderBy('start_time', 'asc')->get();
         $thursdayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 4)->where('semester_id', $currentSemester->id)->orderBy('start_time', 'asc')->get();
         $fridayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 5)->where('semester_id', $currentSemester->id)->orderBy('start_time', 'asc')->get();
         $saturdayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 6)->where('semester_id', $currentSemester->id)->orderBy('start_time', 'asc')->get();

        return view("InstructorViews/instructorSchedule",['mondayTimes'=>$mondayTimes, 'tuesdayTimes'=>$tuesdayTimes,'wednesdayTimes'=>$wednesdayTimes,'thursdayTimes'=>$thursdayTimes,'fridayTimes'=>$fridayTimes,'saturdayTimes'=>$saturdayTimes, 'currentSemester'=>$currentSemester, 'account'=>$accountId, 'details'=>$data ]);

       }


       function add(Request $request, $id){

           //get current semester
           $currentSemester = DB::table('semesters')
           ->where('semesters.current_semester', 1)
           ->get()->first();

           //Get account_id
           $accountId = session('LoggedUser');


           //Validate request
           $request->validate([
               'startTime'=>'required',
               'endTime'=>'required'

           ]);


           //Insert new times
           DB::table('teacher_availabilities')->insert([
               'account_id' => $accountId,
               'day_id' => $request->day,
               'start_time' => $request->startTime,
               'end_time' => $request->endTime,
               'semester_id' => $currentSemester->id
           ]);

           //Update user last updated time.
           DB::table('accounts')
           ->where('id', $id)
           ->update(['last_updated_availability' => now()]);


           return back();

       }

       function delete($id){

        $delete= DB::table('teacher_availabilities')->where('id', '=', $id)->delete();


        return back();

       }

       //function to set user's maximum hours
       function updateMaximumHours(Request $request, $userid) {

        //retrieve hours from user input
        $maxHours = $request->courseLoad;

        if (!empty($maxHours)) {
            $result = DB::table('accounts')
            ->where('id', $userid)
            ->update(['num_of_courses' => $maxHours]);
        }

        //go back to the page that sent the request, this way it can be used for denied and accept page too
        return redirect(url()->previous());
    }


}
