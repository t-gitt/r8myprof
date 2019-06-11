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
    	$user_id = 1;
    	$rating = new ratings();

        $professors = professors::all();
    	$userRatings= $rating->getUserRatings($user_id);
    	$data = [
    		'userRatings' => $userRatings,
    		'professors' => $professors,
    	];
    	return view('home')->with($data);
    }
}
