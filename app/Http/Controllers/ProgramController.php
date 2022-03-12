<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\program;

class ProgramController extends Controller
{
    //Function to save new programs into the database
    function saveProgram(Request $request){

        //had some trouble with this, double check if it's needed
        //Validate request
        // $request->validate([
        //     //might need to change these restrictions
        //     'program_code'=>'required|min:4|max:4',
        //     'program_name'=>'required'
        // ]);

        //Insert into database
        $program = new program;
        $program->program_code = $request->programCode;
        $program->program_name = $request->programName;
        $save = $program->save();

        if($save){
            print('it worked');
            return back()->with('success', 'New User has been added');
        } else {
            print('it broke');
            return back()->with('fail', 'Something went wrong');
        }
    }

    //Get all programs for the admin's view program page
    function indexPrograms(){
        $data = program::all();

        return view('AdminViews/adminPrograms', ['programs'=>$data]);
    }
}
