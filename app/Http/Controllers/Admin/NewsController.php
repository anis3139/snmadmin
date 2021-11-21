<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\Deviceinformation;
use App\Models\News;
use App\Models\Subcategory;
use App\Models\Tag;
use App\Utlity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.pages.news.list', [
            'prefixname' => 'Admin',
            'title' => 'News List',
            'page_title' => 'News List',
            'news' => News::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.pages.news.add', [
            'prefixname' => 'Admin',
            'title' => 'News Create',
            'page_title' => 'News Create',
            'categories' => Category::where('status', 1)->get(),
            'subcategories' => Subcategory::where('status', 1)->get(),
            'tags' => Tag::where('status', 1)->latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        //upload photo
        if ($request->hasFile('img')) {
            $path = Utlity::file_upload($request, 'img', 'News_Photo');
        } else {
            $path = null;
        }
        $news = new News();
        $news->user_id = Auth::user()->id;
        $news->category_id = $request->get('category');
        $news->subcategory_id = $request->get('subcategory');
        $news->title = $request->get('title');
        $news->titleEn = $request->get('titleEn');
        $news->description = $request->get('description');
        $news->descriptionEn = $request->get('descriptionEn');
        $news->image = $path;
        if ($news->save()) {
            $news->tags()->attach($request->tags);
            return redirect()->route('news.index')->with(['success' => 'Data Added successfully Done']);
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function view($id)
    {
        return view('admin.pages.news.view', [
            'prefixname' => 'Admin',
            'title' => 'News View',
            'page_title' => 'News View',
            'news' => News::findOrFail($id),
        ]);
    }

    public function edit($id)
    {
        return view('admin.pages.news.edit', [
            'prefixname' => 'Admin',
            'title' => 'News Edit',
            'page_title' => 'News Edit',
            'news' => News::with('tags')->findOrFail($id),
            'categories' => Category::where('status', 1)->get(),
            'subcategories' => Subcategory::where('status', 1)->get(),
            'tags'=>Tag::where('status', 1)->latest()->get(),
        ]);
    }

    public function update(NewsRequest $request, $id)
    {
        $news = News::findOrFail($id);
        $news->user_id = Auth::user()->id;
        $news->category_id = $request->get('category');
        $news->subcategory_id = $request->get('subcategory');
        $news->title = $request->get('title');
        $news->titleEn = $request->get('titleEn');
        $news->description = $request->get('description');
        $news->descriptionEn = $request->get('descriptionEn');
        $path = null;
        if ($request->hasFile('img')) {
            if (file_exists($news->image)) {
                unlink($news->image);
            }
            $path = Utlity::file_upload($request, 'img', 'News_Photo');
            $news->image = $path;
        }
        $news->status = $request->status;
        if ($news->save()) {
            $news->tags()->sync($request->tags);
            return redirect()->route('news.index', $news->id)->with('success', 'Data Updated successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if (file_exists($news->image)) {
            unlink($news->image);
        }
        if ($news->delete()) {
            $news->tags()->detach($news->tags);
            return redirect()->route('news.index')->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on deleting');
    }
}
