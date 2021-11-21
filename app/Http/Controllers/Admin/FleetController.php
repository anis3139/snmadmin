<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Utlity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FleetController extends Controller
{
    public function index(){
        return view('admin.pages.fleet.index');
    }
 
    public function create(){
        return view('admin.pages.fleet.create');
    }
}
