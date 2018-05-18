<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Profile\ProfileUpdated;
use App\Events\Profile\PasswordUpdated;
use App\Repositories\Account\AccountRepository;
use App\Http\Requests\Validations\UpdatePhotoRequest;
use App\Http\Requests\Validations\DeletePhotoRequest;
use App\Http\Requests\Validations\UpdateProfileRequest;
use App\Http\Requests\Validations\UpdatePasswordRequest;

class AccountController extends Controller
{
    private $profile;

    /**
     * construct
     */
    public function __construct(AccountRepository $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Show the profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $profile = $this->profile->profile();

        return view('admin.account.index', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showChangePasswordForm()
    {
        return view('admin.account._change_password');
    }

    /**
     * Update profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $profile = $this->profile->updateProfile($request);

        event(new ProfileUpdated(Auth::user()));

        return redirect()->route('admin.account.profile')->with('success', trans('messages.profile_updated'));
    }

    /**
     * Update login password only.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        if(! Hash::check($request->input('current_password'), Auth::user()->password) )
            return redirect()->route('admin.account.profile')->with('error', trans('messages.incorrect_current_password'));

        $profile = $this->profile->updatePassword($request);

        event(new PasswordUpdated(Auth::user()));

        return redirect()->route('admin.account.profile')->with('success', trans('messages.password_updated'));
    }

    /**
     * Update Photo only.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePhoto(UpdatePhotoRequest $request)
    {
        $this->profile->updatePhoto($request);

        return redirect()->route('admin.account.profile')->with('success', trans('messages.profile_updated'));
    }

    /**
     * Remove photo from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deletePhoto(DeletePhotoRequest $request)
    {
        $this->profile->deletePhoto($request);

        return redirect()->route('admin.account.profile')->with('success', trans('messages.profile_updated'));
    }
}