<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    protected $enumStatuses = [
        'active', 'inactive', 'pending', 'freez', 'block',
    ];
    public function index()
    {

        return view('admin.pages.admins.index', [
            'prefixname' => 'Admin',
            'title' => 'Admin List',
            'page_title' => 'Admin List',
            'admins' => Admin::all(),
        ]);
    }
    public function create()
    {

            return view('admin.pages.admins.create', [
                'prefixname' => 'Admin',
                'title' => 'Admin Create',
                'page_title' => 'Admin Create',
                'roles' => Role::all(),
                'enumStatuses' => $this->enumStatuses,
            ]);

    }

    public function store(AdminRequest $request)
    {
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

            return view('admin.pages.admins.edit', [
                'prefixname' => 'Admin',
                'title' => 'Admin Create',
                'page_title' => 'Admin Create',
                'admin' => Admin::with('roles')->findOrFail($id),
                'roles' => Role::all(),
                'enumStatuses' => $this->enumStatuses,
            ]);

    }
    public function update(Request $request, $id)
    {
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

        $result = Admin::where('id', '=', $id)->delete();

        if ($result) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back();
        }
    }
}
