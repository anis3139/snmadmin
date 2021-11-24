<?php

namespace App\Http\Controllers\Admin\Blog;
use App\Http\Controllers\BaseController;
use App\Http\Requests\BlogRequest;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Subcategory;
use App\Models\Tag;
use App\Utlity;
use Illuminate\Http\Request;

class BlogController extends BaseController
{
    protected $enumStatuses = [
        'Inactive', 'Active'
    ];
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('role.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any role !');
        }
        return view('admin.pages.blog.list', [
            'prefixname' => 'Admin',
            'title' => 'Blog List',
            'page_title' => 'Blog List',
            'blogs' => Blog::latest()->get(),
            'enumStatuses' => $this->enumStatuses,
        ]);
    }

    public function create()
    {
        return view('admin.pages.blog.add', [
            'prefixname' => 'Admin',
            'title' => 'Blog Create',
            'page_title' => 'Blog Create',
            'categories' => Category::where('status', 1)->get(),
            'subcategories' => Subcategory::where('status', 1)->get(),
            'tags' => Tag::where('status', 1)->latest()->get(),
            'enumStatuses' => $this->enumStatuses,
        ]);
    }

    public function store(Request $request)
    {
        //upload photo
        if ($request->hasFile('img')) {
            $path = Utlity::file_upload($request, 'img', 'Blog_Photo');
        } else {
            $path = null;
        }
        $blog = new Blog();
        $blog->admin_id = auth()->user()->id;
        $blog->category_id = $request->get('category');
        $blog->subcategory_id = $request->get('subcategory');
        $blog->title = $request->get('title');
        $blog->titleEn = $request->get('titleEn');
        $blog->description = $request->get('description');
        $blog->descriptionEn = $request->get('descriptionEn');
        $blog->image = $path;
        if ($blog->save()) {
            $blog->tags()->attach($request->tags);
            return redirect()->route('blog.index')->with(['success' => 'Data Added successfully Done']);
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function view($id)
    {
        return view('admin.pages.blog.view', [
            'prefixname' => 'Admin',
            'title' => 'Blog View',
            'page_title' => 'Blog View',
            'blog' => Blog::findOrFail($id),
            'enumStatuses' => $this->enumStatuses,
        ]);
    }

    public function edit($id)
    {
        return view('admin.pages.blog.edit', [
            'prefixname' => 'Admin',
            'title' => 'Blog Edit',
            'page_title' => 'Blog Edit',
            'blog' => Blog::with('tags')->findOrFail($id),
            'categories' => Category::where('status', 1)->get(),
            'subcategories' => Subcategory::where('status', 1)->get(),
            'tags'=>Tag::where('status', 1)->latest()->get(),
            'enumStatuses' => $this->enumStatuses,
        ]);
    }

    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->admin_id = auth()->user()->id;
        $blog->category_id = $request->get('category');
        $blog->subcategory_id = $request->get('subcategory');
        $blog->title = $request->get('title');
        $blog->titleEn = $request->get('titleEn');
        $blog->description = $request->get('description');
        $blog->descriptionEn = $request->get('descriptionEn');
        $path = null;
        if ($request->hasFile('img')) {
            if (file_exists($blog->image)) {
                unlink($blog->image);
            }
            $path = Utlity::file_upload($request, 'img', 'Blog_Photo');
            $blog->image = $path;
        }
        $blog->status = $request->status;
        if ($blog->save()) {
            $blog->tags()->sync($request->tags);
            return redirect()->route('blog.index', $blog->id)->with('success', 'Data Updated successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

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
