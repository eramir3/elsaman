<?php

namespace App\Http\Controllers;

use App\Enums\NotificationEnum;
use App\Services\CouponService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Services\NotificationService;


class CouponController extends Controller
{
    private $couponService;

    private $notificationService; 

    public function __construct(CouponService $couponService, NotificationService $notificationService)
    {
        $this->couponService = $couponService;
        $this->notificationService = $notificationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = $this->couponService->all();
        return view('panel.coupon.index', compact('coupons'));
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
            $this->couponService->store($request->validated());
            $response = $this->notificationService->success('Coupon', NotificationEnum::CREATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Coupon', NotificationEnum::CREATE_ERROR);
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
            $this->couponService->update($request->validated(), $id);
            $response = $this->notificationService->success('Coupon', NotificationEnum::UPDATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Coupon', NotificationEnum::UPDATE_ERROR);
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
            $this->couponService->destroy($id);
            $response = $this->notificationService->success('Coupon', NotificationEnum::DELETE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Coupon', NotificationEnum::DELETE_ERROR);
            return back()->with($response);
        }
    }
}
