<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;
use App\Models\AccountType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use PDO;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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
            return redirect('/');
        }
    }

    function showResetPage(){

        return view('/passwordReset');
    }

    function sendResetLink(Request $request){
        $request->validate([
            'personal_email'=>'required|email|exists:accounts,personal_email'
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'personal_email'=>$request->personal_email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);

        $action_link = route('reset.password.form', ['token'=>$token, 'personal_email'=>$request->personal_email]);
        $body = "Reset Password request from Part Time Instructors Application for account associated with ".$request->personal_email."
        Please click the link below to reset password";

        Mail::send('email-forgot', ['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
            $message->from('parttimeteststclair@gmail.com','Part Time App');
            $message->to($request->personal_email, 'name')
            ->subject('Reset Password');


        });

        return back()->with('success', 'We have e-mailed your password reset link');
    }


   public function showResetForm(Request $request, $token = null){
        return view('/passwordSet')->with(['token'=>$token, 'email'=>$request->personal_email]);
    }

    public function resetPassword(Request $request){
        $request->validate([
            'personal_email'=>'required|email|exists:accounts,personal_email',
            'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required',
        ]);

        $check_token = DB::table('password_resets')->where([
            'personal_email'=>$request->personal_email,
            'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput->with('fail', 'Invaild Token');
        } else {
            account::where('personal_email', $request->personal_email)->update([
                'password'=>Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'personal_email'=>$request->personal_email
            ])->delete();

            return redirect()->route('login')->with('success', 'Your password has been changed');
        }

    }



}
