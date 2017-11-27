<?php

namespace App\Repositories\Carrier;

use Illuminate\Http\Request;

interface CarrierRepository
{
    public function uploadImages(Request $request, $id);

    public function removeImages($id);
}