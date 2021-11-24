<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Config\Curl;
use App\Models\Admin;
use App\View\Components\FlashMessages;
use Rap2hpoutre\FastExcel\FastExcel;
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


	public function prints(Request $request)
    {
        $admin=Admin::all();
        $action=$request->action;
		if($admin){
			return view('admin.common.print',compact('admin', 'action'));
		}
		else{
			return view('admin.pages.notfound');
		}
    }


	public function sampleFileDownload(Request $req)
    {
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

                                $admin=Admin::create([
									'name' => $line['Name'],
									'email' => $line['Email'],
									'phone' => $line['Phone'],
									'username' => $username,
									'password' => bcrypt($line['Password']),
									'status' => $line['Status']
								]);
                                if ($admin) {
                                    $admin->assignRole( $line['Role']);
                                }
							}
						}


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
					foreach (Admin::cursor() as $admin) {
						$arrayval = array(
							'Name' => $admin->name,
							'Phone' => $admin->phone,
							'Email' => $admin->email,
							'Username' => $admin->username,
							'Status' => $admin->status,
							'Role' => $admin->getRoleNames()[0],
						);
						yield $arrayval;
					}
				}
				return (new FastExcel(usersGenerator()))->download('admin_'.date('Y-m-d H-m-i').'.'.$extension);
			}


    }
}
