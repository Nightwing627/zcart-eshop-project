<?php

namespace App\Repositories\Coupon;

use Auth;
use App\Coupon;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentCoupon extends EloquentRepository implements BaseRepository, CouponRepository
{
	protected $model;

	public function __construct(Coupon $coupon)
	{
		$this->model = $coupon;
	}

    public function all()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->get();

        return parent::all();
    }

    public function trashOnly()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->onlyTrashed()->get();

        return parent::trashOnly();
    }

    public function store(Request $request)
    {
        $coupon = parent::store($request);

        if ($request->input('customer_list'))
            $this->syncCustomers($coupon, $request->input('customer_list'));

        return $coupon;
    }

    public function update(Request $request, $id)
    {
        $coupon = parent::update($request, $id);

        $this->syncCustomers($coupon, $request->input('customer_list') ?: []);

        return $coupon;
    }

    public function syncCustomers($coupon, array $ids)
    {
        $coupon->customers()->sync($ids);
    }

}