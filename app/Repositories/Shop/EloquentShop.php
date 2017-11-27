<?php

namespace App\Repositories\Shop;

use App\Shop;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentShop extends EloquentRepository implements BaseRepository, ShopRepository
{
	protected $model;

	public function __construct(Shop $shop)
	{
		$this->model = $shop;
	}

    public function all()
    {
        return $this->model->with('owner', 'primaryAddress')->get();
    }

    public function staffs($shop)
    {
        return $shop->staffs()->with('role', 'primaryAddress')->get();
    }

    public function staffsTrashOnly($shop)
    {
        return $shop->staffs()->onlyTrashed()->get();
    }

    public function store(Request $request)
    {
        $shop = parent::store($request);

        $this->saveAdrress($request->all(), $shop);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $shop->id);

        return $shop;
    }

    public function update(Request $request, $id)
    {
        $shop = parent::update($request, $id);

        if ($request->input('delete_image') == 1)
            $this->removeImages($shop->id);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $shop->id);

        return $shop;
    }

    public function destroy($id)
    {
        $shop = $this->model->onlyTrashed()->findOrFail($id);

        $shop->flushAddresses();

        $shop->staffs()->forceDelete();

        $this->removeImages($shop->id);

        return $shop->forceDelete();
    }

    public function saveAdrress(array $address, $shop)
    {
        $shop->addresses()->create($address);
    }

    public function uploadImages(Request $request, $id)
    {
        ImageHelper::UploadImages($request, 'shops', $id);
    }

    public function removeImages($id)
    {
        ImageHelper::RemoveImages('shops', $id);
    }
}