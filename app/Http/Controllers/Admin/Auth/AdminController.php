<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends BaseController
{
    protected $enumStatuses = [
        'Active', 'Inactive', 'Pending', 'Freez', 'Block',
    ];
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

    public function store(AdminStoreRequest $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to store any Admin !');
        }
        $admin = new Admin();
        $admin->name = $request->get('name');
        $admin->username = $request->get('username');
        $admin->email = $request->get('email');
        $admin->phone = $request->get('phone');
        $admin->password = bcrypt($request->get('password'));

        if ($admin->save()) {
            $admin->assignRole($request->get('role'));
            return redirect()->route('admin.index')->with('success', 'Data Added successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any Admin !');
        }
            return view('admin.pages.admins.edit', [
                'prefixname' => 'Admin',
                'title' => 'Admin Create',
                'page_title' => 'Admin Create',
                'admin' => Admin::with('roles')->findOrFail($id),
                'roles' => Role::all(),
                'enumStatuses' => $this->enumStatuses,
            ]);

    }
    public function update(AdminUpdateRequest $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update any Admin !');
        }
            $id = $id;
            $name = $request->Input('name');
            $username = $request->Input('username');
            $phone = $request->Input('phone');
            $email = strtolower($request->Input('email'));
            $password = $request->Input('password');
            $statusUpdate = $request->Input('status');
            $role = $request->Input('role');

            $admin = Admin::find($id);
            $admin->name = $name;
            if ($password) {
                $admin->password = bcrypt($password);
            }
            $admin->username = $username;
            $admin->email = $email;
            $admin->phone = $phone;
            $admin->status = $statusUpdate;
            $admin->save();

            if ($admin) {
                $admin->roles()->detach();
                $admin->assignRole($role);
                return redirect()->route('admin.index')->with('success', 'Data Added successfully Done');
            } else {
                return redirect()->back()->withInput()->with('error', 'Data Added Failed');
            }

    }
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any Admin !');
        }
        $result = Admin::where('id', '=', $id)->delete();

        if ($result) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back();
        }
    }
}
