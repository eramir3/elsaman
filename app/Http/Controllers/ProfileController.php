<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\PasswordRequest;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit() 
    {
        $user = Auth::user();
        return view('panels.profile.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request) 
    {
        try
        {
            $user = Auth::user();
            $user->update($request->validated());

            $notification = array(
                'message' => 'Profile Updated Successfully',
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }
        catch(\Exception $e)
        {
            $notification = array(
                'message' => 'Profile Update Failed',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPassword() 
    {
        return view('panels.profile.edit-password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(PasswordRequest $request)
    {
        $user = Auth::user();
        $hashedPassword = $user->password;

        try
        {
            if (Hash::check($request->current_password, $hashedPassword)) 
            {
                $user->password = Hash::make($request->password);
                $user->save();

                $notification = array(
                    'message' => 'Password Update Successfully',
                    'alert-type' => 'success'
                );
                return back()->with($notification);
            }
        }
        catch(\Exception $e)
        {
            $notification = array(
                'message' => 'Category Deletion Failed',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }
}
