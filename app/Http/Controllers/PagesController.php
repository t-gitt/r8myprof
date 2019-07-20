<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\ratings;
use \App\professors;
use \App\University;
use Auth;
use DB;

class PagesController extends Controller
{
    //
    public function home(){
        $ratings = ratings::all();
        $universities = University::all();
       $professors = professors::withCount(['ratings as average_rating' => function($query) {
            $query->select(DB::raw('coalesce(avg(poverall_rating),0)'));
            }])->orderByDesc('average_rating')->paginate(8);
    	$data = [
    		'professors' => $professors,
            'universities' => $universities,
            'ratings' => $ratings,
    	];
    	return view('home')->with($data);
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    public function privacy(){
        return view('privacy');
    }
    public function faq(){
        return view('faq');
    }
}
