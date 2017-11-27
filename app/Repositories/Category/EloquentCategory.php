<?php

namespace App\Repositories\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
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
        return $this->model->with('subGroups')->withCount('products')->get();
    }

    public function store(Request $request)
    {
        $category = parent::store($request);

        $this->syncSubGrps($category, $request->input('cat_sub_grps'));

        if ($request->hasFile('image'))
            $this->uploadImages($request, $category->id);

        return $category;
    }

    public function update(Request $request, $id)
    {
        $category = parent::update($request, $id);

        $this->syncSubGrps($category, $request->input('cat_sub_grps'));

        if ($request->input('delete_image') == 1)
            $this->removeImages($category->id);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $category->id);

        return $category;
    }

	public function destroy($id)
	{
        $this->removeImages($id);

		return parent::destroy($id);
	}

    /**
     * Sync up the list of roles for specified user
     * @param  Category  $category
     * @param  array $roleIds
     * @return void
     */
    public function syncSubGrps($category, array $subGrpIds)
    {
        $category->subGroups()->sync($subGrpIds);
    }

    public function uploadImages(Request $request, $id)
    {
        ImageHelper::UploadImages($request, 'categories', $id);
        ImageHelper::ResizeImage('categories', $id, 800, 200);
    }

    public function removeImages($id)
    {
        ImageHelper::RemoveImages('categories', $id);
    }

}