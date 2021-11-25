<?php
namespace App\services;
use App\Utlity;

class ImageServices
{

    protected $request;

    public function __construct()
    {
        $this->request = app('request');
    }

    public function imageStore($name)
    { 
        $path =[];
        if ($this->request->hasFile('img')){
            $path['image'] = Utlity::file_upload($this->request,'img',$name.'_Photo');
        }
        else {
            $path['image'] = null;
        }

        return $path;
    }

    public function imageUpdate($category, $name)
    {
        $path =[];
        if($this->request->hasFile('img')){
            if(file_exists($category->image)){
                unlink($category->image);
            }
            $path['image'] = Utlity::file_upload($this->request,'img', $name.'_Photo');
        }else{
            $path['image']=[];
        }

        return  $path;
    }
}
