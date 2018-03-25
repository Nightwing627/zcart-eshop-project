<?php

namespace App\Repositories\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentCategory extends EloquentRepository implements BaseRepository, CategoryRepository
{
	protected $model;

	public function __construct(Category $category)
	{
		$this->model = $category;
	}

    public function all()
    {
        return $this->model->with('subGroups', 'image')->withCount('products')->get();
    }

    public function trashOnly()
    {
        return $this->model->with('image')->onlyTrashed()->get();
    }

    public function store(Request $request)
    {
        $category = parent::store($request);

        $category->subGroups()->sync($request->input('cat_sub_grps'));

        if ($request->hasFile('image'))
            $category->saveImage($request->file('image'));

        return $category;
    }

    public function update(Request $request, $id)
    {
        $category = parent::update($request, $id);

        $category->subGroups()->sync($request->input('cat_sub_grps'));

        if ($request->hasFile('image') || ($request->input('delete_image') == 1))
            $category->deleteImage();

        if ($request->hasFile('image'))
            $category->saveImage($request->file('image'));

        return $category;
    }

	public function destroy($id)
	{
        $category = parent::findTrash($id);

        $category->flushImages();

        return $category->forceDelete();
	}
}