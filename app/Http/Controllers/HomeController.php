<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
		$admintype = base64_decode($request->admintype);

		switch($admintype){
			case 'Super Admin':
				$page = 'dashboard/superadmin';
				break;
			case 'Admin':
				$page = 'dashboard/admin';
				break;
			case 'Driver':
				$page = 'dashboard/driver';
				break;
			case 'HRM':
				$page = 'dashboard/hrm';
				break;
			case 'Finance':
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
