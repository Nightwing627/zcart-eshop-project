<?php

namespace App\Repositories\PaymentMethod;

use App\PaymentMethod;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentPaymentMethod extends EloquentRepository implements BaseRepository, PaymentMethodRepository
{
	protected $model;

	public function __construct(PaymentMethod $paymentMethod)
	{
		$this->model = $paymentMethod;
	}

    public function store(Request $request)
    {
        $paymentMethod = parent::store($request);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $paymentMethod->id);

        return $paymentMethod;
    }

    public function update(Request $request, $id)
    {
        $paymentMethod = parent::update($request, $id);

        if ($request->input('delete_image') == 1)
            $this->removeImages($paymentMethod->id);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $paymentMethod->id);

        return $paymentMethod;
    }

    public function destroy($id)
    {
        $this->removeImages($id);

        return parent::destroy($id);
    }

    public function uploadImages(Request $request, $id)
    {
        ImageHelper::UploadImages($request, 'payment-methods', $id);
    }

    public function removeImages($id)
    {
        ImageHelper::RemoveImages('payment-methods', $id);
    }
}