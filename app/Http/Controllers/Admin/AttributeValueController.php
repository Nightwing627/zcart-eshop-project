<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Attribute;
use App\AttributeValue;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateAttributeValueRequest;
use App\Http\Requests\Validations\UpdateAttributeValueRequest;

class AttributeValueController extends Controller
{
    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.attribute_value');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $data['attribute'] = $id ? Attribute::find($id) : null;

        return view('admin.attribute-value._create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAttributeValueRequest $request)
    {
        $attribute_value = new AttributeValue($request->all());

        $attribute_value->save();

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'patterns', $attribute_value->id);
        }

        $request->session()->flash('success', trans('messages.created', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Display all Attribute Values the specified Attribute.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeValue $attributeValue)
    {
        return view('admin.attribute-value._show', compact('attributeValue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['attributeValue'] = AttributeValue::findOrFail($id);

        $data['attribute'] = Attribute::findOrFail($data['attributeValue']->attribute_id);

        return view('admin.attribute-value._edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttributeValueRequest $request, $id)
    {
        $attribute_value = AttributeValue::findOrFail($id);

        $attribute_value->update($request->all());

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'patterns', $attribute_value->id);
        }

        if ($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('patterns', $attribute_value->id);
        }

        $request->session()->flash('success', trans('messages.updated', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, $id)
    {
        $attribute_value = AttributeValue::findOrFail($id);

        $attribute_value->delete();

        $request->session()->flash('success', trans('messages.trashed', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Restore the specified resource from soft delete.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        $attribute_value = AttributeValue::onlyTrashed()->find($id)->restore();

        $request->session()->flash('success', trans('messages.restored', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $attribute_value = AttributeValue::onlyTrashed()->find($id)->forceDelete();

        ImageHelper::RemoveImages('patterns', $id);

        $request->session()->flash('success',  trans('messages.deleted', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Save sorting order for attributes by ajax
     */
    public function reorder(Request $request)
    {
        foreach ($request->all() as $index => $order)
        {
            AttributeValue::where('id', $index)->update(['order' => $order]);
        }

        return response('success!', 200);
    }

}
