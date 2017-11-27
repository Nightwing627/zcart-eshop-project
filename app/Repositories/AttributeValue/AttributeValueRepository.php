<?php

namespace App\Repositories\AttributeValue;

use Illuminate\Http\Request;

interface AttributeValueRepository
{
    public function create($id = Null);

    public function getAttribute($id);

    public function reorder(array $attributeValues);

    public function uploadImages(Request $request, $id);

    public function removeImages($id);
}