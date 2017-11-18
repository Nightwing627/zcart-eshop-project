<?php namespace App\Http\Controllers\Admin;

use App\Tax;
use App\Carrier;
use App\Http\Requests;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateCarrierRequest;
use App\Http\Requests\Validations\UpdateCarrierRequest;

class CarrierController extends Controller
{
    use Authorizable;

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.carrier');
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['carriers'] = Carrier::mine()->get();

        $data['trashes'] = Carrier::mine()->onlyTrashed()->get();

        return view('admin.carrier.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carrier._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCarrierRequest $request)
    {
        $carrier = new Carrier($request->all());

        $carrier->save();

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'carriers', $carrier->id);
        }

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Carrier $carrier)
    {
        return view('admin.carrier._show', compact('carrier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Carrier $carrier
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrier $carrier)
    {
        return view('admin.carrier._edit', compact('carrier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Carrier  $carrier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarrierRequest $request, Carrier $carrier)
    {
        $carrier->update($request->all());

        if ($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('carriers', $carrier->id);
        }

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'carriers', $carrier->id);
        }

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Carrier $carrier
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, Carrier $carrier)
    {
        $carrier->delete();

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
        Carrier::onlyTrashed()->find($id)->restore();

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
        Carrier::onlyTrashed()->find($id)->forceDelete();

        ImageHelper::RemoveImages('carriers', $id);

        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
    }

}
