<?php

namespace App\Http\Controllers\Admin;

use App\Address;
use App\Supplier;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateSupplierRequest;
use App\Http\Requests\Validations\UpdateSupplierRequest;

class SupplierController extends Controller
{
    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.supplier');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['suppliers'] = Supplier::mine()->with('shop', 'primaryAddress')->get();

        $data['trashes'] = Supplier::mine()->onlyTrashed()->get();

        return view('admin.supplier.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSupplierRequest $request)
    {
        $supplier = new Supplier($request->all());

        $supplier->save();

        $address = new Address($request->all());

        $supplier->addresses()->save($address);

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'suppliers', $supplier->id);
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
    public function show(Supplier $supplier)
    {
        return view('admin.supplier._show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['supplier'] = Supplier::findOrFail($id);

        return view('admin.supplier._edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierRequest $request, $id)
    {

        $supplier = Supplier::findOrFail($id);

        $supplier->update($request->all());

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'suppliers', $supplier->id);
        }

        if ($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('suppliers', $supplier->id);
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
        Supplier::find($id)->delete();

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
        Supplier::onlyTrashed()->where('id', $id)->restore();

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
        $supplier = Supplier::onlyTrashed()->find($id);

        $supplier->addresses()->delete();

        $supplier->forceDelete();

        ImageHelper::RemoveImages('suppliers', $id);

        $request->session()->flash('success',  trans('messages.deleted', ['model' => $this->model_name]));

        return back();
    }

}
