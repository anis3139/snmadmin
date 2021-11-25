<?php

namespace App\Http\Controllers\Admin\Blog;
use App\Http\Controllers\BaseController;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\services\ImageServices;
use App\Utlity;

class CategoryController extends BaseController
{


    public function index(){
        if (is_null($this->user) || !$this->user->can('category.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any category !');
        }
        return view('admin.pages.category.index', [
            'prefixname' => 'Admin',
            'title' => 'Category List',
            'page_title' => 'Category List',
            'categories' => Category::latest()->get(),
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function create(){
        if (is_null($this->user) || !$this->user->can('category.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any category !');
        }
        return view('admin.pages.category.create', [
            'prefixname' => 'Admin',
            'title' => 'Category Create',
            'page_title' => 'Category Create',
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function store(CategoryStoreRequest $request, Category $category, ImageServices $imageServices){
        if (is_null($this->user) || !$this->user->can('category.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any category !');
        }
        $path=$imageServices->imageStore('category');
        $data =array_merge($path, $request->only('nameBn','nameEn', 'description', 'status'));
        if ($category->create($data)) {
            return redirect()->route('category.index')->with('success', 'Data Added successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function show(Category $category){
        if (is_null($this->user) || !$this->user->can('category.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any category !');
        }
        return view('admin.pages.category.edit', [
            'prefixname' => 'Admin',
            'title' => 'Category Show',
            'page_title' => 'Category Edit',
            'category' => $category,
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function edit(Category $category){
        if (is_null($this->user) || !$this->user->can('category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any category !');
        }
        return view('admin.pages.category.edit', [
            'prefixname' => 'Admin',
            'title' => 'Category Edit',
            'page_title' => 'Category Edit',
            'category' => $category,
        ]);
    }

    public function update(CategoryUpdateRequest $request,Category $category, ImageServices $imageServices){
        if (is_null($this->user) || !$this->user->can('category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any category !');
        }
        $path=$imageServices->imageUpdate($category, 'category');
        $data =array_merge($path, $request->only('nameBn','nameEn', 'description', 'status'));
        if ($category->update($data)) {
            return redirect()->route('category.index', $category->id)->with('success', 'Data Updated successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on update');
    }

    public function destroy(Category $category){
        if (is_null($this->user) || !$this->user->can('category.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any category !');
        }
        if(file_exists($category->image)){
            unlink($category->image);
        }
        if($category->delete()){
            return redirect()->route('category.index')->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on deleting');

    }
}
