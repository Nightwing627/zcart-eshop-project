<?php namespace App\Http\Controllers\Admin;

use App\Manufacturer;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateManufacturerRequest;
use App\Http\Requests\Validations\UpdateManufacturerRequest;

class ManufacturerController extends Controller
{
    use Authorizable;

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

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
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
     * @param  Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        return view('admin.manufacturer._edit', compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Manufacturer $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $manufacturer->update($request->all());

        if ($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('manufacturers', $manufacturer->id);
        }

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'manufacturers', $manufacturer->id);
        }

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Manufacturer $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, Manufacturer $manufacturer)
    {
        $manufacturer->delete();

        return back()->with('success', trans('messages.trashed', ['model' => $this->model_name]));
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

        return back()->with('success', trans('messages.restored', ['model' => $this->model_name]));
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

        ImageHelper::RemoveImages('manufacturers', $id);

        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
    }

}
