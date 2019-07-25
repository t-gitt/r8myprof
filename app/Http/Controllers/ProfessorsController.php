<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\professors;
use \App\University;
use \App\Course;
use \App\ratings;
use DB;

class ProfessorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function search(Request $request){

        $searchTerm = $request->input('query');
        $universities = University::all();
        $professors = professors::query()
        ->where('f_name', 'LIKE', "%{$searchTerm}%")
        ->orwhere('l_name','LIKE', "%{$searchTerm}%")->paginate(8);

       $letter = 'all';
          $data = [
            'letter' => $letter,
            'professors' => $professors,
            'universities' => $universities,
            'searchTerm' => $searchTerm,
        ]; 
        return view('professors.list')->with($data);

    }


    public function filter(Request $request){

        $university = $request->input('university');
        $prof = $request->input('professor');
        $sort = $request->input('sort');
        $universities = University::all();


        if ($university == 'all') {
            $professors = professors::query()
            ->where('f_name', 'LIKE', "%{$prof}%")
            ->orwhere('l_name','LIKE', "%{$prof}%");
        }elseif ($prof == '') {
            $professors = professors::query()->where('university_id', $university);
        }else{
            $professors = professors::query()->where('university_id', $university)
            ->where('f_name', 'LIKE', "%{$prof}%")
            ->orwhere('l_name','LIKE', "%{$prof}%");

            }
        if ($sort == 'new') {
          $professors = $professors->orderBy('created_at', 'desc')->paginate(8);
        }elseif ($sort == 'old'){
          $professors = $professors->orderBy('created_at', 'asc')->paginate(8);
        }
        elseif ($sort == 'bestRate') {
            $professors = $professors->withCount(['ratings as average_rating' => function($query) {
            $query->select(DB::raw('coalesce(avg(poverall_rating),0)'));
            }])->orderByDesc('average_rating')->paginate(8);
        }elseif ($sort == 'lowestRate'){
            $professors = $professors->withCount(['ratings as average_rating' => function($query) {
            $query->select(DB::raw('coalesce(avg(poverall_rating),0)'));
            }])->orderBy('average_rating')->paginate(8);
        }

       $letter = 'all';
      $data = [
        'letter' => $letter,
        'professors' => $professors,
        'universities' => $universities,
        'prof' => $prof,
    ]; 
    return view('professors.list')->with($data);

    }

    public function letter($letter){
        $professors = professors::query()->where('f_name', 'LIKE', $letter.'%')->paginate(8);
       $ratings = ratings::all();
       $universities = University::all();
       $data = [
        'professors' => $professors,
        'letter' => $letter,
        'universities' => $universities,
        'ratings' => $ratings,
        ];
       return view('professors.list')->with($data);
    }
    public function index()
    {
        //
       $professors = professors::orderBy('created_at', 'desc')->paginate(8);
       $ratings = ratings::all();
       $universities = University::all();
       $letter = 'all';
       $data = [
        'professors' => $professors,
        'letter' => $letter,
        'universities' => $universities,
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
            'faculty' => 'required',
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
        $professor->faculty = $request->input('faculty');
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
        $ratings = ratings::where('prof_id', $id)->paginate(10);

        if(count($ratings) > 0){
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
        }else{

        $data = [
            'professor' => $professor,
            'ratings' => $ratings,
         ];

        return view('professors.show')->with($data);
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
