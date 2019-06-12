<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ratings;
use University;

class professors extends Model
{
    //
         public function ratings(){
    return $this->hasMany("\App\ratings");
  }
      public function university(){
      	return $this->belongsTo('App\University', 'university_id');
      }
}
