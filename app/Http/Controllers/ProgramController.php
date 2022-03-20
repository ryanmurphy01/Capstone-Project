<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\program;

class ProgramController extends Controller
{

    function index(){
        $data = program::all();

        return view('AdminViews/adminPrograms', ['programs'=>$data]);
    }

    //duplicate function to give info to the instructor's page program drop down, change this too if you want Ryan
    function iDropdown(){
        $data = program::all();

        return view('InstructorViews/instructorCourses', ['programs'=>$data]);
    }


    //Function to save new programs into the database
    function store(Request $request){


        //Validate request
         $request->validate([
        'programCode'=>'required|min:4|max:4',
        'programName'=>'required'
        ]);

        //Insert into database
        $program = new program;
        $program->program_code = $request->programCode;
        $program->program_name = $request->programName;
        $save = $program->save();

        if($save){
            print('it worked');
            return back()->with('success', 'New Program has been added');
        } else {
            print('it broke');
            return back()->with('fail', 'Something went wrong');
        }
    }

    //Get all programs for the admin's view program page


    function destroy($id){

        $program = program::where('id', '=', $id)->first();
        $delete = $program->delete();

        if($delete){
            print('it worked');
            return back()->with('success', 'Program has been deleted');
        } else {
            print('it broke');
            return back()->with('fail', 'Something went wrong');
        }


    }
}
