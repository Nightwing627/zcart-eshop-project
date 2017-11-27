<?php

namespace App\Repositories\Customer;

use Illuminate\Http\Request;

interface CustomerRepository
{
    public function profile($id);

    public function addresses($customer);

    public function saveAdrress(array $address, $customer);

    public function uploadImages(Request $request, $id);

    public function removeImages($id);
}