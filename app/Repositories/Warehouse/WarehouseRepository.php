<?php

namespace App\Repositories\Warehouse;

use Illuminate\Http\Request;

interface WarehouseRepository
{
    public function saveAdrress(array $address, $aarehouse);

    public function uploadImages(Request $request, $id);

    public function removeImages($id);
}