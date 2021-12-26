<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function card(){
        return $this->belongsToMany('App\Models\Card', 'card_packege','card_id','package_id')->withTimestamps();
    }
}
