<?php

namespace App\Services;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Collection;

class CouponService
{
    public function all(): Collection
    {
        return Coupon::all();
    }

    public function store(array $input): void
    {
        $coupon = new Coupon;
        $coupon->create($input);
    }

    public function update(array $input, int $id): void
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->update($input);
    }

    public function destroy(int $id): void
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
    }
}