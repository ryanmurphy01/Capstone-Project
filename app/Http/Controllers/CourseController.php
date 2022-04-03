<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //function to get all courses matching the program, and the program details
    function index(Request $request, $id) {

        $search_text = $request->aCourseSearch;

        //if there is a search value provided
        if (!empty($search_text)) {
            //join the course and junction table, then match only courses linked to the record with the
            //id provided in the function
            $data = DB::table('courses')
            -> join('courses_programs', 'courses.id', '=', 'courses_programs.course_code')
            //for some reason, 2 of these checks are needed, this one blocks word match from other programs
            -> where('courses_programs.program_id', $id)
            //match the provided search in course code or name
            -> where('courses.course_name', 'LIKE', '%'.$search_text.'%')
            -> orWhere('courses.course_code', 'LIKE', '%'.$search_text.'%')
            //then match the program id, so it doesn't pull from other programs (this one blocks number match)
            -> where('courses_programs.program_id', $id)
            -> select('courses.*')
            -> get();
        }

        //otherwise only match courses with the right program ID
        else {
            //join the course and junction table, then match only courses linked to the record with the
            //id provided in the function
            $data = DB::table('courses')
            -> join('courses_programs', 'courses.id', '=', 'courses_programs.course_code')
            -> where('courses_programs.program_id', $id)
            -> select('courses.*')
            -> get();
        }

        $data2 = program::find($id);
        return view('AdminViews/adminCourses', ['courses'=>$data], ['programs'=>$data2]);
    }

    //Function to save new courses into the database
    function storeCourse(Request $request, $id){

        $request->validate([
            'courseName'=>'required',
            'courseCode'=>'required',
            'description'=>'required',
            'creditHours'=>'required|numeric'
        ]);

        //Insert into database
        $course = new course;
        $course->course_code = $request->courseCode;
        $course->course_name = $request->courseName;
        $course->description = $request->description;
        $course->credit_hours = $request->creditHours;
        $save = $course->save();

        DB::table('courses_programs')->insert([
            'course_code' => $course->id,
            'program_id' => $id

        ]);



        if($save){
            print('it worked');
            return back()->with('success', 'New Course has been added');
        } else {
            print('it broke');
            return back()->with('fail', 'Something went wrong');
        }
    }

    //double check this too
    function destroy($id){

        $course = course::where('id', '=', $id)->first();
        $delete = $course->delete();

        if($delete){
            print('it worked');
            return back()->with('success', 'Course has been deleted');
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
        $course = course::findOrFail($id);

        return view('AdminViews/adminEditCourse', ['course'=>$course]);
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
            'courseName'=>'required',
            'courseCode'=>'required',
            'description'=>'required',
            'creditHours'=>'required|numeric'
        ]);


        $data = DB::table('programs')
        -> join('courses_programs', 'programs.id', '=', 'courses_programs.program_id')
        -> where('courses_programs.course_code', $id)
        -> select('programs.*')
        -> get();



        $course = course::findOrFail($id);
        $course->course_code = $request->courseCode;
        $course->course_name = $request->courseName;
        $course->description = $request->description;
        $course->credit_hours = $request->creditHours;
        $save = $course->save();

        //TODO, temporary(?) redirects program hub instead
        if($save){
            print('it worked');
            return redirect()->route('courses', [$id => $data[0]->id])->with('success', 'Course has been updated');
        } else {
            print('it broke');
            return redirect()->route('courses', [$id => $data[0]->id])->with('fail', 'Something went wrong');
        }
    }
}
