<?php

namespace App\Repositories\Customer;

use Auth;
use App\Customer;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentCustomer extends EloquentRepository implements BaseRepository, CustomerRepository
{
	protected $model;

	public function __construct(Customer $customer)
	{
		$this->model = $customer;
	}

    public function all()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->withCount('orders')->get();

        return $this->model->withCount('orders')->get();
    }

    public function trashOnly()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->onlyTrashed()->get();

        return parent::trashOnly();
    }

    public function profile($id)
    {
        return $this->model->findOrFail($id);
    }

    public function addresses($customer)
    {
        return $customer->addresses()->get();
    }

    public function store(Request $request)
    {
        $customer = parent::store($request);

        $this->saveAdrress($request->all(), $customer);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $customer->id);

        return $customer;
    }

    public function update(Request $request, $id)
    {
        $customer = parent::update($request, $id);

        if ($request->input('delete_image') == 1)
            $this->removeImages($customer->id);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $customer->id);

        return $customer;
    }

    public function destroy($id)
    {
        $customer = $this->model->onlyTrashed()->findOrFail($id);

        $customer->flushAddresses();

        $this->removeImages($customer->id);

        return $customer->forceDelete();
    }

    public function uploadImages(Request $request, $id)
    {
        ImageHelper::UploadImages($request, 'customers', $id);
    }

    public function removeImages($id)
    {
        ImageHelper::RemoveImages('customers', $id);
    }

    public function saveAdrress(array $address, $customer)
    {
        $customer->addresses()->create($address);
    }
}