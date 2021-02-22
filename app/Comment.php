<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'author',
        'text',
        'post_id'
    ];
     // DB relationships
     public function post()
     {
         return $this->belongsTo('App\Post');
     }
}
