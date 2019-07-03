<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\University;
use \App\professors;
use \App\Course;


class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::all();
        return view('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

       $universities = University::all();
      $data = [
            'universities' => $universities,
        ]; 
       return view('courses.create')->with($data);
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
        //
        try {
            
            $this->validate($request, [
            'university_id' => 'required',
            'code' => 'required',
            'name' => 'required',
        ]);
        // Create Course
        $course = new Course;
        $course->name = $request->input('name');
        $course->code = $request->input('code');
        $course->university_id = $request->input('university_id');
        $course->save();
        $prof_id = $request->input('prof_id');


        } catch(\Illuminate\Database\QueryException $ex){ 

            if (isset($prof_id)) {
                return redirect('/ratings/create/$prof_id')->with('success', 'This university already has a course with this code. Take a second look at your course\'s code. If you think there is a mistake');
            } else {
                return redirect('/professors')->with('success', 'This university already has a course with this code. Take a second look at your course\'s code. If you think there is a mistake, please contact us in the contact page.');
            }
        }
            if (isset($prof_id)) {
                return redirect('rating/create/'.$prof_id)->with('success', 'Course added');
            } else {
                return redirect('/professors');
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
    public function destroy($id)
    {
        //
    }
}
