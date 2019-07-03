<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\ratings;
use App\professors;
use Auth;

class PagesController extends Controller
{
    //
    public function home(){
        $ratings = ratings::all();

        $professors = professors::paginate(5);
    	$data = [
    		'professors' => $professors,
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
