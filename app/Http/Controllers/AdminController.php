<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show() 
    {
        $user = Auth::user();
        return view('panels.admin.profile', ['user' => $user]);
    }

    public function update(Admin $user) 
    {
        $data = request()->validate([
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'email', 'max:255'],
        ]);

        $user->update($data);

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function changePassword() {
        return view('panels.admin.change-password');
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->current_password, $hashedPassword)) 
        {
            $user = Admin::findOrFail(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            $notification = array(
                'message' => 'Password Update Successfully',
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }

        $notification = array(
            'message' => 'Password Update Failed',
            'alert-type' => 'error'
        );

        return back()->with($notification);
    }
}
