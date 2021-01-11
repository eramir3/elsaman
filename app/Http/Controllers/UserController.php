<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function show(User $user) 
    {
        $data = [
            'user' => $user,
            'roles' => Role::all()
        ];
        return view('admin.users.profile', $data);
    }

    public function update(User $user) 
    {
        $inputs = request()->validate([
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'email', 'max:255'],
            //'password'=>['min:6', 'max:255', 'confirmed']
        ]);

        $user->update($inputs);
        return back();
    }

    public function attachRole(User $user) 
    {
        $user->roles()->attach(request('role'));
        return back();
    }

    public function detachRole(User $user) 
    {
        $user->roles()->detach(request('role'));
        return back();
    }

    public function destroy(User $user) 
    {
        $user->delete();
        Session::flash('message-success', "User '". $user['name'] ."' was deleted successfully");
        return back();
    }
}