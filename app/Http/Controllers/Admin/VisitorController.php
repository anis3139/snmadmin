<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\BaseController;
use App\Models\Visitor; 
use Illuminate\Support\Facades\Auth;

class VisitorController extends BaseController
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function VisitorIndex()
    {
        if (is_null($this->user) || !$this->user->can('visitor.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any visitor!');
        }
        $visitorData = json_decode(Visitor::orderBy('id','desc')->take(1000)->get(), true);
        return view('admin.components.Visitor', ['visitorData' => $visitorData]);
    }
}
