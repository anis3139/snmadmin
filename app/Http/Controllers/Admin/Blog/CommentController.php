<?php

namespace App\Http\Controllers\Admin\Blog;
use App\Http\Controllers\BaseController;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends BaseController
{
    public function index(){
        return view('admin.pages.comment.index', [

            'prefixname' => 'Admin',
            'title' => 'Comment Approve List',
            'page_title' => 'Comment Approve List',
            'comments' => Comment::all()

        ]);
    }

    public function approveList(){
        return view('admin.pages.comment.approve_list', [

            'prefixname' => 'Admin',
            'title' => 'Comment Approve List',
            'page_title' => 'Comment Approve List',
            'approvelists' => Comment::where('status','1')->latest()->get()

        ]);
    }

    public function pendingList(){
        return view('admin.pages.comment.pending_list', [

            'prefixname' => 'Admin',
            'title' => 'Comment Pending List',
            'page_title' => 'Comment Pending List',
            'approvelists' => Comment::where('status','0')->latest()->get(),

        ]);
    }

    public function pendingListApprove($id){

        $comment = Comment::findOrFail($id);

        $comment->status = '1';

        if($comment->save()){

            return redirect()->back()->with('success', 'Comment Approved successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Failed');

    }

    public function destroy($id){

        $comment = Comment::findOrFail($id);

        if($comment->delete()){

            return redirect()->back()->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on deleting');

    }
}
