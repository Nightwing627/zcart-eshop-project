<?php

namespace App\Repositories\Manufacturer;

use Auth;
use App\Manufacturer;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentManufacturer extends EloquentRepository implements BaseRepository, ManufacturerRepository
{
	protected $model;

	public function __construct(Manufacturer $manufacturer)
	{
		$this->model = $manufacturer;
	}

    public function all()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->with('country')->get();

        return $this->model->with('country')->get();
    }

    public function trashOnly()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->onlyTrashed()->get();

        return parent::trashOnly();
    }

    public function store(Request $request)
    {
        $manufacturer = parent::store($request);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $manufacturer->id);

        return $manufacturer;
    }

    public function update(Request $request, $id)
    {
        $manufacturer = parent::update($request, $id);

        if ($request->input('delete_image') == 1)
            $this->removeImages($manufacturer->id);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $manufacturer->id);

        return $manufacturer;
    }

    public function destroy($id)
    {
        $this->removeImages($id);

        return parent::destroy($id);
    }

    public function uploadImages(Request $request, $id)
    {
        ImageHelper::UploadImages($request, 'manufacturers', $id);
    }

    public function removeImages($id)
    {
        ImageHelper::RemoveImages('manufacturers', $id);
    }
}