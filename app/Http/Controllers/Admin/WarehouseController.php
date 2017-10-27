<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Address;
use App\Warehouse;
use App\Helpers\ListHelper;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateWarehouseRequest;
use App\Http\Requests\Validations\UpdateWarehouseRequest;

class WarehouseController extends Controller
{

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.warehouse');
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['warehouses'] = Warehouse::mine()->with('manager', 'primaryAddress')->get();

        $data['trashes'] = Warehouse::mine()->onlyTrashed()->get();

        return view('admin.warehouse.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.warehouse._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateWarehouseRequest $request)
    {
        $warehouse = new Warehouse($request->all());

        $warehouse->save();

        $address = new Address($request->all());

        $warehouse->addresses()->save($address);

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'warehouses', $warehouse->id);
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
    public function show(Warehouse $warehouse)
    {
        return view('admin.warehouse._show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['warehouse'] = Warehouse::findOrFail($id);

        return view('admin.warehouse._edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWarehouseRequest $request, $id)
    {
        $warehouse = Warehouse::findOrFail($id);

        $warehouse->update($request->all());

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'warehouses', $warehouse->id);
        }

        if ($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('warehouses', $warehouse->id);
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
        Warehouse::find($id)->delete();

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
        Warehouse::onlyTrashed()->where('id', $id)->restore();

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
        $warehouse = Warehouse::onlyTrashed()->find($id);

        $warehouse->addresses()->delete();

        $warehouse->forceDelete();

        ImageHelper::RemoveImages('warehouses', $id);

        $request->session()->flash('success',  trans('messages.deleted', ['model' => $this->model_name]));

        return back();
    }

}
