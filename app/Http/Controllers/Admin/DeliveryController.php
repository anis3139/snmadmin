<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Utlity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeliveryController extends Controller
{
    public function index(){
        return view('admin.pages.delivery.index');
    }
 
    public function tracking(){
        return view('admin.pages.delivery.tracking');
    }
}
