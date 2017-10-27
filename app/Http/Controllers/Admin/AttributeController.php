<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Attribute;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateAttributeRequest;
use App\Http\Requests\Validations\UpdateAttributeRequest;

class AttributeController extends Controller
{
    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.attribute');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['attributes'] = Attribute::with(['attributeValues', 'attributeType'])->get();

        $data['trashes'] = Attribute::onlyTrashed()->get();

        return view('admin.attribute.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribute._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAttributeRequest $request)
    {
        $attribute = new Attribute($request->all());

        $attribute->save();

        $request->session()->flash('success', trans('messages.created', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Display all Attribute Values the specified Attribute.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function entities($id)
    {
        $data['attribute'] = Attribute::find($id);

        $data['attributeValues'] = $data['attribute']->attributeValues()->get();

        $data['trashes'] = $data['attribute']->attributeValues()->onlyTrashed()->get();

        return view('admin.attribute.entities', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        return view('admin.attribute._edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttributeRequest $request, $id)
    {
        $attribute = Attribute::findOrFail($id);

        $attribute->update($request->all());

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
        Attribute::find($id)->delete();

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
        Attribute::onlyTrashed()->find($id)->restore();

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
        Attribute::onlyTrashed()->find($id)->forceDelete();

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
            Attribute::where('id', $index)->update(['order' => $order]);
        }

        return response('success!', 200);
    }

    /**
     * Response AJAX call to check if the attribute is a color/pattern type or not
     */
    public function ajaxGetParrentAttributeType(Request $request)
    {
        if ($request->ajax())
        {
            $id = $request->input('id');

            $type_id = Attribute::findOrFail($id)->attribute_type_id;

            return response("$type_id", 200);
        }

        return response('Not allowed!', 404);
    }

}
