<?php

namespace App\Repositories\Account;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentAccount extends EloquentRepository implements BaseRepository, AccountRepository
{

    public function profile()
    {
        return Auth::user();
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
}