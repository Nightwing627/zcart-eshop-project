<?php

namespace App\Http\Controllers\Admin;

use App\SystemConfig;
use App\PaymentMethod;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\UpdateSystemConfigRequest;

class SystemConfigController extends Controller
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
        $system = SystemConfig::orderBy('id', 'asc')->first();

        return view('admin.system.config', compact('system'));
    }

    public function update(UpdateSystemConfigRequest $request)
    {
        $system = SystemConfig::orderBy('id', 'asc')->first();

        $this->authorize('update', $system); // Check permission

        if($system->update($request->all()))
            return response("success", 200);

        return response('error', 405);
    }

    /**
     * Toggle payment method of the given id, Its uses the ajax middleware
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function togglePaymentMethod(UpdateSystemConfigRequest $request, $id)
    {
        // Check permission
        $system = SystemConfig::orderBy('id', 'asc')->first();
        $this->authorize('update', $system);

        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->enabled = !$paymentMethod->enabled;

        if($paymentMethod->save())
            return response("success", 200);

        return response('error', 405);
    }

    /**
     * Toggle notification of the given node, Its uses the ajax middleware
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  str  $node
     * @return \Illuminate\Http\Response
     */
    public function toggleNotification(UpdateSystemConfigRequest $request, $node)
    {
        $system = SystemConfig::orderBy('id', 'asc')->first();

        $this->authorize('update', $system); // Check permission

        $system->$node = !$system->$node;

        if($system->save())
            return response("success", 200);

        return response('error', 405);
    }
}