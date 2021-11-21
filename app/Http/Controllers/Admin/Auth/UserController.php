<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Config\Curl;
use Illuminate\Http\Request;
use App\View\Components\FlashMessages;



class UserController extends Controller
{
	use FlashMessages;	
   
    public function index(Curl $curl)
    {
		$getResponse = $curl->send('GET','admin','', '','display');		
		if($getResponse->success){
			return view('admin.pages.users.index',compact('getResponse'));
		}
		else{
			return view('admin.pages.notfound');
		}
    }
    public function create()
    {
            return view('admin.pages.users.create', [
                'prefixname' => 'Admin',
                'title' => 'User Create',
                'page_title' => 'User Create',
                'roles' => Role::all(),
            ]);
    }

    public function store(Request $request, Curl $curl)
    {
        $data = $request->all();		
        $getResponse = $curl->send('POST','admin', '', $data,'insert');
        if ($getResponse) {
			self::message('success', 'Data Added successfully Done');
            return redirect()->route('user.index');
        }
        
		self::message('error', 'Data failed on create');
        return redirect()->back();
    }

    public function edit($id, Curl $curl)
    {

        //if (Auth::user()->hasRole(['Admin'])) {
			$getResponse = $curl->send('GET','admin', $id,'','display');
            return view('admin.pages.users.edit', [
                'prefixname' => 'Admin',
                'title' => 'User Create',
                'page_title' => 'User Create',
                'user' => $getResponse->data,
                'roles' => Role::all(),
            ]);
        /*} else {
            abort(401, 'Unauthorized Error');
        }*/
    }
    public function update(Curl $curl, Request $request, $id)
    {
        $data = $request->all();		
        $getResponse = $curl->send('POST','admin/update', $id, $data,'update');
        if ($getResponse) {
			self::message('success', 'Data Updated successfully Done');
            return redirect()->route('user.index');
        }
		self::message('error', 'Data failed on update');
        return redirect()->back();
    }
	
	
	public function show($id, Curl $curl)
    {
        $getResponse = $curl->send('GET','admin', $id,'','display');
            return view('admin.pages.users.details', [
                'prefixname' => 'Admin',
                'title' => 'User Create',
                'page_title' => 'User Create',
                'user' => $getResponse->data,
                'roles' => Role::all(),
            ]);
    }
    public function destroy($id, Curl $curl)
    {		
        $getResponse = $curl->send('DELETE','admin', $id, '','delete');
        if ($getResponse) {
			self::message('success', 'Data Deleted successfully Done');
            return redirect()->route('user.index');
        }
		self::message('error', 'Data failed on update');
        return redirect()->back();
    }
}
