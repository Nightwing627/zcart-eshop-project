<?php

namespace App\Repositories\Shop;

use App\Shop;
use Illuminate\Http\Request;
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
        return $this->model->with('owner', 'image', 'primaryAddress')->get();
    }

    public function trashOnly()
    {
        return $this->model->with('image')->onlyTrashed()->get();
    }

    public function staffs($shop)
    {
        return $shop->staffs()->with('role', 'primaryAddress')->get();
    }

    public function staffsTrashOnly($shop)
    {
        return $shop->staffs()->onlyTrashed()->get();
    }

    public function update(Request $request, $id)
    {
        $shop = parent::update($request, $id);

        if ($request->hasFile('image') || ($request->input('delete_image') == 1))
            $shop->deleteImage();

        if ($request->hasFile('image'))
            $shop->saveImage($request->file('image'));

        return $shop;
    }

    public function destroy($id)
    {
        $shop = parent::findTrash($id);

        $shop->flushAddresses();

        $shop->staffs()->forceDelete();

        $shop->flushImages();

        return $shop->forceDelete();
    }

    public function saveAdrress(array $address, $shop)
    {
        $shop->addresses()->create($address);
    }
}