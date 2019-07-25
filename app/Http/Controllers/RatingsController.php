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
        $id = auth()->user()->id;
        $ratings = ratings::all()->where('student_id', $id);
        return view('ratings.user')->with('ratings', $ratings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($prof_id)
    {
        //
    if(Auth::check()){
            $student_id = auth()->user()->id;
            $prof_id = $prof_id;
            $professor = professors::find($prof_id);
            $courses = Course::all()->where('university_id', $professor->university['id']);

            $data=[
                'courses' => $courses,
                'student_id' => $student_id,
                'prof_id' => $prof_id,
                'professor' => $professor,
            ];
            return view('ratings.create')->with($data);
    }  
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
        try { 

            $pcharacterW = $request->input('pcharacter_rating') * 0.35;
            $pteachingW = $request->input('pteaching_rating') * 0.4;
            $pmasteryW = $request->input('pmastery_rating') * 0.25;
            $overallRating = $pcharacterW + $pteachingW + $pmasteryW;

            $this->validate($request, [
            'prof_id' => 'required',
            'student_id' => 'required',
            'course_id' => 'required',
            'course_rating' => 'required',
            'pteaching_rating' => 'required',
            'pcharacter_rating' => 'required',
            'pmastery_rating' => 'required',
        ]);
        // Create Rating
        $rating = new ratings;
        $rating->student_id = $request->input('student_id');
        $rating->prof_id = $request->input('prof_id');
        $rating->course_id = $request->input('course_id');
        $rating->course_rating = $request->input('course_rating');
        $rating->pteaching_rating = $request->input('pteaching_rating');
        $rating->pcharacter_rating = $request->input('pcharacter_rating');
        $rating->pmastery_rating = $request->input('pmastery_rating');
        $rating->poverall_rating = $overallRating;
        $rating->comment = $request->input('comment');
        $rating->save();
        return redirect("/professors/{$request->input('prof_id')}")->with('success', 'Rating added');
} catch(\Illuminate\Database\QueryException $ex){ 

        return redirect("/professors/{$request->input('prof_id')}")->with('success', 'Most likely you have already rated this professor. If you didn\'t, please contact us at r8myprof@gmail.com to help u solve this issue.');
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
        $rating = ratings::find($id);
        $prof_id = $rating->professors['id'];

        //    if(Auth::check()){
        $ratings = ratings::all()->where('prof_id', $prof_id)->where('student_id', Auth::id());
        if($rating->student_id == Auth::id()){
            $student_id = auth()->user()->id;
            $prof_id = $prof_id;
            $professor = professors::find($prof_id);
            $courses = Course::all()->where('university_id', $professor->university['id']);

            $data=[
                'courses' => $courses,
                'rating' => $rating,
                'student_id' => $student_id,
                'prof_id' => $prof_id,
                'professor' => $professor,
            ];
            return view('ratings.edit')->with($data);
        } else{
            return redirect('/professors/'.$prof_id)->with('success', 'One cannot edit what one did not create!')->with('rating', $rating);
        }

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
        $rating = ratings::find($id);
        if($rating->student_id == Auth::id()){
            try { 
                $this->validate($request, [
                'prof_id' => 'required',
                'student_id' => 'required',
                'course_id' => 'required',
                'course_rating' => 'required',
                'pteaching_rating' => 'required',
                'pcharacter_rating' => 'required',
                'pmastery_rating' => 'required',
                'comment' => 'required',
            ]);
            // Update Rating
            $rating = ratings::find($id);
            $rating->student_id = $request->input('student_id');
            $rating->prof_id = $request->input('prof_id');
            $rating->course_id = $request->input('course_id');
            $rating->course_rating = $request->input('course_rating');
            $rating->pteaching_rating = $request->input('pteaching_rating');
            $rating->pcharacter_rating = $request->input('pcharacter_rating');
            $rating->pmastery_rating = $request->input('pmastery_rating');
            $rating->comment = $request->input('comment');
            $rating->save();
            return redirect("/professors/{$request->input('prof_id')}")->with('success', 'Rating updated');
            } catch(\Illuminate\Database\QueryException $ex){ 

                return redirect("/professors/{$request->input('prof_id')}")->with('success', 'Most likely you have already rated this professor. If you didn\'t, please contact us at r8myprof@gmail.com to help u solve this issue.');
            }
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
        $rating = ratings::find($id);
        if($rating->student_id == Auth::id()){
            $rating = ratings::find($id);
            $rating->delete();
            return redirect('/professors/' . $rating->professors['id'])->with('success', 'Rating deleted');
        }
    }
}
