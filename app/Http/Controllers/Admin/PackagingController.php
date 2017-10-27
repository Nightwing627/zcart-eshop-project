<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Packaging;
use App\Http\Requests;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreatePackagingRequest;
use App\Http\Requests\Validations\UpdatePackagingRequest;

class PackagingController extends Controller
{

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.packaging');
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['packagings'] = Packaging::mine()->get();

        $data['trashes'] = Packaging::mine()->onlyTrashed()->get();

        return view('admin.packaging.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.packaging._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePackagingRequest $request)
    {
        $packaging = new Packaging($request->all());

        $packaging->save();

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'packagings', $packaging->id);
        }

        $request->session()->flash('success', trans('messages.created', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Packaging $packaging)
    {
        return view('admin.packaging._edit', compact('packaging'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackagingRequest $request, $id)
    {
        $packaging = Packaging::findOrFail($id);

        $packaging->update($request->all());

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'packagings', $packaging->id);
        }

        if ($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('packagings', $packaging->id);
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
        Packaging::find($id)->delete();

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
        Packaging::onlyTrashed()->find($id)->restore();

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
        Packaging::onlyTrashed()->find($id)->forceDelete();

        ImageHelper::RemoveImages('packagings', $id);

        $request->session()->flash('success',  trans('messages.deleted', ['model' => $this->model_name]));

        return back();
    }

}
