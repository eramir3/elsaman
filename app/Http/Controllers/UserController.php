<?php

namespace App\Http\Controllers;

use Saman\Utils\Notifier;
use App\Services\UserService;
use Saman\Enums\NotificationEnum;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->all();
        return view('panel.admin.user.index', compact('users'));
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
            $response = Notifier::success('Profile', NotificationEnum::UPDATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Profile', NotificationEnum::UPDATE_ERROR);
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
            $response = Notifier::success('User', NotificationEnum::DELETE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('User', NotificationEnum::DELETE_ERROR);
            return back()->with($response);
        }
    }

}
