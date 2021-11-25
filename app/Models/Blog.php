<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function subcategory(){
        return $this->belongsTo('App\Models\Subcategory');
    }
    public function tags(){
        return $this->belongsToMany('App\Models\Tag', 'blog_tag', 'blog_id', 'tag_id')->withTimestamps();;
    }



}
