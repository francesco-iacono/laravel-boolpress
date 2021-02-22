<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPost extends Model
{
    protected $fillable = [
        'post_status',
        'comment_status',
        'post_id'
    ];

       // DB relationships
       public function post()
       {
           return $this->belongsTo('App\Post');
       }
}
