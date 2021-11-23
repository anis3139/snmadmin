<?php

namespace App\Http\Controllers\Admin\Blog;
use App\Http\Controllers\BaseController;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use App\Utlity;
use Illuminate\Http\Request;

class SubCategoryController extends BaseController
{
    protected $enumStatuses = [
        'Inactive', 'Active'
    ];

    public function index(){
        return view('admin.pages.sub_category.index', [
            'prefixname' => 'Admin',
            'title' => 'Sub Category List',
            'page_title' => 'Sub Category List',
            'subcategories' => Subcategory::latest()->get(),
            'enumStatuses' => $this->enumStatuses,
        ]);
    }

    public function create(){
        return view('admin.pages.sub_category.create', [
            'prefixname' => 'Admin',
            'title' => 'Sub Category Create',
            'page_title' => 'Sub Category Create',
            'categories' => Category::where('status', 1)->latest()->get(),
            'enumStatuses' => $this->enumStatuses,
        ]);
    }

    public function store(SubCategoryRequest $request){



        //upload photo
        if ($request->hasFile('img')){
            $path = Utlity::file_upload($request,'img','subCategory_Photo');
        }
        else {
            $path = null;
        }
        $category = new Subcategory();
        $category->category_id = $request->get('category_id');
        $category->nameBn = $request->get('nameBn');
        $category->nameEn = $request->get('nameEn');
        $category->description = $request->get('description');
        $category->image = $path;
        $category->status = $request->status;
        if ($category->save()) {

            return redirect()->route('subcategory.index')->with('success', 'Data Added successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function edit($id){
        return view('admin.pages.sub_category.edit', [
            'prefixname' => 'Admin',
            'title' => 'SubCategory Edit',
            'page_title' => 'SubCategory Edit',
            'category' => Subcategory::findOrFail($id),
            'maincategories' => Category::where('status', 1)->get(),
            'enumStatuses' => $this->enumStatuses,
        ]);
    }

    public function update(SubCategoryRequest $request, $id){


        $category = Subcategory::findOrFail($id);
        $category->category_id = $request->get('category_id');
        $category->nameBn = $request->get('nameBn');
        $category->nameEn = $request->get('nameEn');
        $category->description = $request->get('description');
        $path = null;
        if($request->hasFile('img')){
            if(file_exists($category->image)){
                unlink($category->image);
            }
            $path = Utlity::file_upload($request,'img','subCategory_Photo');
            $category->image = $path;
        }
        $category->status = $request->status;
        if ($category->save()) {

            return redirect()->route('subcategory.index', $category->id)->with('success', 'Data Updated successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on update');
    }

    public function destroy($id){
        $category = Subcategory::findOrFail($id);
        if(file_exists($category->image)){
            unlink($category->image);
        }
        if($category->delete()){

            return redirect()->route('subcategory.index')->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on deleting');

    }

    public function ajaxGetData(Request $request){
        if($request->ajax()){
            $subcat = Subcategory::where('id',$request->id)->pluck('image')->first();
            return response()->json($subcat);
        }
    }
}
