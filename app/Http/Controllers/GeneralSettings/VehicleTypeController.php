<?php

namespace App\Http\Controllers\GeneralSettings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Config\Curl;
use App\View\Components\FlashMessages;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 use FlashMessages;
	 
	 
	 public function index(Curl $curl)
    {
		$getResponse = $curl->send('GET','vehicleType','', '','display');	
		
		if($getResponse->success){
			//dd($getResponse->data);
			return view('general-settings.vehicletype.index',compact('getResponse'));
		}
		else{
			return view('admin.pages.notfound');
		}
    }
	
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Curl $curl)
    {
	   $request['status'] = 0;
       $data = $request->all();		
        $getResponse = $curl->send('POST','vehicleType', '', $data,'insert');
        if ($getResponse) {
			self::message('success', 'Data Added successfully Done');
            return redirect()->route('vehicle_type.index');
        }
        
		self::message('error', 'Data failed on create');
        return redirect()->back();
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Curl $curl, Request $request, $id)
    {
        $data = $request->all();
        $getResponse = $curl->send('POST','vehicleType/update', $id, $data,'update');
        if ($getResponse) {
			self::message('success', 'Data Updated successfully Done');
            return redirect()->route('vehicle_type.index');
        }
		self::message('error', 'Data failed on update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Curl $curl)
    {
        $getResponse = $curl->send('DELETE','vehicleType', $id, '','delete');
        if ($getResponse) {
			self::message('success', 'Data Deleted successfully Done');
            return redirect()->route('vehicle_type.index');
        }
		self::message('error', 'Data failed on update');
        return redirect()->back();
    }
}
