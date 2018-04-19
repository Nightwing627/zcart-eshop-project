<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\System;
use App\Http\Requests;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Events\System\SystemIsLive;
use App\Events\System\SystemInfoUpdated;
use App\Events\System\DownForMaintainace;
use App\Http\Requests\Validations\UpdateSystemRequest;
use App\Http\Requests\Validations\UpdateBasicSystemConfigRequest;

class SystemController extends Controller
{
    use Authorizable;

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
    public function view()
    {
        $system = System::orderBy('id', 'asc')->first();

        return view('admin.system.general', compact('system'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBasicSystemConfigRequest $request)
    {
        $system = System::orderBy('id', 'asc')->first();

        $this->authorize('update', $system); // Check permission

        $system->update($request->except('image', 'delete_image'));

        event(new SystemInfoUpdated($system));

        if ($request->hasFile('image') || ($request->input('delete_image') == 1))
            $system->deleteImage();

        if ($request->hasFile('image'))
            $system->saveImage($request->file('image'));

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Toggle Maintenance Mode of the given id, Its uses the ajax middleware
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toggleMaintenanceMode(UpdateSystemRequest $request)
    {
        $system = System::orderBy('id', 'asc')->first();

        $this->authorize('update', $system); // Check permission

        $system->maintenance_mode = !$system->maintenance_mode;

        if($system->save()){
            if($system->maintenance_mode)
                event(new DownForMaintainace($system));
            else
                event(new SystemIsLive($system));

            return response("success", 200);
        }

        return response('error', 405);
    }
}
