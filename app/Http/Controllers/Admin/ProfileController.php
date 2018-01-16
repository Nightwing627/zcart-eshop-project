<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Profile\ProfileRepository;
use App\Http\Requests\Validations\UpdatePhotoRequest;
use App\Http\Requests\Validations\DeletePhotoRequest;
use App\Http\Requests\Validations\UpdateProfileRequest;
use App\Http\Requests\Validations\UpdatePasswordRequest;

class ProfileController extends Controller
{
    private $profile;

    /**
     * construct
     */
    public function __construct(ProfileRepository $profile)
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

        return view('admin.profile.profile', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showChangePasswordForm()
    {
        return view('admin.profile._change_password');
    }

    /**
     * Update profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $this->profile->updateProfile($request);

        return redirect()->back()->with('success', trans('messages.profile_updated'));
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
            return redirect()->back()->with('error', trans('messages.incorrect_current_password'));

        $this->profile->updatePassword($request);

        return redirect()->back()->with('success', trans('messages.password_updated'));
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

        return redirect()->back()->with('success', trans('messages.profile_updated'));
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

        return redirect()->back()->with('success', trans('messages.profile_updated'));
    }
}
