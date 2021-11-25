<?php

namespace App\Http\Controllers\Admin\Blog;
use App\Http\Controllers\BaseController;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Models\Tag;

class TagController extends BaseController
{

    public function index(){
        if (is_null($this->user) || !$this->user->can('tag.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any tag !');
        }
        return view('admin.pages.tag.index', [
            'prefixname' => 'Admin',
            'title' => 'Tag List',
            'page_title' => 'Tag List',
            'tags' => Tag::latest()->get(),
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function create(){
        if (is_null($this->user) || !$this->user->can('tag.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any tag !');
        }
        return view('admin.pages.tag.create', [
            'prefixname' => 'Admin',
            'title' => 'Tag Create',
            'page_title' => 'Tag Create',
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function store(TagStoreRequest $request, Tag $tag){
        if (is_null($this->user) || !$this->user->can('tag.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any tag !');
        }
        $data= $request->only('nameBn','nameEn', 'status');
        if ($tag->create($data)) {
            return redirect()->route('tag.index')->with('success', 'Data Added successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function edit(Tag $tag){
        if (is_null($this->user) || !$this->user->can('tag.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any tag !');
        }
        return view('admin.pages.tag.edit', [
            'prefixname' => 'Admin',
            'title' => 'Tag Edit',
            'page_title' => 'Tag Edit',
            'tag' => $tag,
            'enumStatuses' => $this->blogEnumStaus,
        ]);
    }

    public function update(TagUpdateRequest $request, Tag $tag){
        if (is_null($this->user) || !$this->user->can('tag.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any tag !');
        }
        $data= $request->only('nameBn','nameEn', 'status');
        if ($tag->update($data)) {

            return redirect()->route('tag.index', $tag->id)->with('success', 'Data Updated successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on update');
    }

    public function destroy(Tag $tag){
        if (is_null($this->user) || !$this->user->can('tag.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any tag !');
        }
        if($tag->delete()){
            return redirect()->route('tag.index')->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on deleting');
    }
}
