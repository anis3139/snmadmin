<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $enumStatuses = [
        'active', 'inactive', 'pending', 'freez', 'block',
    ];
    public function index()
    {

        return view('admin.pages.users.index', [
            'prefixname' => 'Admin',
            'title' => 'User List',
            'page_title' => 'User List',
            'users' => User::all(),
        ]);
    }
    public function create()
    {
        if (Auth::user()->hasRole(['Admin'])) {
            return view('admin.pages.users.create', [
                'prefixname' => 'Admin',
                'title' => 'User Create',
                'page_title' => 'User Create',
                'roles' => Role::all(),
                'enumStatuses' => $this->enumStatuses,
            ]);
        } else {
            abort(401, 'Unauthorized Error');
        }
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->password = bcrypt($request->get('password'));

        if ($user->save()) {
            $user->assignRole($request->get('role'));
            return redirect()->route('user.index')->with('success', 'Data Added successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function edit($id)
    {

        if (Auth::user()->hasRole(['Admin'])) {

            return view('admin.pages.users.edit', [
                'prefixname' => 'Admin',
                'title' => 'User Create',
                'page_title' => 'User Create',
                'user' => User::with('roles')->findOrFail($id),
                'roles' => Role::all(),
                'enumStatuses' => $this->enumStatuses,
            ]);
        } else {
            abort(401, 'Unauthorized Error');
        }
    }
    public function update(UserRequest $request, $id)
    {
        if (Auth::user()->hasRole(['Admin'])) {
            $id = $id;
            $name = $request->Input('name');
            $username = $request->Input('username');
            $phone = $request->Input('phone');
            $email = strtolower($request->Input('email'));
            $password = $request->Input('password');
            $statusUpdate = $request->Input('status');
            $role = $request->Input('role');

            $user = User::find($id);
            $user->name = $name;
            if ($password) {
                $user->password = bcrypt($password);
            }
            $user->username = $username;
            $user->email = $email;
            $user->phone = $phone;
            $user->status = $statusUpdate;
            $user->save();

            if ($user) {
                $user->roles()->detach();
                $user->assignRole($role);
                return redirect()->route('user.index')->with('success', 'Data Added successfully Done');
            } else {
                return redirect()->back()->withInput()->with('error', 'Data Added Failed');
            }

        } else {
            abort(401, 'Unauthorized Error');
        }
    }
    public function destroy($id)
    {

        $result = User::where('id', '=', $id)->delete();

        if ($result) {
            return redirect()->route('user.index');
        } else {
            return redirect()->back();
        }
    }
}
