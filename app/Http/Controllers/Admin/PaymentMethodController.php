<?php namespace App\Http\Controllers\Admin;

use App\PaymentMethod;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreatePaymentMethodRequest;
use App\Http\Requests\Validations\UpdatePaymentMethodRequest;

class PaymentMethodController extends Controller
{
    use Authorizable;

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.payment_method');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['payment_methods'] = PaymentMethod::all();

        $data['trashes'] = PaymentMethod::onlyTrashed()->get();

        return view('admin.payment-method.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment-method._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePaymentMethodRequest $request)
    {
        $payment_method = new PaymentMethod($request->all());

        $payment_method->save();

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'payment-methods', $payment_method->id);
        }

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        return view('admin.payment-method._edit', compact('paymentMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod->update($request->all());

        if ($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('payment-methods', $paymentMethod->id);
        }

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'payment-methods', $paymentMethod->id);
        }

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  PaymentMethod $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();

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
        PaymentMethod::onlyTrashed()->where('id', $id)->restore();

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
        PaymentMethod::onlyTrashed()->find($id)->forceDelete();

        ImageHelper::RemoveImages('payment-methods', $id);

        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
    }

}
