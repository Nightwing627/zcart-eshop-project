<?php

namespace App\Http\Controllers\Admin;

use App\Shop;
use App\User;
use App\Address;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateShopRequest;
use App\Http\Requests\Validations\UpdateShopRequest;

class ShopController extends Controller
{
    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.shop');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['shops'] = Shop::with('owner', 'primaryAddress')->get();

        $data['trashes'] = Shop::onlyTrashed()->get();

        return view('admin.shop.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staffs($shop)
    {
        $data['shop'] = Shop::find($shop);

        $data['staffs'] = $data['shop']->staffs()->with('role', 'primaryAddress')->get();

        $data['trashes'] = $data['shop']->staffs()->onlyTrashed()->get();

        return view('admin.shop.staffs', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateShopRequest $request)
    {
        $shop = new Shop($request->all());

        $shop->save();

        $address = new Address($request->all());

        $shop->addresses()->save($address);

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'shops', $shop->id);
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
    public function show(Shop $shop)
    {
        return view('admin.shop._show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['shop'] = Shop::findOrFail($id);

        return view('admin.shop._edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopRequest $request, $id)
    {
        $shop = Shop::findOrFail($id);

        $shop->update($request->all());

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'shops', $shop->id);
        }

        if ($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('shops', $shop->id);
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
        Shop::find($id)->delete();

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
        Shop::onlyTrashed()->where('id',$id)->restore();

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
        $shop = Shop::onlyTrashed()->find($id);

        $shop->flushAddresses();

        $shop->staffs()->forceDelete();

        $shop->forceDelete();

        ImageHelper::RemoveImages('shops', $id);

        $request->session()->flash('success',  trans('messages.deleted', ['model' => $this->model_name]));

        return back();
    }

}
