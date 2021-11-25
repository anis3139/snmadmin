<?php

namespace App\Http\Controllers\Admin\Blog;
use App\Http\Controllers\BaseController;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Requests\SubCategoryStoreRequest;
use App\Http\Requests\SubCategoryUpdateRequest;
use App\Models\Category;
use App\Models\Subcategory;
use App\services\ImageServices;
use App\Utlity;
use Illuminate\Http\Request;

class SubCategoryController extends BaseController
{


    public function index(){
        if (is_null($this->user) || !$this->user->can('category.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any category !');
        }
        return view('admin.pages.sub_category.index', [
            'prefixname' => 'Admin',
            'title' => 'Sub Category List',
            'page_title' => 'Sub Category List',
            'subcategories' => Subcategory::latest()->get(),
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function create(){
        if (is_null($this->user) || !$this->user->can('category.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any category !');
        }
        return view('admin.pages.sub_category.create', [
            'prefixname' => 'Admin',
            'title' => 'Sub Category Create',
            'page_title' => 'Sub Category Create',
            'categories' => Category::where('status', 1)->latest()->get(),
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function store(SubCategoryStoreRequest $request, Subcategory $subcategory, ImageServices $imageServices){
        if (is_null($this->user) || !$this->user->can('category.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any category !');
        }
        $path=$imageServices->imageStore($subcategory, 'subcategory');
        $data =array_merge($path, $request->only('category_id','nameBn','nameEn', 'description', 'status'));
        if ($subcategory->create($data)) {
            return redirect()->route('subcategory.index')->with('success', 'Data Added successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function edit(Subcategory $subcategory){
        if (is_null($this->user) || !$this->user->can('category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any category !');
        }
        return view('admin.pages.sub_category.edit', [
            'prefixname' => 'Admin',
            'title' => 'SubCategory Edit',
            'page_title' => 'SubCategory Edit',
            'category' => $subcategory,
            'maincategories' => Category::where('status', 1)->get(),
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function update(SubCategoryUpdateRequest $request, Subcategory $subcategory, ImageServices $imageServices){
        if (is_null($this->user) || !$this->user->can('category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any category !');
        }
        $path=$imageServices->imageUpdate($subcategory, 'subcategory');
        $data =array_merge($path, $request->only('category_id','nameBn','nameEn', 'description', 'status'));
        if ($subcategory->update($data)) {
            return redirect()->route('subcategory.index', $subcategory->id)->with('success', 'Data Updated successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on update');
    }

    public function destroy(Subcategory $subcategory){
        if (is_null($this->user) || !$this->user->can('category.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any category !');
        }
        if(file_exists($subcategory->image)){
            unlink($subcategory->image);
        }
        if($subcategory->delete()){
            return redirect()->route('subcategory.index')->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on deleting');

    }

    public function ajaxGetData(Request $request){
        if (is_null($this->user) || !$this->user->can('category.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any category !');
        }
        if($request->ajax()){
            $subcat = Subcategory::where('id',$request->id)->pluck('image')->first();
            return response()->json($subcat);
        }
    }
}
