<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public  function news(){
        return $this->belongsToMany('App\Models\News', 'news_tag', 'tag_id', 'news_id')->withTimestamps();
    }
}
