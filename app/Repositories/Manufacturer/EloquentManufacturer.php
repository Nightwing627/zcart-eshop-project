<?php

namespace App\Repositories\Manufacturer;

use Auth;
use App\Manufacturer;
use Illuminate\Http\Request;
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
            return $this->model->mine()->with('country', 'image')->withCount('products')->get();

        return $this->model->with('country', 'image')->withCount('products')->get();
    }

    public function trashOnly()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->with('image')->onlyTrashed()->get();

        return $this->model->with('image')->onlyTrashed()->get();
    }

    public function store(Request $request)
    {
        $manufacturer = parent::store($request);

        if ($request->hasFile('image'))
            $manufacturer->saveImage($request->file('image'));

        return $manufacturer;
    }

    public function update(Request $request, $id)
    {
        $manufacturer = parent::update($request, $id);

        if ($request->hasFile('image') || ($request->input('delete_image') == 1))
            $manufacturer->deleteImage();

        if ($request->hasFile('image'))
            $manufacturer->saveImage($request->file('image'));

        return $manufacturer;
    }

    public function destroy($id)
    {
        $manufacturer = parent::findTrash($id);

        $manufacturer->flushImages();

        return $manufacturer->forceDelete();
    }
}