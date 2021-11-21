<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function subcategory(){
        return $this->belongsTo('App\Models\Subcategory');
    }
    public function tags(){
        return $this->belongsToMany('App\Models\Tag', 'news_tag', 'news_id', 'tag_id')->withTimestamps();;
    }



}
