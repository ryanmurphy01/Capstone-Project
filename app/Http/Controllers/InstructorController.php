<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\account;
use App\Models\AccountType;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //extract the instructor to be matched from the request
        $search_text = $request->aInstructorSearch;

        if (!empty($search_text)) {
            $data = DB::table('accounts')
            //only retrieve records that are active (not deactivated or unresponsive)
            -> where('status_id', 1)
            //check if any of the fields in an account match the given input
            //need the 'use(varName)' to access variable outside the closure
            -> where(function ($query) use($search_text) {
                $query -> where('first_name', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('last_name', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('employee_id', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('contact_number', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('personal_email', 'LIKE', '%'.$search_text.'%')
                    -> orWhere('school_email', 'LIKE', '%'.$search_text.'%');
                })
            -> orderBy('accounts.last_name', 'asc')
            -> paginate(10);
        }
        //return all active users if the search is returned empty
        else {
            $data = DB::table('accounts')
            -> where('status_id', 1)
            -> orderBy('accounts.last_name', 'asc')
            -> paginate(10);
        }

        $data2 = DB::table('user_types')->get();

        return view('AdminViews/adminViewInstructors', ['accounts'=>$data], ['accountTypes'=>$data2]);

    }

    public function getUserType($id)
    {
        $userType = DB::table('account_types')->where('account_id', $id)->get();
        return $userType;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate request
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'personalemail'=>'required|email',
            'accounttype'=>'required'
        ]);

        $uuid = Str::uuid();
        //Insert into database
        $account = new account;
        $account->id = $uuid;
        $account->first_name = $request->firstname;
        $account->last_name = $request->lastname;
        //new employee ID field
        $account->employee_id = $request->employee_id;
        $account->contact_number = $request->phone;
        //Make Random Password
        $password = Str::random(10);
        $account->password = Hash::make($password);
        $account->personal_email = $request->personalemail;
        $account->school_email = $request->collegeemail;
        $account->num_of_courses = 0;
        $account->status_id = 1;
        $account->last_updated_availability = now();
        $save = $account->save();



        DB::table('account_types')->insert([
            'account_id' => $uuid,
            'type_id' => $request->accounttype
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'personal_email'=>$request->personalemail,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);

        $action_link = route('reset.password.form', ['token'=>$token, 'personal_email'=>$request->personalemail]);
        $body = "Welcome! You have been registered for the Zekelman School of Business & Information Technology Part Time Availability Portal
        With the account email: ".$request->personalemail."
        Please click the link below to reset password and login for the first time.";

        Mail::send('email-forgot', ['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
            $message->from('parttimeteststclair@gmail.com','Part Time App');
            $message->to($request->personalemail, 'name')
            ->subject('Welcome To Part Time Availability Portal');
        });



        if($save){
            return back()->with('success', 'New User has been added');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = account::findOrFail($id);
        $userTypes = DB::table('user_types')->get();
        $userType = DB::table('account_types')->where('account_id', $account->id)->first();


        return view('AdminViews/admineditInstructor', ['account'=>$account],  ['accountTypes'=>$userTypes, 'userType'=>$userType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //Validate request
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'personalemail'=>'required|email',
            'accounttype'=>'required'
        ]);


        $account = account::findOrFail($id);
        $account->first_name = $request->firstname;
        $account->last_name = $request->lastname;
        //new employee ID field
        $account->employee_id = $request->employee_id;
        $account->personal_email = $request->personalemail;
        $account->school_email = $request->collegeemail;
        $account->contact_number = $request->phone;

        $save = $account->save();

        if($save){
            print('it worked');
            return redirect()->route('instructors.index')->with('success', 'Account has been updated');
        } else {
            print('it broke');
            return redirect()->route('instructors.index')->with('fail', 'Something went wrong');
        }

    }

    public function updateInstructorView($id){
        $account = account::findOrFail($id);


        return view('InstructorViews/instructorProfile',['account'=>$account]);
    }

    public function updateInstructor(Request $request, $id)
    {

        //Validate request
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'personalemail'=>'required|email',
        ]);


        $account = account::findOrFail($id);
        $account->first_name = $request->firstname;
        $account->last_name = $request->lastname;
        //new employee ID field
        $account->employee_id = $request->employee_id;
        $account->personal_email = $request->personalemail;
        $account->school_email = $request->collegeemail;
        $account->contact_number = $request->phone;

        $save = $account->save();

        if($save){
            print('it worked');
            return redirect()->route('instructors.index')->with('success', 'Account has been updated');
        } else {
            print('it broke');
            return redirect()->route('instructors.index')->with('fail', 'Something went wrong');
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Destroy just for production use
    public function destroy($id)
    {
        $account = account::where('id', '=', $id)->first();
        $delete = $account->delete();


        if($delete){
            print('it worked');
            return back()->with('success', 'Account has been deleted');
        } else {
            print('it broke');
            return back()->with('fail', 'Something went wrong');
        }
    }
}
