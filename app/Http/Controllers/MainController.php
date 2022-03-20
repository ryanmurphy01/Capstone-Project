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
