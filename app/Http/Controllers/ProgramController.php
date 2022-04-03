<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\program;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{

    function index(Request $request) {

        $search_text = $request->aProgramSearch;

        //if there is a search value provided
        if (!empty($search_text)) {
            $data = DB::table('programs')
            -> where('programs.program_name', 'LIKE', '%'.$search_text.'%')
            -> orWhere('programs.program_code', 'LIKE', '%'.$search_text.'%')
            -> select('programs.*')
            -> get();
        }
        //otherwise run the retrieve as usual
        else {
            $data = program::all();
        }

        return view('AdminViews/adminPrograms', ['programs'=>$data]);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = program::findOrFail($id);

        return view('AdminViews/adminEditProgram', ['program'=>$program]);
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
            'programCode'=>'required|min:4|max:4',
            'programName'=>'required'
        ]);


        $program = program::findOrFail($id);
        $program->program_code = $request->programCode;
        $program->program_name = $request->programName;
        $save = $program->save();

        if($save){
            print('it worked');
            return redirect()->route('programs.index')->with('success', 'Program has been updated');
        } else {
            print('it broke');
            return redirect()->route('programs.index')->with('fail', 'Something went wrong');
        }
    }

}
