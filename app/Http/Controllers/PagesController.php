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
       $professors = professors::orderBy('created_at', 'desc')->paginate(8);
       $letter = 'all';
    	$data = [
    		'professors' => $professors,
            'letter' => $letter,
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
