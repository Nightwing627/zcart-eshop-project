<?php

namespace App\Repositories\Product;

use Auth;
use App\Product;
use App\Common\Taggable;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentProduct extends EloquentRepository implements BaseRepository, ProductRepository
{
    use Taggable;

	protected $model;

	public function __construct(Product $product)
	{
		$this->model = $product;
	}

	public function all()
	{
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->with('categories')->withCount('inventories')->get();

		return $this->model->with('categories')->withCount('inventories')->get();
	}

	public function trashOnly()
	{
        if (!Auth::user()->isFromPlatform())
            return $this->model->mine()->onlyTrashed()->with('categories')->get();

		return $this->model->onlyTrashed()->with('categories')->get();
	}

    public function store(Request $request)
    {
        $product = parent::store($request);

        if ($request->input('category_list'))
	        $this->syncCategories($product, $request->input('category_list'));

        if ($request->input('tag_list'))
            $this->syncTags($product, $request->input('tag_list'));

        if ($request->hasFile('image'))
            $this->uploadImages($request, $product->id);

        return $product;
    }

    public function update(Request $request, $id)
    {
        $product = parent::update($request, $id);

        $this->syncCategories($product, $request->input('category_list', []));

        $this->syncTags($product, $request->input('tag_list', []));

        if ($request->input('delete_image') == 1)
            $this->removeImages($product->id);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $product->id);

        return $product;
    }

	public function destroy($id)
	{
        $this->removeImages($id);

        $this->detachTags($id, 'product');

        return parent::destroy($id);
	}

    public function uploadImages(Request $request, $id)
    {
        ImageHelper::UploadImages($request, 'products', $id);
    }

    public function removeImages($id)
    {
        ImageHelper::RemoveImages('products', $id);
    }

    public function syncCategories($product, array $catIds)
    {
        $product->categories()->sync($catIds);
    }
}