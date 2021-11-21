<?php
namespace App\Config;

use App\Models\Setting;
use Illuminate\Support\Facades\Http;


class Curl
{

    /**
     * @param $method
     * @param $url
     * @param $data
     * @param string[] $headers
     * @return \stdClass
     */

	private $base_url;
	
	public function _construct($base_url){		
		$this->base_url = $base_url;
	}

    public function send($method, $url, $id, $data, $action, $headers = ["Content-Type" => "application/json"])
    {
		$setting = Setting::select('api_url')->first();
		if($id!=""){
			$baseurl = $setting->api_url.$url.'/'.$id;
		}
		else{
			$baseurl = $setting->api_url.$url;
		}
		
		
		
		if($action!='display'){
			$headers = array(
			   "Accept: application/json",
			   //"Authorization: Bearer {token}",
			);
		}
		//dd($baseurl);
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_URL, $baseurl);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		if($action!='display'){
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}

		 $response = curl_exec ($ch);
		 $err = curl_error($ch);
		 curl_close ($ch);
		 //dd($response);
		 return json_decode($response);
    }
}
