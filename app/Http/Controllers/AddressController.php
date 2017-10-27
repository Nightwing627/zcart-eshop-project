<?php

namespace App\Http\Controllers;

use App\State;
use App\Address;
use Illuminate\Http\Request;
use App\Http\Requests\Validations\CreateAddressRequest;
use App\Http\Requests\Validations\UpdateAddressRequest;

class AddressController extends Controller
{
    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.address');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addresses($addressable_type, $addressable_id)
    {
        $addressable = $this->getAddressableModel($addressable_type, $addressable_id);

        $data['addressable_type'] = strtolower(class_basename($addressable));

        $data['addressable'] = $addressable;

        $data['addresses'] = $addressable->addresses()->with('country', 'state')->get();

        return view('address.show', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($addressable_type, $addressable_id)
    {
        $addressable_type = get_qualified_model($addressable_type);

        return view('address._create', compact(['addressable_type', 'addressable_id']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAddressRequest $request)
    {
        $address = new Address($request->all());

        $address->save();

        $request->session()->flash('success', trans('messages.created', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        return view('address._edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request, $id)
    {
        $address = Address::findOrFail($id);

        $address->update($request->all());

        $request->session()->flash('success', trans('messages.updated', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $address = Address::findOrFail($id);

        $address->delete();

        $request->session()->flash('success', trans('messages.deleted', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Get Addressable Model
     *
     * @param  string $type model name
     * @param  int $model id
     *
     * @return collection
     */
    private function getAddressableModel($addressable_type, $addressable_id)
    {
        $addressableClass = get_qualified_model($addressable_type);

        $addressable = new $addressableClass();

        return $addressable->find($addressable_id);
    }

    /**
     * Response AJAX call to return states of a give country
     */
    public function ajaxCountryStates(Request $request)
    {
        if ($request->ajax())
        {
            $id = $request->input('id');

            $states = State::where('country_id', $id)->orderBy('name', 'asc')->pluck('name', 'id');

            return response($states, 200);
        }

        return response('Not allowed!', 404);
    }

}
