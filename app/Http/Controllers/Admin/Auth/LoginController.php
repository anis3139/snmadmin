<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{


    function login()
    {
        //Server ip
        $UserIP = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");
        Visitor::insert(['ip_address' => $UserIP, 'visit_time' => $timeDate]);
        //Server ip
        return view('admin.auth.login');
    }

    function onLogin(Request $request)
    {

        $validator = Validator::make(request()->all(), [
            'email' => 'required',
            'password' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $credentials = $request->only('password');

        if (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL) !== FALSE) {
            $credentials['email'] = $request->get('email');
        }else{
            $credentials['username'] = $request->get('eamil');
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            if (Auth::guard('admin')->user()->status != 1) {
                auth::guard('admin')->logout();
                return redirect()->back()->withInput()->with('warning', 'You are not active user.');
            } else {
                $request->session()->regenerate();
                return redirect()->route('home')->with('success', 'Login successfull');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'These credentials do not match our records.');
        }


    }


    function onLogout(Request $request)
    {
        auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

}
