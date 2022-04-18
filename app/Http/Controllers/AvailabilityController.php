<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AvailabilityController extends Controller
{
    function index(){

        //get current semester
        $currentSemester = DB::table('semesters')->latest('created_at')->first();
   
        //Get account_id 
        $accountId = session('LoggedUser');
   
   
        //Get times for days of the week
         $mondayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 1)->where('semester_id', $currentSemester->id)->get();
         $tuesdayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 2)->where('semester_id', $currentSemester->id)->get();
         $wednesdayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 3)->where('semester_id', $currentSemester->id)->get();
         $thursdayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 4)->where('semester_id', $currentSemester->id)->get();
         $fridayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 5)->where('semester_id', $currentSemester->id)->get();
         $saturdayTimes = DB::table("teacher_availabilities")->where('account_id', $accountId)->where('day_id', 6)->where('semester_id', $currentSemester->id)->get();
        
        return view("InstructorViews/instructorSchedule",['mondayTimes'=>$mondayTimes, 'tuesdayTimes'=>$tuesdayTimes,'wednesdayTimes'=>$wednesdayTimes,'thursdayTimes'=>$thursdayTimes,'fridayTimes'=>$fridayTimes,'saturdayTimes'=>$saturdayTimes, 'currentSemester'=>$currentSemester ]);
   
       }
   
   
       function add(Request $request){
   
           //get current semester
            $currentSemester = DB::table('semesters')->latest('created_at')->first();
   
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
   
   
           return back();
   
       }

       function delete($id){

        $delete= DB::table('teacher_availabilities')->where('id', '=', $id)->delete();
        

        return back();

       }
       
    

}
