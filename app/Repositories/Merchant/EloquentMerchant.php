<?php

namespace App\Repositories\Merchant;

use Auth;
use App\Role;
use App\Merchant;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentMerchant extends EloquentRepository implements BaseRepository, MerchantRepository
{
	protected $model;

	public function __construct(Merchant $merchant)
	{
		$this->model = $merchant;
	}

    public function all()
    {
        return $this->model->where('role_id', Role::MERCHANT)->with('owns', 'primaryAddress')->get();
    }

    public function trashOnly()
    {
        return $this->model->where('role_id', Role::MERCHANT)->with('owns')->onlyTrashed()->get();
    }

    public function addresses($merchant)
    {
        return $merchant->addresses()->get();
    }

    public function store(Request $request)
    {
        $merchant = parent::store($request);

        $this->saveAdrress($request->all(), $merchant);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $merchant->id);

        return $merchant;
    }

    public function update(Request $request, $id)
    {
        $merchant = parent::update($request, $id);

        if ($request->input('delete_image') == 1)
            $this->removeImages($merchant->id);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $merchant->id);

        return $merchant;
    }

    public function destroy($id)
    {
        $merchant = $this->model->onlyTrashed()->findOrFail($id);

        $merchant->flushAddresses();

        $this->removeImages($merchant->id);

        return $merchant->forceDelete();
    }

    public function uploadImages(Request $request, $id)
    {
        ImageHelper::UploadImages($request, 'users', $id);
    }

    public function removeImages($id)
    {
        ImageHelper::RemoveImages('users', $id);
    }

    public function saveAdrress(array $address, $merchant)
    {
        $merchant->addresses()->create($address);
    }
}