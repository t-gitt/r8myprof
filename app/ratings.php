<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ratings extends Model
{
    //
    public function getProfRatings($prof_id){
    	$avgRating = ratings::avg('rating')->where('prof_id', $prof_id);
    	return $avgRating;
    }

    public function getUserRatings($user_id){
    	$userRatings = ratings::where('student_id', $user_id)->get(); 
    	return $userRatings;
    	
    }
       public function user(){
      return $this->belongsTo("User");
    }

      public function professors(){
      	return $this->belongsTo('App\professors', 'prof_id');
      }

}
