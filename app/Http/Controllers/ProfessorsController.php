<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\professors;
use \App\University;
use \App\Course;
use \App\ratings;

class ProfessorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function search(Request $request){

        $searchTerm = $request->input('query');

        $professors = professors::query()
        ->where('f_name', 'LIKE', "%{$searchTerm}%")
        ->orwhere('l_name','LIKE', "%{$searchTerm}%")->get();
          $data = [
            'professors' => $professors,
            'searchTerm' => $searchTerm,
        ]; 
        return view('professors.list')->with($data);

    }
    public function filter(Request $request){
        $filter = $request->input('filter');
        $keyword = trim($request->input('keyword'));

        if ($filter == 'university') {
            $universities = University::query()
            ->where('abrv', 'LIKE', "%{$keyword}%")
            ->orwhere('name', 'LIKE', "%{$keyword}%")->pluck('id')->toArray();;
            if (!empty($universities)) {
                foreach ($universities as $university) {
                $professors = professors::query()->orwhere('university_id', 'LIKE', "%{$university}%");
                }
                $professors = $professors->paginate(10);
                  $data = [
                    'professors' => $professors,
                    'keyword' => $keyword,
                ]; 
                return view('professors.list')->with($data);
            } else {
                  $data = [
                    'professors' => [],
                    'keyword' => $keyword,
                ]; 
                return view('professors.list')->with($data);
            }

        } elseif ($filter == 'professor') {
            $professors = professors::query()
            ->where('f_name', 'LIKE', "%{$keyword}%")
            ->orwhere('l_name','LIKE', "%{$keyword}%")->paginate(10);
              $data = [
                'professors' => $professors,
                'keyword' => $keyword,
            ]; 
            return view('professors.list')->with($data);

        } elseif ($filter == 'country') {
            $universities = University::query()
            ->where('country', 'LIKE', "%{$keyword}%")->pluck('id')->toArray();;
            if (!empty($universities)) {
                foreach ($universities as $university) {
                $professors = professors::query()->orwhere('university_id', 'LIKE', "%{$university}%");
                }
                $professors = $professors->paginate(10);
                  $data = [
                    'professors' => $professors,
                    'keyword' => $keyword,
                ]; 
                return view('professors.list')->with($data);
            } else {
                  $data = [
                    'professors' => [],
                    'keyword' => $keyword,
                ]; 
                return view('professors.list')->with($data);
            }
        } 


    }

    public function list(){

    }
    public function index()
    {
        //
       $professors = professors::paginate(5);
       $ratings = ratings::all();
       $data = [
        'professors' => $professors,
        'ratings' => $ratings,
        ];
       return view('professors.list')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::check()) {
            if (Auth::user()->email_verified_at != NULL) {
               $professors = professors::all();
               $universities = University::all();
               $courses = Course::all();
              $data = [
                    'professors' => $professors,
                    'universities' => $universities,
                    'courses' => $courses,
                ]; 
               return view('professors.add')->with($data);
            }
           return redirect('/email/verify');
        }
       return redirect('/login')->with('success', 'You need to login to add a new professor');


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
        $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'titles' => 'required',
            'university' => 'required',
            'prof_pic' => 'image|nullable|max:1999',
        ]);

        // Handle file upload
        if(($request)->hasFile('prof_pic')){
            // Get filename with the extension
            $filenameWithExt = $request->file('prof_pic')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('prof_pic')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload file
            $path = $request->file('prof_pic')->storeAs('public/prof_pics', $fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        

        // Create Professor
        $professor = new professors;
        $professor->titles = $request->input('titles');
        $professor->f_name = $request->input('f_name');
        $professor->l_name = $request->input('l_name');
        $professor->url = $request->input('url');
        $professor->university_id = $request->input('university');
        $professor->prof_pic = $fileNameToStore;
        $professor->save();
        return redirect('/professors')->with('success', 'Professor added');
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
        $professor = professors::find($id);
        $ratings = ratings::paginate(5)->where('prof_id', $id);

        // get ratings sum
        $pcharacterSum = $ratings->sum('pcharacter_rating');
        $pteachingSum = $ratings->sum('pteaching_rating');
        $pmasterySum = $ratings->sum('pmastery_rating');

        // calculate weight average of sum (teaching = .4 | character/mastery = .3)
        $pcharacterWAvg = $pcharacterSum * 0.35;
        $pteachingWAvg = $pteachingSum * 0.4;
        $pmasteryWAvg = $pmasterySum * 0.25;

        //total weighted average sum
        $overallRating = ($pcharacterWAvg + $pteachingWAvg + $pmasteryWAvg) / count($ratings);





        $data = [
            'professor' => $professor,
            'ratings' => $ratings,
            'overallRating' => $overallRating,
         ];
        return view('professors.show')->with($data);
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
