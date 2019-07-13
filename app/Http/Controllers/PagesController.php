<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\ratings;
use \App\professors;
use \App\University;
use Auth;

class PagesController extends Controller
{
    //
    public function home(){
        $ratings = ratings::all();
        $universities = University::all();
        $professors = professors::orderBy('created_at', 'desc')->paginate(3);
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
