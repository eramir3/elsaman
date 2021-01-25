<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Enums\NotificationEnum;
use App\Http\Requests\UserRequest;
use App\Services\NotificationService;
class UserController extends Controller
{
    private $userService;
    
    private $notificationService; 

    public function __construct(UserService $userService, NotificationService $notificationService)
    {
        $this->userService = $userService;
        $this->notificationService = $notificationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->all();
        return view('panel.user.index', compact('users'));
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
            $this->userService->update($request->validated(), $id);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $this->userService->destroy($id);
            $response = $this->notificationService->success('User', NotificationEnum::DELETE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('User', NotificationEnum::DELETE_ERROR);
            return back()->with($response);
        }
    }

}
