<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;

interface UserRepository
{
    public function addresses($user);

    public function saveAdrress(array $address, $user);

    public function uploadImages(Request $request, $id);

    public function removeImages($id);
}