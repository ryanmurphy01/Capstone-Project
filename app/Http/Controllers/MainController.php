<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;
use App\Models\AccountType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use PDO;

class MainController extends Controller
{


    function login(){
        return view('login');
    }

    //Function to save new accounts into the database
    function save(Request $request){

        //Validate request
        $request->validate([

            'firstname'=>'required',
            'lastname'=>'required',
            'personalemail'=>'required|email',
            'collegeemail'=>'required|email',
            'password'=>'required|min:5',
            'phone'=>'required'
        ]);

        //Insert into database
        $account = new account;
        $account->first_name = $request->firstname;
        $account->last_name = $request->lastname;
        $account->contact_number = $request->phone;
        $account->password = Hash::make($request->password);
        $account->personal_email = $request->personalemail;
        $account->school_email = $request->collegeemail;
        $account->num_of_courses = 0;
        $account->status_id = 1;
        $account->last_updated_availability = now();
        $save = $account->save();

        
        //Get account types
        DB::table('account_types')->insert([
            'account_id' => $account->id,
            'type_id' => $request->accounttype
        ]);



        if($save){
            return back()->with('success', 'New User has been added');
        } else {
            return back()->with('fail', 'Something went wrong');
        }

    }

    //Get all accounts for instructors view
    function indexUsers(){

        $data = account::all();
        $data2 = DB::table('user_types')->get();

        return view('AdminViews/adminViewInstructors', ['accounts'=>$data], ['accountTypes'=>$data2]);
        
    }

    function indexAccountType(){
        $data2 = AccountType::all();

        return view('AdminViews/adminViewInstructors', ['accountTypes'=>$data2]);
    }

    //check users login 
    function check(Request $request){
        //Validate request
        $request->validate([
            'personal_email'=>'required|email',
            'password'=>'required|min:5'

        ]);

        $userInfo = account::where('personal_email', '=', $request->personal_email)->first();
       

        if(!$userInfo){
           return back()->with('fail','Incorrect Email');
        } else{
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                
                //Get account type and redirect them to correct pages.
                $userType = AccountType::where('account_id', '=', $userInfo->id)->first();

                if($userType->type_id == 1){
                    return redirect('/instructors');
                } else {
                    return redirect('/welcome');
                }
            

            } else{
                return back()->with('fail','Incorrect Password');
            }
        }
    }

    //logout request
    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/login');
        }
    }

    
}
