<?php

namespace App\Http\Controllers\Admin\Blog;
use App\Http\Controllers\BaseController;
use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagController extends BaseController
{
    public function index(){ 
        return view('admin.pages.tag.index', [
            'prefixname' => 'Admin',
            'title' => 'Tag List',
            'page_title' => 'Tag List',
            'tags' => Tag::latest()->get()
        ]);
    }

    public function create(){
        return view('admin.pages.tag.create', [
            'prefixname' => 'Admin',
            'title' => 'Tag Create',
            'page_title' => 'Tag Create',
        ]);
    }

    public function store(TagRequest $request){



        $tag = new Tag();
        $tag->nameBn = $request->get('nameBn');
        $tag->nameEn = $request->get('nameEn');
        $tag->status = $request->status;
        if ($tag->save()) {

            return redirect()->route('tag.index')->with('success', 'Data Added successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function edit($id){
        return view('admin.pages.tag.edit', [
            'prefixname' => 'Admin',
            'title' => 'Tag Edit',
            'page_title' => 'Tag Edit',
            'tag' => Tag::findOrFail($id),
        ]);
    }

    public function update(TagRequest $request, $id){

        $tag = Tag::findOrFail($id);
        $tag->nameBn = $request->get('nameBn');
        $tag->nameEn = $request->get('nameEn');
        $tag->status = $request->status;
        if ($tag->save()) {

            return redirect()->route('tag.edit', $tag->id)->with('success', 'Data Updated successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on update');
    }

    public function destroy($id){
        $tag = Tag::findOrFail($id);
        if($tag->delete()){

            return redirect()->route('tag.index')->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on deleting');

    }
}
