<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'author',
        'img_path',
        'publication_date'
    ];

    // DB relationships
    public function infoPost()
    {
        return $this->hasOne('App\InfoPost');
    }
}
