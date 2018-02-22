<?php

namespace App\Repositories\Packaging;

use Illuminate\Http\Request;

interface PackagingRepository
{
    public function removeDefault();

    public function uploadImages(Request $request, $id);

    public function removeImages($id);
}