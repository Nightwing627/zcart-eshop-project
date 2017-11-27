<?php

namespace App\Repositories\Product;

use Illuminate\Http\Request;

interface ProductRepository
{
    public function syncCategories($product, array $catIds);

    public function syncTags($id, array $tagIds);

    public function detachTags($id, $taggable);

    public function uploadImages(Request $request, $id);

    public function removeImages($id);
}