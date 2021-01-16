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
            $reponse = $this->notificationService->success('Coupon', NotificationEnum::Create);
            return back()->with($reponse);
        }
        catch(\Exception $e)
        {
            $reponse = $this->notificationService->error('Coupon', NotificationEnum::CreateError);
            return back()->with($reponse);
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
            $reponse = $this->notificationService->success('Coupon', NotificationEnum::Update);
            return back()->with($reponse);
        }
        catch(\Exception $e)
        {
            $reponse = $this->notificationService->error('Coupon', NotificationEnum::UpdateError);
            return back()->with($reponse);
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
            $reponse = $this->notificationService->success('Coupon', NotificationEnum::Delete);
            return back()->with($reponse);
        }
        catch(\Exception $e)
        {
            $reponse = $this->notificationService->error('Coupon', NotificationEnum::DeleteError);
            return back()->with($reponse);
        }
    }
}
