<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    public  function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function getFullNameAttribute()
    {
        return $this->nameBn . ' ' .'('. $this->nameEn .')';
    }

    public  function news(){
        return $this->hasMany('App\Models\News');
    }
}
