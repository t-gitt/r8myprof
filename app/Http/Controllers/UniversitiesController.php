<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\University;
use \App\professors;
use \App\ratings;
use DB;

class UniversitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $universities = University::all();
        $data = [
            'universities' => $universities,
        ];
        return view('universities.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('universities.create');
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
            'name' => 'required',
            'abrv' => 'required',
            'url' => 'required',
            'country' => 'required',
        ]);
        // Create University
        $university = new University;
        $university->name = $request->input('name');
        $university->url = $request->input('url');
        $university->abrv = $request->input('abrv');
        $university->country = $request->input('country');
        $university->save();
        return redirect('/professors/create')->with('success', 'University added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $universities = University::find($id);
        $professors = DB::select('select * from professors where university_id = ?',[$id]);

        $data = [
         'professors' => $professors,
         'universities' => $universities,
         ];
        return view('universities.proflist')->with($data);
    
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

    public function searchCountry(Request $request){

        $searchTerm = $request->input('query');
        $universities = University::query()
        ->where('country', 'LIKE', "%{$searchTerm}%")->paginate(10);

          $data = [
            'universities' => $universities,
            'searchTerm' => $searchTerm,
        ]; 
        return view('universities.list')->with($data);

    }
}
