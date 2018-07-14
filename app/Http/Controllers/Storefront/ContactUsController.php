<?php

namespace App\Http\Controllers\Storefront;

// use Auth;
// use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function show_contact_form()
    {
        return view('contact_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request)
    {
        $cart->store($request->all());

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

}
