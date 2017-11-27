<?php

namespace App\Repositories\Packaging;

use Auth;
use App\Packaging;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentPackaging extends EloquentRepository implements BaseRepository, PackagingRepository
{
	protected $model;

	public function __construct(Packaging $packaging)
	{
		$this->model = $packaging;
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
        $packaging = parent::store($request);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $packaging->id);

        return $packaging;
    }

    public function update(Request $request, $id)
    {
        $packaging = parent::update($request, $id);

        if ($request->input('delete_image') == 1)
            $this->removeImages($packaging->id);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $packaging->id);

        return $packaging;
    }

    public function destroy($id)
    {
        $this->removeImages($id);

        return parent::destroy($id);
    }

    public function uploadImages(Request $request, $id)
    {
        ImageHelper::UploadImages($request, 'packagings', $id);
    }

    public function removeImages($id)
    {
        ImageHelper::RemoveImages('packagings', $id);
    }
}