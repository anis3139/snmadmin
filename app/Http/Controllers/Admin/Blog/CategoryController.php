<?php

namespace App\Http\Controllers\Admin\Blog;
use App\Http\Controllers\BaseController;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Utlity;

class CategoryController extends BaseController
{


    public function index(){
        return view('admin.pages.category.index', [
            'prefixname' => 'Admin',
            'title' => 'Category List',
            'page_title' => 'Category List',
            'categories' => Category::latest()->get(),
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function create(){
        return view('admin.pages.category.create', [
            'prefixname' => 'Admin',
            'title' => 'Category Create',
            'page_title' => 'Category Create',
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function store(CategoryStoreRequest $request, Category $category){

        //upload photo
        if ($request->hasFile('img')){
            $path['image'] = Utlity::file_upload($request,'img','Category_Photo');
        }
        else {
            $path['image'] = null;
        }

        $data =array_merge($path, $request->only('nameBn','nameEn', 'description', 'status'));
        if ($category->create($data)) {
            return redirect()->route('category.index')->with('success', 'Data Added successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function show(Category $category){
        return view('admin.pages.category.edit', [
            'prefixname' => 'Admin',
            'title' => 'Category Show',
            'page_title' => 'Category Edit',
            'category' => $category,
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function edit(Category $category){
        return view('admin.pages.category.edit', [
            'prefixname' => 'Admin',
            'title' => 'Category Edit',
            'page_title' => 'Category Edit',
            'category' => $category,
        ]);
    }

    public function update(CategoryUpdateRequest $request,Category $category){


        if($request->hasFile('img')){
            if(file_exists($category->image)){
                unlink($category->image);
            }
            $path['image'] = Utlity::file_upload($request,'img','Category_Photo');
        }else{
            $path['image']=null;
        }

        $data =array_merge($path, $request->only('nameBn','nameEn', 'description', 'status'));
        if ($category->update($data)) {
            return redirect()->route('category.index', $category->id)->with('success', 'Data Updated successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on update');
    }

    public function destroy(Category $category){
        if(file_exists($category->image)){
            unlink($category->image);
        }
        if($category->delete()){
            return redirect()->route('category.index')->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on deleting');

    }
}
