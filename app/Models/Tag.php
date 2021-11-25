<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public  function blog(){
        return $this->belongsToMany('App\Models\Blog', 'blog_tag', 'tag_id', 'blog_id')->withTimestamps();
    }
}
