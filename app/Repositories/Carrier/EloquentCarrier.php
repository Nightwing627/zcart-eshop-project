<?php

namespace App\Repositories\Carrier;

use Auth;
use App\Carrier;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentCarrier extends EloquentRepository implements BaseRepository, CarrierRepository
{
	protected $model;

	public function __construct(Carrier $carrier)
	{
		$this->model = $carrier;
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
        $carrier = parent::store($request);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $carrier->id);

        return $carrier;
    }

    public function update(Request $request, $id)
    {
        $carrier = parent::update($request, $id);

        if ($request->input('delete_image') == 1)
            $this->removeImages($carrier->id);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $carrier->id);

        return $carrier;
    }

	public function destroy($id)
	{
        $this->removeImages($id);

		return parent::destroy($id);
	}

    public function uploadImages(Request $request, $id)
    {
        ImageHelper::UploadImages($request, 'carriers', $id);
    }

    public function removeImages($id)
    {
        ImageHelper::RemoveImages('carriers', $id);
    }

}