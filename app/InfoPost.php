<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPost extends Model
{
       // DB relationships
       public function post()
       {
           return $this->belongsTo('App\Post');
       }
}
