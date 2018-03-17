<?php

namespace App\Repositories\AttributeValue;

use App\Attribute;
use App\AttributeValue;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;

class EloquentAttributeValue extends EloquentRepository implements BaseRepository, AttributeValueRepository
{
	protected $model;

	public function __construct(AttributeValue $attributeValue)
	{
		$this->model = $attributeValue;
	}

    public function create($id = null)
    {
        return $id ? Attribute::find($id) : null;
   }

    public function store(Request $request)
    {
        $attribute = parent::store($request);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $attribute->id);

        return $attribute;
    }

   public function update(Request $request, $id)
    {
        $attribute = parent::update($request, $id);

        if ($request->input('delete_image') == 1)
            $this->removeImages($attribute->id);

        if ($request->hasFile('image'))
            $this->uploadImages($request, $attribute->id);

        return $attribute;
    }

    public function getAttribute($id)
    {
        return Attribute::findOrFail($id);
    }

    public function destroy($id)
    {
        $this->removeImages($id);

        return parent::destroy($id);
    }

    public function reorder(array $attributeValues)
    {
        foreach ($attributeValues as $id => $order)
        {
            $this->model->findOrFail($id)->update(['order' => $order]);
        }

        return true;
    }

    public function uploadImages(Request $request, $id)
    {
        ImageHelper::UploadImages($request, 'patterns', $id);
    }

    public function removeImages($id)
    {
        ImageHelper::RemoveImages('patterns', $id);
    }
}