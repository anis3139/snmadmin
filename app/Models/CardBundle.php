<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardBundle extends Model
{
    use HasFactory;

    public  function card(){
        return $this->belongsToMany('App\Models\Blog', 'bundle_cards', 'card_id', 'bundle_id')->withTimestamps();
    }
}
