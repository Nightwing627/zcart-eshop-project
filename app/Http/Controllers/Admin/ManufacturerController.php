<?php

namespace App\Http\Controllers\Admin;

use App\Manufacturer;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateManufacturerRequest;
use App\Http\Requests\Validations\UpdateManufacturerRequest;

class ManufacturerController extends Controller
{
    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.manufacturer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['manufacturers'] = Manufacturer::with('country')->get();

        $data['trashes'] = Manufacturer::onlyTrashed()->get();

        return view('admin.manufacturer.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manufacturer._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateManufacturerRequest $request)
    {
        $manufacturer = new Manufacturer($request->all());

        $manufacturer->save();

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'manufacturers', $manufacturer->id);
        }

        $request->session()->flash('success', trans('messages.created', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        return view('admin.manufacturer._show', compact('manufacturer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['manufacturer'] = Manufacturer::findOrFail($id);

        return view('admin.manufacturer._edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManufacturerRequest $request, $id)
    {
        $manufacturer = Manufacturer::findOrFail($id);

        $manufacturer->update($request->all());

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'manufacturers', $manufacturer->id);
        }

        if ($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('manufacturers', $manufacturer->id);
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
        Manufacturer::find($id)->delete();

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
        Manufacturer::onlyTrashed()->where('id',$id)->restore();

        $request->session()->flash('success', trans('messages.restored', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Manufacturer::onlyTrashed()->find($id)->forceDelete();

        if ($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('manufacturers', $id);
        }

        $request->session()->flash('success',  trans('messages.deleted', ['model' => $this->model_name]));

        return back();
    }

}
