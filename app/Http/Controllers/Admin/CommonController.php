<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Config\Curl;
use App\View\Components\FlashMessages;
use Rap2hpoutre\FastExcel\FastExcel;

use App\Models\Admin;
use App\Models\Partner;
use Validator;

class CommonController extends Controller
{

	use FlashMessages;
	
    public function destroy(Request $request, Curl $curl)
    {
		$api = $request->api;
		$id  = $request->id;
		$type = $request->deletetype;
		
		if($type=='single'){
			$getResponse = $curl->send('DELETE',$api, $id, '','delete');
			if ($getResponse->success) {
				return $id;
			}
			else{
				echo 0;
			}
		}
    }
	
	
	public function prints(Request $request, Curl $curl)
    {
		$api = $request->api;
		$action = $request->action;
		$getResponse = $curl->send('GET',$api,'', '','display');		
		if($getResponse->success){
			return view('admin.common.print',compact('getResponse','action','api'));
		}
		else{
			return view('admin.pages.notfound');
		}
    }
	
	
	public function sampleFileDownload(Request $req)
    {
		//$getFile = base64_decode($req->filenames);
		$getFile = $req->file_names.'.csv';		
    	$filePath = public_path("samplefiles/".$getFile);		
    	$headers = ['Content-Type: application/csv'];
    	return response()->download($filePath, $getFile, $headers);
    }
	
	
	public function import(Request $req)
    {
		if ($req->hasFile('importfile')) {
			$validator = Validator::make(
			  [
				  'file'      => $req->importfile,
				  'extension' => strtolower($req->importfile->getClientOriginalExtension()),
			  ],
			  [
				  'file'          => 'required',
				  'extension'      => 'required|in:csv,xlsx,xls',
			  ]
			);
	
			$file = $req->file('importfile');
			
			$file->move(public_path('import-directory'), $file->getClientOriginalName());
			
	
			$files = $file->getClientOriginalName();
			
			$filename = pathinfo($files, PATHINFO_FILENAME);
			$extension = pathinfo($files, PATHINFO_EXTENSION);
			$importfiles = $filename.'.'.$extension;
			if($extension=='csv' || $extension=='xlsx' || $extension=='xls'){			
				$path = public_path('import-directory').'/'.$importfiles;	
				
				if($req->filetypes =='admin'){
					
					$users = (new FastExcel)->import($path, function ($line) {
					
						if($line['Email']!=""){
							$checkExist = Admin::where('email',$line['Email'])->first();
							if($checkExist==''){
								if($line['Username']!=""){						
									$username = implode('-',explode(' ',$line['Username']));
								}
								elseif($line['Email']!=""){	
									list($first,$second) = explode('@',$line['Email']);
									$username = $first;
								}
								else{
									$username = '';
								}
								
								Admin::create([
									'name' => $line['Name'],
									'email' => $line['Email'],
									'phone' => $line['Phone'],
									'username' => $username,
									'password' => bcrypt($line['Password']),
									'present_address' => $line['Present Address'],
									'permanent_address' => $line['Permanent Address'],
									'facebook' => $line['Facebook'],
									'twitter' => $line['Twitter'],
									'linkedin' => $line['Linkedin'],
									'github' => $line['Github'],
									'status' => $line['Status']
								]);
							}
						}
						
						
					});
				}
				elseif($req->filetypes =='partner'){
					$users = (new FastExcel)->import($path, function ($line) {
						Partner::create([
							'name' => $line['Name'],
							'email' => $line['Email'],
							'contract_number' => $line['Mobile'],
							'district_id' => $districtid,
							'area_id' => $areaid,
							'address' => $line['Address'],
						]);
					});
				}	
				return redirect()->back();		
			}
			else{
				return redirect()->back()->with('error','Please select excel or csv file only');
			}
		}
		else{
			return redirect()->back()->with('error','Please select excel file');
		}
    }
	
	
	public function export(Request $req)
    {
		$type = $req->type;
		$extension = $req->extension;
			
			if($type=='admin'){
				function usersGenerator() {
					foreach (Admin::cursor() as $user) {					
						$arrayval = array(					
							'Name' => $user->name,
							'Mobile' => $user->contract_number,
							'Email' => $user->email,
							'Present Address' => $user->present_address,
							'Permanent Address' => $user->permanent_address,
							'Status' => $user->status,
						);
						yield $arrayval;
					}
				}	
				return (new FastExcel(usersGenerator()))->download('admin_'.date('Y-m-d H-m-i').'.'.$extension);			
			}
			elseif($type=='partner'){
				function usersGenerator() {
					foreach (Partner::cursor() as $user) {
						$arrayval = array(					
							'Name' => $user->name,
							'Username' => strtoupper($user->username),
							'Email' => $user->email,
							'Mobile' => $user->mobile,
							'Location' => $user->location,
							'NID' => $user->nid,
						);
						yield $arrayval;
					}
				}	
				return (new FastExcel(usersGenerator()))->download('partner_'.date('Y-m-d H-m-i').'.'.$extension);
			}			
			
    }
}
