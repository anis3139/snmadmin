<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Config\Curl;
use App\View\Components\FlashMessages;

class PartnerController extends Controller
{

	use FlashMessages;

	public function index(Curl $curl)
    {
		$getResponse = $curl->send('GET','partner','', '','display');
		//dd($getResponse);
		if($getResponse->success){
			return view('admin.pages.partner.index',compact('getResponse'));
		}
		else{
			return view('admin.pages.notfound');
		}
    }

	public function create()
    {
            return view('admin.pages.partner.create', [
                'prefixname' => 'Partner',
                'title' => 'Partner Create',
                'page_title' => 'Partner Create'
            ]);
    }


    public function store(Request $request, Curl $curl)
    {
	   $request['status'] = 0;
       $data = $request->all();
        $getResponse = $curl->send('POST','partner', '', $data,'insert');
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
			$getResponse = $curl->send('GET','partner', $id,'','display');
            return view('admin.pages.partner.edit', [
                'prefixname' => 'Partner',
                'title' => 'Partner Create',
                'page_title' => 'Partner Create',
                'partner' => $getResponse->data,
            ]);
        /*} else {
            abort(401, 'Unauthorized Error');
        }*/
    }
    public function update(Curl $curl, Request $request, $id)
    {
        $data = $request->all();
        $getResponse = $curl->send('POST','partner/update', $id, $data,'update');
        if ($getResponse) {
			self::message('success', 'Data Updated successfully Done');
            return redirect()->route('user.index');
        }
		self::message('error', 'Data failed on update');
        return redirect()->back();
    }


	public function show($id, Curl $curl)
    {
        $getResponse = $curl->send('GET','partner', $id,'','display');
            return view('admin.pages.partner.details', [
                'prefixname' => 'Admin',
                'title' => 'User Create',
                'page_title' => 'User Create',
                'user' => $getResponse->data,
            ]);
    }
    public function destroy($id, Curl $curl)
    {
        $getResponse = $curl->send('DELETE','partner', $id, '','delete');
        if ($getResponse) {
			self::message('success', 'Data Deleted successfully Done');
            return redirect()->route('user.index');
        }
		self::message('error', 'Data failed on update');
        return redirect()->back();
    }
}
