<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\HasherService;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\PasswordRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('panels.user.index', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id) 
    {
        try
        {
            $user = User::findOrFail($id);
            $user->update($request->validated());

            $notification = array(
                'message' => 'User Updated Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch(\Exception $e)
        {
            $notification = array(
                'message' => 'User Update Failed',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modles\id  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $user = User::findOrFail($id);
            $user->delete();
            $notification = array(
                'message' => 'User Deleted Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch(\Exception $e)
        {
            $notification = array(
                'message' => 'User Deletion Failed',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }

}
