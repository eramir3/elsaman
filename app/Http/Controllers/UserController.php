<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Enums\NotificationEnum;
use App\Services\HasherService;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Services\NotificationService;
use App\Http\Requests\Auth\PasswordRequest;

class UserController extends Controller
{
    private $notificationService; 

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

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
            $response = $this->notificationService->success('Profile', NotificationEnum::Update);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Profile', NotificationEnum::UpdateError);
            return back()->with($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $user = User::findOrFail($id);
            $user->delete();
            $response = $this->notificationService->success('User', NotificationEnum::Delete);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('User', NotificationEnum::DeleteError);
            return back()->with($response);
        }
    }

}
