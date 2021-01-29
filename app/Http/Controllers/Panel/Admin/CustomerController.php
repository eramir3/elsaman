<?php

namespace App\Http\Controllers\Panel\Admin;

use Saman\Utils\Notifier;
use App\Services\CustomerService;
use Saman\Enums\NotificationEnum;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customerService->all();
        return view('panel.admin.customer.index', compact('customers'));
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
            $this->customerService->update($request->validated(), $id);
            $response = Notifier::success('Customer', NotificationEnum::UPDATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Customer', NotificationEnum::UPDATE_ERROR);
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
            $this->customerService->destroy($id);
            $response = Notifier::success('Customer', NotificationEnum::DELETE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Customer', NotificationEnum::DELETE_ERROR);
            return back()->with($response);
        }
    }
}
