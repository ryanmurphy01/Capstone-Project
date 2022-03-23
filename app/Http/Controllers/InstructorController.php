<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\account;
use App\Models\AccountType;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('accounts')->where('status_id', 1)->get();
        $data2 = DB::table('user_types')->get();

        return view('AdminViews/adminViewInstructors', ['accounts'=>$data], ['accountTypes'=>$data2]);

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
            'collegeemail'=>'required|email',
            'password'=>'required|min:5',
            'phone'=>'required',
            'accounttype'=>'required'
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
        //
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
        //
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
