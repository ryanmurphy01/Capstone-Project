<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\semester;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get semester History
        $data = semester::orderBy('created_at', 'DESC')->get();
        
        //Get current semester
        $data2 = DB::table('semesters')->where('current_semester', 1)->first();


        return view("AdminViews/adminSemester", ['semesters'=>$data], ['currentSemester'=>$data2]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("AdminViews/adminNewSemester");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'semesterName'=>'required',
            'semesterCode'=>'required'

        ]);

        $semester = new semester;
        $semester->code = $request->semesterCode;
        $semester->name = $request->semesterName;
        $semester->current_semester = 0;
        $save = $semester->save();

        if($save){
            return redirect()->route('semester.index')->with('success', 'New Semester Created');
        
        } else {
            return redirect()->route('semester.index')->with('fail', 'Something went wrong');
        }

        

    }

    public function makeCurrent($id, $currentid){

        //Find and change old semester
        if($id != $currentid){

            $oldSemester = DB::table('semesters')
            ->where('current_semester', 1)
            ->update(['current_semester' => 0]);
    
            $semester = DB::table('semesters')
            ->where('id', $id)
            ->update(['current_semester' => 1]);
            if($semester){
                return redirect()->route('semester.index')->with('success', 'Current Semester Changed');
            
            } else {
                
            }
    

        }  else {
            return redirect()->route('semester.index')->with('fail', 'This Semester is already set to current');
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
    public function destroy($id)
    {
        //
    }
}
