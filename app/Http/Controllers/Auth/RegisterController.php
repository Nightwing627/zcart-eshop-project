<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Jobs\CreateShopForMerchant;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use App\Events\Merchant\MerchantRegistered;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Validations\RegisterMerchantRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterMerchantRequest $request)
    {
        $merchant = $this->create($request->all());

        event(new Registered($merchant));

        Auth::guard()->login($merchant);

        return $this->registered($request, $merchant)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $merchant = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // Dispatching Shop create job
        CreateShopForMerchant::dispatch($merchant, $data['shop_name']);

        event(new MerchantRegistered($merchant));

        return $merchant;
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered($request, $user)
    {
        //
    }
}
