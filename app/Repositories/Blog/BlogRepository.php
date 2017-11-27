<?php

namespace App\Repositories\Blog;

use Illuminate\Http\Request;

interface BlogRepository
{
    public function syncTags($id, array $tagIds);

    public function detachTags($id, $taggable);

    public function uploadImages(Request $request, $id);

    public function removeImages($id);
}