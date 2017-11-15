<?php namespace App\Http\Controllers\Admin;

use App\Address;
use App\Customer;
use Illuminate\Http\Request;
use App\Common\Authorizable;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateCustomerRequest;
use App\Http\Requests\Validations\UpdateCustomerRequest;

class CustomerController extends Controller
{
    use Authorizable;

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.customer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['customers'] = Customer::all();

        $data['trashes'] = Customer::onlyTrashed()->get();

        return view('admin.customer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomerRequest $request)
    {
        $customer = new Customer($request->all());

        $customer->save();

        // Add the primary address
        $request->merge( [ 'address_title' => $request->input('name') ] ); //Set the address title

        $address = new Address($request->all());

        $customer->addresses()->save($address);

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'customers', $customer->id);
        }

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('admin.customer._show', compact('customer'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function addresses(Customer $customer)
    {
        $data['customer'] = $customer;

        $data['addresses'] = $customer->addresses()->get();

        return view('address.show', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function profile(Customer $customer)
    {
        return view('admin.customer.profile', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customer._edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());

        if($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('customers', $customer->id);
        }

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'customers', $customer->id);
        }

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, Customer $customer)
    {
        $customer->delete();

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
        Customer::onlyTrashed()->find($id)->restore();

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
        $customer = Customer::onlyTrashed()->find($id);

        $customer->flushAddresses();

        $customer->forceDelete();

        ImageHelper::RemoveImages('customers', $id);

        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
    }

}
