<?php

namespace App\Repositories\Manufacturer;

use Illuminate\Http\Request;

interface ManufacturerRepository
{
    public function uploadImages(Request $request, $id);

    public function removeImages($id);
}