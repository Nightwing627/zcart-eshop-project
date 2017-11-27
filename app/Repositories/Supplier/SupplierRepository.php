<?php

namespace App\Repositories\Supplier;

use Illuminate\Http\Request;

interface SupplierRepository
{
    public function saveAdrress(array $address, $supplier);

    public function uploadImages(Request $request, $id);

    public function removeImages($id);
}