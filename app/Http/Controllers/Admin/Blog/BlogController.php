<?php

namespace App\Http\Controllers\Admin\Blog;
use App\Http\Controllers\BaseController;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Subcategory;
use App\Models\Tag;
use App\services\ImageServices;
use App\Utlity;
use Illuminate\Http\Request;

class BlogController extends BaseController
{

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('blog.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any blog !');
        }
        return view('admin.pages.blog.list', [
            'prefixname' => 'Admin',
            'title' => 'Blog List',
            'page_title' => 'Blog List',
            'blogs' => Blog::latest()->get(),
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function create()
    {

        if (is_null($this->user) || !$this->user->can('blog.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any blog !');
        }
        return view('admin.pages.blog.create', [
            'prefixname' => 'Admin',
            'title' => 'Blog Create',
            'page_title' => 'Blog Create',
            'categories' => Category::where('status', 1)->get(),
            'subcategories' => Subcategory::where('status', 1)->get(),
            'tags' => Tag::where('status', 1)->latest()->get(),
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function store(BlogStoreRequest $request, Blog $blog, ImageServices $imageServices)
    {

        if (is_null($this->user) || !$this->user->can('blog.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any blog !');
        }
        $dataImg=$imageServices->imageStore('blog');

        $postData=$request->only('category_id','subcategory_id','title','titleEn','description','descriptionEn','status');

        $data= array_merge($dataImg,$postData);
        $result= $blog->create($data);

        if ($result) {
            $result->tags()->attach($request->tags);
            return redirect()->route('blog.index')->with(['success' => 'Data Added successfully Done']);
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function view($id)
    {
        if (is_null($this->user) || !$this->user->can('blog.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any blog !');
        }
        return view('admin.pages.blog.view', [
            'prefixname' => 'Admin',
            'title' => 'Blog View',
            'page_title' => 'Blog View',
            'blog' => Blog::findOrFail($id),
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('blog.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any blog !');
        }
        return view('admin.pages.blog.edit', [
            'prefixname' => 'Admin',
            'title' => 'Blog Edit',
            'page_title' => 'Blog Edit',
            'blog' => Blog::with('tags')->findOrFail($id),
            'categories' => Category::where('status', 1)->get(),
            'subcategories' => Subcategory::where('status', 1)->get(),
            'tags'=>Tag::where('status', 1)->latest()->get(),
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function update(BlogUpdateRequest $request, Blog $blog, ImageServices $imageServices)
    {

        if (is_null($this->user) || !$this->user->can('blog.update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any blog !');
        }
        $dataImg=$imageServices->imageUpdate($blog, 'blog');

        $data = array_merge($dataImg,$request->only('category_id','subcategory_id','title','titleEn','description','descriptionEn','status'));
        $result = $blog->update($data);

        if ($result) {
            $blog->tags()->sync($request->tags);
            return redirect()->route('blog.index', $blog->id)->with('success', 'Data Updated successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function destroy(Blog $blog)
    {

        if (is_null($this->user) || !$this->user->can('blog.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any blog !');
        }

        if (file_exists($blog->image)) {
            unlink($blog->image);
        }
        if ($blog->delete()) {
            $blog->tags()->detach($blog->tags);
            return redirect()->route('blog.index')->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on deleting');
    }
}
