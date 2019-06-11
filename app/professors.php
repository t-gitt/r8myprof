<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ratings;

class professors extends Model
{
    //
         public function ratings(){
    return $this->hasMany("\App\ratings");
  }
}
