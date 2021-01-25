<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Enums\NotificationEnum;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\NotificationService;
use App\Http\Requests\Auth\PasswordRequest;
use App\Exceptions\InvalidCurrentPasswordException;

class ProfileController extends Controller
{
    private $notificationService; 

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit() 
    {
        $user = Auth::user();
        return view('panel.profile.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request) 
    {
        try
        {
            $user = Auth::user();
            $user->update($request->validated());
            $response = $this->notificationService->success('Profile', NotificationEnum::UPDATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Profile', NotificationEnum::UPDATE_ERROR);
            return back()->with($response);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPassword() 
    {
        return view('panel.profile.edit-password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(PasswordRequest $request)
    {
        try
        {
            Admin::updatePassword(Auth::user(), $request);
            $response = $this->notificationService->success('Password', NotificationEnum::UPDATE);
            return back()->with($response);
        }
        catch(InvalidCurrentPasswordException $e)
        {
            $response = $this->notificationService->custom($e->getMessage(), NotificationEnum::ERROR);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Password', NotificationEnum::UPDATE_ERROR);
            return back()->with($response);
        }
    }
}
