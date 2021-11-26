<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminController extends BaseController
{

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Admin !');
        }

        return view('admin.pages.admins.index', [
            'prefixname' => 'Admin',
            'title' => 'Admin List',
            'page_title' => 'Admin List',
            'admins' => Admin::all(),
            'enumStatuses' => $this->enumStatuses,
        ]);
    }
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any Admin !');
        }

            return view('admin.pages.admins.create', [
                'prefixname' => 'Admin',
                'title' => 'Admin Create',
                'page_title' => 'Admin Create',
                'roles' => Role::all(),
                'enumStatuses' => $this->enumStatuses,
            ]);

    }
    public function show(Admin $admin)
    {
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Admin !');
        }

            return view('admin.pages.admins.details', [
                'prefixname' => 'Admin',
                'title' => 'Admin Create',
                'page_title' => 'Admin Create',
                'roles' => Role::all(),
                'admin' => $admin,
                'enumStatuses' => $this->enumStatuses,
            ]);

    }

    public function store(AdminStoreRequest $request, Admin $admin)
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to store any Admin !');
        }
        $admin = $admin->create($request->only('name','username','email','phone','password'));
        if ($admin) {
            $admin->assignRole($request->get('role'));
            return redirect()->route('admin.index')->with('success', 'Data Added successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function edit($admin)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any Admin !');
        }
            return view('admin.pages.admins.edit', [
                'prefixname' => 'Admin',
                'title' => 'Admin Create',
                'page_title' => 'Admin Create',
                'admin' => Admin::with('roles')->findOrFail($admin),
                'roles' => Role::all(),
                'enumStatuses' => $this->enumStatuses,
            ]);

    }

    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update any Admin !');
        }
            $admin->update($request->only('name','username','email','phone', 'status'));
            if($admin) {
                if($admin->id!=1){
                    $admin->roles()->detach();
                    $admin->assignRole($request->role);
                }
                return redirect()->route('admin.index')->with('success', 'Data Added successfully Done');
            } else {
                return redirect()->back()->withInput()->with('error', 'Data Added Failed');
            }

    }
    public function destroy(Admin $admin)
    {
        if (is_null($this->user) || !$this->user->can('admin.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any Admin !');
        }
        $result = $admin->delete();

        if ($result) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back();
        }

    }
 
}
