<?php

namespace App\Repositories\Profile;

use Illuminate\Http\Request;

interface ProfileRepository
{
    public function profile();

    public function updateProfile(Request $request);

    public function updatePassword(Request $request);
}