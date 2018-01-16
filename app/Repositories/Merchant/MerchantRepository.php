<?php

namespace App\Repositories\Merchant;

use Illuminate\Http\Request;

interface MerchantRepository
{
    public function addresses($merchant);

    public function saveAdrress(array $address, $merchant);

    public function uploadImages(Request $request, $id);

    public function removeImages($id);
}