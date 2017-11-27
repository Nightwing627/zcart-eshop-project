<?php

namespace App\Repositories\PaymentMethod;

use Illuminate\Http\Request;

interface PaymentMethodRepository
{
    public function uploadImages(Request $request, $id);

    public function removeImages($id);
}