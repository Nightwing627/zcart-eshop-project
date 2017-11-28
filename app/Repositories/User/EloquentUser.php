<?php

namespace App\Repositories\User;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentUser extends EloquentRepository implements BaseRepository, UserRepository
{
	protected $model;

	public function __construct(User $user)
	{
		$this->model = $user;
	}

    public function all()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->level()->mine()->with('role', 'primaryAddress')->get();

        return $this->model->level()->withMerchant()->with('role', 'primaryAddress')->get();
    }

    public function trashOnly()
    {
        if (!Auth::user()->isFromPlatform())
            return $this->model->level()->mine()->onlyTrashed()->get();

        return $this->model->level()->withMerchant()->onlyTrashed()->get();
    }

    public function addresses($user)
    {
        return $user->addresses()->get();
    }

    public function store(Request $request)
    {
        $user = parent::store($request);

        $this->saveAdrress($request->all(), $user);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $user->id);

        return $user;
    }

    public function update(Request $request, $id)
    {
        $user = parent::update($request, $id);

        if ($request->input('delete_image') == 1)
            $this->removeImages($user->id);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $user->id);

        return $user;
    }

    public function destroy($id)
    {
        $user = $this->model->onlyTrashed()->findOrFail($id);

        $user->flushAddresses();

        $this->removeImages($user->id);

        return $user->forceDelete();
    }

    public function uploadImages(Request $request, $id)
    {
        ImageHelper::UploadImages($request, 'users', $id);
    }

    public function removeImages($id)
    {
        ImageHelper::RemoveImages('users', $id);
    }

    public function saveAdrress(array $address, $user)
    {
        $user->addresses()->create($address);
    }
}