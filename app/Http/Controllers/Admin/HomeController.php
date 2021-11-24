<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('home.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Admin !');
        }

		$admintype = Auth::user()->roles->pluck('name')[0];

		switch($admintype){
			case 'superadmin':
				$page = 'dashboard/superadmin';
				break;
			case 'admin':
				$page = 'dashboard/admin';
				break;
			case 'editor':
				$page = 'dashboard/editor';
				break;
			case 'hr':
				$page = 'dashboard/hrm';
				break;
			case 'finance':
				$page = 'dashboard/finance';
				break;
			default:
				$page = 'dashboard/superadmin';
		}

        return view($page, [
            'prefixname' => 'Admin',
            'title' => 'Dashboard',
            'page_title' => 'Dashboard',
            'user' => User::count(),
            'notifications' => Auth::user()->notifications,
            'visitor' => Visitor::count(),
        ]);
    }
}
