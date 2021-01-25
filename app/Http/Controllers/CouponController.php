<?php

namespace App\Http\Controllers;

use App\Utils\Notifier;
use App\Enums\NotificationEnum;
use App\Services\CouponService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;

class CouponController extends Controller
{
    private $couponService;

    public function __construct(CouponService $couponService)
    {
        $this->couponService = $couponService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = $this->couponService->all();
        return view('panel.admin.coupon.index', compact('coupons'));
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
            $response = Notifier::success('Coupon', NotificationEnum::CREATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Coupon', NotificationEnum::CREATE_ERROR);
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
            $response = Notifier::success('Coupon', NotificationEnum::UPDATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Coupon', NotificationEnum::UPDATE_ERROR);
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
            $response = Notifier::success('Coupon', NotificationEnum::DELETE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Coupon', NotificationEnum::DELETE_ERROR);
            return back()->with($response);
        }
    }
}
