<?php

namespace App\Http\Controllers\Admin;

use App\Shop;
use App\Address;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateShopRequest;
use App\Http\Requests\Validations\UpdateShopRequest;

class ShopController extends Controller
{
    use Authorizable;

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
     * @param  Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function staffs(Shop $shop)
    {
        $staffs = $shop->staffs()->with('role', 'primaryAddress')->get();

        $trashes = $shop->staffs()->onlyTrashed()->get();

        return view('admin.shop.staffs', compact('shop', 'staffs', 'trashes'));
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

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return view('admin.shop._show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view('admin.shop._edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        $shop->update($request->all());

        if ($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('shops', $shop->id);
        }

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'shops', $shop->id);
        }

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, Shop $shop)
    {
        $shop->delete();

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
        Shop::onlyTrashed()->where('id',$id)->restore();

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
        $shop = Shop::onlyTrashed()->find($id);

        $shop->flushAddresses();

        $shop->staffs()->forceDelete();

        $shop->forceDelete();

        ImageHelper::RemoveImages('shops', $id);

        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
    }

}
