<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AvailabilityController extends Controller
{
    function index(){

        //get current semester
        $currentSemester = DB::table('semesters')->where('current_semester', 1)->first();

        //Get account_id
        $accountId = session('LoggedUser');


        //Get times for days of the week
         $mondayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 1)->where('semester_id', $currentSemester->id)->orderBy('start_time', 'asc')->get();
         $tuesdayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 2)->where('semester_id', $currentSemester->id)->orderBy('start_time', 'asc')->get();
         $wednesdayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 3)->where('semester_id', $currentSemester->id)->orderBy('start_time', 'asc')->get();
         $thursdayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 4)->where('semester_id', $currentSemester->id)->orderBy('start_time', 'asc')->get();
         $fridayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 5)->where('semester_id', $currentSemester->id)->orderBy('start_time', 'asc')->get();
         $saturdayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 6)->where('semester_id', $currentSemester->id)->orderBy('start_time', 'asc')->get();

        return view("InstructorViews/instructorSchedule",['mondayTimes'=>$mondayTimes, 'tuesdayTimes'=>$tuesdayTimes,'wednesdayTimes'=>$wednesdayTimes,'thursdayTimes'=>$thursdayTimes,'fridayTimes'=>$fridayTimes,'saturdayTimes'=>$saturdayTimes, 'currentSemester'=>$currentSemester, 'account'=>$accountId ]);

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

       



}
