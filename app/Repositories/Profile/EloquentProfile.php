<?php

namespace App\Repositories\Profile;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentProfile extends EloquentRepository implements BaseRepository, ProfileRepository
{

    public function profile()
    {
        return User::findOrFail(Auth::id());
    }

    public function updateProfile(Request $request)
    {
        return Auth::user()->update($request->all());
    }

    public function updatePassword(Request $request)
    {
       return $request->user()->fill([
            'password' => $request->input('password')
        ])->save();
    }

    public function updatePhoto(Request $request)
    {
        ImageHelper::UploadImages($request, 'users', Auth::id());
    }

    public function deletePhoto(Request $request)
    {
        ImageHelper::RemoveImages('users', Auth::id());
    }

}