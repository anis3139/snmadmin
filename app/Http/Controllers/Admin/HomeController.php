<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
		$admintype = base64_decode(Auth::user()->roles->pluck('name')[0]);

		switch($admintype){
			case 'superadmin':
				$page = 'dashboard/superadmin';
				break;
			case 'admin':
				$page = 'dashboard/admin';
				break;
			case 'editor':
				$page = 'dashboard/Editor';
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
        ]);
    }
}
