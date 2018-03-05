<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Auth;
use App\Shop;
use App\Config;
use App\PaymentMethod;
use App\Http\Requests;
use App\Helpers\ImageHelper;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\UpdateConfigRequest;
use App\Http\Requests\Validations\UpdateBasicConfigRequest;
use App\Http\Requests\Validations\ToggleMaintenanceModeRequest;

class ConfigController extends Controller
{
    // use Authorizable;

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.config');
    }

   /**
     * Display the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewGeneralSetting()
    {
        $shop = Shop::findOrFail(Auth::user()->merchantId());

        return view('admin.config.general', compact('shop'));
    }

   /**
     * Display the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $config = Config::findOrFail(Auth::user()->merchantId());

        return view('admin.config.index', compact('config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBasicConfig(UpdateBasicConfigRequest $request, $id)
    {
        $config = Config::findOrFail($id);

        $this->authorize('update', $config); // Check permission

        $config->shop->update($request->all());

        if ($request->hasFile('image'))
            ImageHelper::UploadImages($request, 'shops', $id);

        if ($request->input('delete_image') == 1)
            ImageHelper::RemoveImages('shops', $id);

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    public function updateConfig(UpdateConfigRequest $request, $id)
    {
        $config = Config::findOrFail($id);

        $this->authorize('update', $config); // Check permission

        if($config->update($request->all()))
            return response("success", 200);

        return response('error', 405);
    }

    /**
     * Toggle Maintenance Mode of the given id, Its uses the ajax middleware
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  str  $node
     * @return \Illuminate\Http\Response
     */
    public function toggleNotification(Request $request, $node)
    {
        $config = Config::findOrFail($request->user()->merchantId());

        $this->authorize('update', $config); // Check permission

        $config->$node = !$config->$node;

        if($config->save())
            return response("success", 200);

        return response('error', 405);
    }

    /**
     * Toggle Maintenance Mode of the given id, Its uses the ajax middleware
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toggleMaintenanceMode(ToggleMaintenanceModeRequest $request, $id)
    {
        $config = Config::findOrFail($id);

        $this->authorize('update', $config); // Check permission

        $config->maintenance_mode = !$config->maintenance_mode;

        if($config->save())
            return response("success", 200);

        return response('error', 405);
    }

}
