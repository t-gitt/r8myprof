<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\ratings;
use \App\User;
use \App\Course;
use \App\professors;
use \App\University;
use Auth;

class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userRatings()
    {
        //
        $id = Auth::check()->id;
        $ratings = ratings::where('user_id', $id)->get();
        return view('ratings.list')->with('ratings', $ratings);

    }
    public function profRatings($prof_id)
    {
        //
        $prof_id = $prof_id;
        $ratings = ratings::where('prof_id', $prof_id)->get();
        return view('ratings.list')->with('ratings', $ratings);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($prof_id)
    {
        //
        $student_id = auth()->user()->id;
        $prof_id = $prof_id;
        $courses = Course::all();
        $universities = University::all();

        $data=[
            'courses' => $courses,
            'student_id' => $student_id,
            'prof_id' => $prof_id,
            'universities' => $universities,
        ];
        return view('ratings.create')->with($data);
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
