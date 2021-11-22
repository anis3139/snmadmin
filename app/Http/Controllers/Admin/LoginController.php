<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    function login()
    {
        return view('admin.auth.login');
    }

    function onLogin(Request $request)
    {


        $credentials = $request->only('password');

        if (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL) !== FALSE) {
            $credentials['email'] = $request->get('email');
        }else{
            $credentials['username'] = $request->get('eamil');
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            if (Auth::guard('admin')->user()->status != 1) {
                auth::guard('admin')->logout();
                return 0;
            } else {
                $request->session()->regenerate();
                return redirect()->route('admin.index')->with('success', 'Login successfull');
            }
        } else {
            return redirect()->back()->withInput()->with('failed', 'These credentials do not match our records.');
        }


    }


    function onLogout(Request $request)
    {
        auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

}
