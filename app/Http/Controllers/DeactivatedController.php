<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\account;

class DeactivatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //extract the instructor to be matched from the request
        $search_text = $request->aDeactivatedSearch;

        if (!empty($search_text)) {
            $data = DB::table('accounts')
            //only retrieve records that are deactivated
            -> where('status_id', 2)
            //check if any of the fields in an account match the given input
            //need the 'use(varName)' to access variable outside the closure
            -> where(function ($query) use($search_text) {
            $query -> where('first_name', 'LIKE', '%'.$search_text.'%')
                -> orWhere('last_name', 'LIKE', '%'.$search_text.'%')
                -> orWhere('contact_number', 'LIKE', '%'.$search_text.'%')
                -> orWhere('personal_email', 'LIKE', '%'.$search_text.'%')
                -> orWhere('school_email', 'LIKE', '%'.$search_text.'%');
            })
            -> get();
        }
        //return all deactivated users if the search is returned empty
        else {
            $data = DB::table('accounts')->where('status_id', 2)->get();
        }

        return view('AdminViews/adminDeactivatedInstructors', ['accounts'=>$data]);

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
        //
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
            'collegeemail'=>'required|email',
            'phone'=>'required',
            'accounttype'=>'required'
        ]);


        $account = account::findOrFail($id);
        $account->first_name = $request->firstname;
        $account->last_name = $request->lastname;
        $account->personal_email = $request->personalemail;
        $account->school_email = $request->collegeemail;
        $account->contact_number = $request->phone;

        $save = $account->save();

        if($save){
            print('it worked');
            return redirect()->route('deactivated.index')->with('success', 'Account has been updated');
        } else {
            print('it broke');
            return redirect()->route('deactivated.index')->with('fail', 'Something went wrong');
        }

    }

    public function statusUpdate($id){
        $account = account::where('id', '=', $id)->first();

        if($account->status_id == '1'){

            $status = 2;
            $print = "Deactivated";

        } else {

            $status = 1;
            $print = "Reactivated";

        }

        $values = array('status_id' => $status);
        $update = DB::table('accounts')->where('id', $id)->update($values);

        if($update){
            print('it worked');
            return back()->with('success', "Account $print");
        } else {
            print('it broke');
            return back()->with('fail', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
