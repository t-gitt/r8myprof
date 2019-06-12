<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use professors;

class University extends Model
{
    //

         public function professors(){
    return $this->hasMany("\App\professors");
  }
}
