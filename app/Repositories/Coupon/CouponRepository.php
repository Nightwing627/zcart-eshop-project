<?php

namespace App\Repositories\Coupon;

interface CouponRepository
{
    public function syncCustomers($coupon, array $ids);
}