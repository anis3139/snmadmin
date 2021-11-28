<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public  function bundle(){
        return $this->belongsToMany('App\Models\BundleCard', 'bundle_cards', 'card_id', 'bundle_id')->withTimestamps();
    }

    public function packege(){
        return $this->belongsToMany('App\Models\Package', 'card_packege','card_id','package_id')->withTimestamps();
    }

}
