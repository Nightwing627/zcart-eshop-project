<?php

namespace App\Http\Controllers\Admin;

use App\PaymentStatus;
use App\EmailTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreatePaymentStatusRequest;
use App\Http\Requests\Validations\UpdatePaymentStatusRequest;

class PaymentStatusController extends Controller
{

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.payment_status');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['statuses'] = PaymentStatus::all();

        $data['trashes'] = PaymentStatus::onlyTrashed()->get();

        return view('admin.payment-status.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['email_templates'] = $this->getEmailTemplateList();
        return view('admin.payment-status._create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePaymentStatusRequest $request)
    {
        $payment_status = new PaymentStatus($request->all());

        $payment_status->save();

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['email_templates'] = $this->getEmailTemplateList();

        $data['status'] = PaymentStatus::findOrFail($id);

        return view('admin.payment-status._edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentStatusRequest $request, $id)
    {
        $payment_status = PaymentStatus::findOrFail($id);

        $payment_status->update($request->all());

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
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
        PaymentStatus::find($id)->delete();
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
        PaymentStatus::onlyTrashed()->where('id',$id)->restore();
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
        PaymentStatus::onlyTrashed()->find($id)->forceDelete();
        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
    }

    /**
     * Return email template list for dropdown
     */
    private function getEmailTemplateList()
    {
        return EmailTemplate::orderBy('name', 'asc')->pluck('name', 'id');
    }

}
