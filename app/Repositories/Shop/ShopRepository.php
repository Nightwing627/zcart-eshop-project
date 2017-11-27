<?php

namespace App\Repositories\Shop;

use Illuminate\Http\Request;

interface ShopRepository
{
    public function staffs($shop);

    public function staffsTrashOnly($shop);

    public function saveAdrress(array $address, $shop);

    public function uploadImages(Request $request, $id);

    public function removeImages($id);
}