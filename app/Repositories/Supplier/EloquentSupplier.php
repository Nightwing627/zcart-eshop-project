<?php

namespace App\Repositories\Supplier;

use Auth;
use App\Supplier;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentSupplier extends EloquentRepository implements BaseRepository, SupplierRepository
{
	protected $model;

	public function __construct(Supplier $supplier)
	{
		$this->model = $supplier;
	}

    public function all()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->with('primaryAddress')->get();

        return $this->model->with('primaryAddress')->get();
    }

    public function trashOnly()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->onlyTrashed()->get();

        return parent::trashOnly();
    }

    public function store(Request $request)
    {
        $supplier = parent::store($request);

        $this->saveAdrress($request->all(), $supplier);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $supplier->id);

        return $supplier;
    }

    public function update(Request $request, $id)
    {
        $supplier = parent::update($request, $id);

        if ($request->input('delete_image') == 1)
            $this->removeImages($supplier->id);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $supplier->id);

        return $supplier;
    }

    public function destroy($id)
    {
        $supplier = $this->model->onlyTrashed()->findOrFail($id);

        $supplier->flushAddresses();

        $this->removeImages($id);

        return $supplier->forceDelete();
    }

    public function saveAdrress(array $address, $supplier)
    {
        $supplier->addresses()->create($address);
    }

    public function uploadImages(Request $request, $id)
    {
        ImageHelper::UploadImages($request, 'suppliers', $id);
    }

    public function removeImages($id)
    {
        ImageHelper::RemoveImages('suppliers', $id);
    }
}