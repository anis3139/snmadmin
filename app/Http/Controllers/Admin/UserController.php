<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('user.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any User !');
        }

        return view('admin.pages.users.index', [
            'prefixname' => 'User',
            'title' => 'User List',
            'page_title' => 'User List',
            'users' => User::all(),
            'enumStatuses' => $this->enumStatuses,
        ]);

    }
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('user.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any User !');
        }

            return view('admin.pages.users.create', [
                'prefixname' => 'User',
                'title' => 'User Create',
                'page_title' => 'User Create',
                'enumStatuses' => $this->enumStatuses,
            ]);

    }
    public function show(User $user)
    {
        if (is_null($this->user) || !$this->user->can('user.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any User !');
        }

            return view('admin.pages.users.details', [
                'prefixname' => 'User',
                'title' => 'User Create',
                'page_title' => 'User Create',
                'user' => $user,
                'enumStatuses' => $this->enumStatuses,
            ]);

    }



    public function store(UserStoreRequest $request, User $user)
    {
        if (is_null($this->user) || !$this->user->can('user.create')) {
            abort(403, 'Sorry !! You are Unauthorized to store any User !');
        }
        $user = $user->create($request->only('name','username','email','phone', 'status'));
        if ($user) {
            return redirect()->route('admin.user.index')->with('success', 'Data Added successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function edit(User $user)
    {
        if (is_null($this->user) || !$this->user->can('user.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any User !');
        }
            return view('admin.pages.users.edit', [
                'prefixname' => 'User',
                'title' => 'User Create',
                'page_title' => 'User Create',
                'user' => $user,
                'enumStatuses' => $this->enumStatuses,
            ]);

    }

    public function update(UserUpdateRequest $request, User $user)
    {
        if (is_null($this->user) || !$this->user->can('user.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update any User !');
        }
            $user->update($request->only('name','username','email','phone', 'status'));
            if($user) {
                return redirect()->route('admin.user.index')->with('success', 'Data Added successfully Done');
            } else {
                return redirect()->back()->withInput()->with('error', 'Data Added Failed');
            }

    }
    public function destroy(User $user)
    {
        if (is_null($this->user) || !$this->user->can('user.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any User !');
        }
        $result = $user->delete();

        if ($result) {
            return redirect()->route('admin.user.index');
        } else {
            return redirect()->back();
        }

    }
}
