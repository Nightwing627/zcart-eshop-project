<?php

namespace App\Repositories\Category;

use Illuminate\Http\Request;

interface CategoryRepository
{
    public function syncSubGrps($category, array $subGrpIds);

    public function uploadImages(Request $request, $id);

    public function removeImages($id);
}