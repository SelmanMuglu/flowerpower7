<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }



    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
            return  redirect(route('admin.users.index'));
        }
        $roles = Role::all();

        return view('admin.users.edit',['user' => $user, 'roles'=> $roles]);
    }


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.users.index');
    }


    public function destroy(User $user)
    {
        if(Gate::denies('edit-users')){
            return  redirect(route('admin.users.index'));
        }

        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
