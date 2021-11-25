<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\SettingsRequest;
use App\Models\Category;
use App\Models\Setting;
use App\Utlity;
use Spatie\Permission\Models\Role;

class SettingController extends BaseController

{


    public function index(){
        if (is_null($this->user) || !$this->user->can('setting.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Setting !');
        }
        return view('admin.pages.setting.index', [
            'prefixname' => 'Admin',
            'title' => 'Site Setting',
            'page_title' => 'Site Setting',
            'setting' => Setting::first()
        ]);
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('setting.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any Setting !');
        }
            return view('admin.pages.setting.create', [
                'prefixname' => 'Admin',
                'title' => 'General Setting',
                'page_title' => 'General Setting',
                'roles' => Role::all(),
                'enumStatuses' => $this->enumStatuses,
            ]);


    }

    public function store(SettingsRequest $request){

        if (is_null($this->user) || !$this->user->can('setting.store')) {
            abort(403, 'Sorry !! You are Unauthorized to store any Setting !');
        }
        //upload photo
        if ($request->hasFile('logo')){
            $logo = Utlity::file_upload($request,'logo','site_logo');
        }
        else {
            $logo = null;
        }
        if ($request->hasFile('default_image')){
            $default_image = Utlity::file_upload($request,'default_image','default_image');
        }
        else {
            $default_image = null;
        }

        $setting = new Setting();
        $setting->site_name = $request->get('site_name');
        $setting->site_title = $request->get('site_title');
        $setting->phone = $request->get('phone');
        $setting->email = $request->get('email');
        $setting->copyright = $request->get('copyright');
        $setting->design_develop_by = $request->get('design_develop_by');
        $setting->logo = $logo;
        $setting->default_image = $default_image;
        if ($setting->save()) {

            return redirect()->route('setting.index')->with('success', 'Data Added successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function update(SettingsRequest $request, $id){

        if (is_null($this->user) || !$this->user->can('setting.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any Setting !');
        }

        $setting = Setting::find($id);
        $setting->site_name = $request->get('site_name');
        $setting->site_title = $request->get('site_title');
        $setting->phone = $request->get('phone');
        $setting->email = $request->get('email');
        $setting->copyright_message = $request->get('copyright_message');
        $setting->copyright_name = $request->get('copyright_name');
        $setting->copyright_url = $request->get('copyright_url');
        $setting->design_develop_by_text = $request->get('design_develop_by_text');
        $setting->design_develop_by_name = $request->get('design_develop_by_name');
        $setting->design_develop_by_url = $request->get('design_develop_by_url');
        $logo = null;
        if($request->hasFile('logo')){
            if(file_exists($setting->logo)){
                unlink($setting->logo);
            }
            $logo = Utlity::file_upload($request,'logo','site_logo');
            $setting->logo = $logo;
        }
        $default_image = null;
        if($request->hasFile('default_image')){
            if(file_exists($setting->default_image)){
                unlink($setting->default_image);
            }
            $default_image = Utlity::file_upload($request,'default_image','default_image');
            $setting->default_image = $default_image;
        }
        if ($setting->save()) {

            return redirect()->route('setting.index')->with('success', 'Data Updated successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }


}
