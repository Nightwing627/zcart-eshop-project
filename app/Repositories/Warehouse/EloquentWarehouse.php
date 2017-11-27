<?php

namespace App\Repositories\Warehouse;

use Auth;
use App\Warehouse;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentWarehouse extends EloquentRepository implements BaseRepository, WarehouseRepository
{
	protected $model;

	public function __construct(Warehouse $warehouse)
	{
		$this->model = $warehouse;
	}

    public function all()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->with('manager', 'primaryAddress')->get();

        return $this->model->with('manager', 'primaryAddress')->get();
    }

    public function trashOnly()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->onlyTrashed()->get();

        return parent::trashOnly();
    }

    public function store(Request $request)
    {
        $warehouse = parent::store($request);

        $this->saveAdrress($request->all(), $warehouse);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $warehouse->id);

        return $warehouse;
    }

    public function update(Request $request, $id)
    {
        $warehouse = parent::update($request, $id);

        if ($request->input('delete_image') == 1)
            $this->removeImages($warehouse->id);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $warehouse->id);

        return $warehouse;
    }

    public function destroy($id)
    {
        $warehouse = $this->model->onlyTrashed()->findOrFail($id);

        $warehouse->flushAddresses();

        $this->removeImages($id);

        return $warehouse->forceDelete();
    }

    public function saveAdrress(array $address, $warehouse)
    {
        $warehouse->addresses()->create($address);
    }

    public function uploadImages(Request $request, $id)
    {
        ImageHelper::UploadImages($request, 'warehouses', $id);
    }

    public function removeImages($id)
    {
        ImageHelper::RemoveImages('warehouses', $id);
    }
}