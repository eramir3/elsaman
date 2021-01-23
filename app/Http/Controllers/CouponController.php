<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Enums\NotificationEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Services\NotificationService;


class CouponController extends Controller
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
        $coupons = Coupon::all();
        return view('panels.coupon.index', compact('coupons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CouponRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        try
        {
            $coupon = new Coupon;
            $coupon->create($request->validated());
            $response = $this->notificationService->success('Coupon', NotificationEnum::Create);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Coupon', NotificationEnum::CreateError);
            return back()->with($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CouponRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, $id)
    {
        try
        {
            $coupon = Coupon::findOrFail($id);
            $coupon->update($request->validated());
            $response = $this->notificationService->success('Coupon', NotificationEnum::Update);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Coupon', NotificationEnum::UpdateError);
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
            $coupon = Coupon::findOrFail($id);
            $coupon->delete();
            $response = $this->notificationService->success('Coupon', NotificationEnum::Delete);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Coupon', NotificationEnum::DeleteError);
            return back()->with($response);
        }
    }
}
