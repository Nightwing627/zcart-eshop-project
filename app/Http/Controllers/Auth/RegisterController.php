<?php

namespace App\Http\Controllers\Auth;

use DB;
use Log;
use Auth;
use App\User;
use App\System;
use App\Events\Shop\ShopCreated;
use App\Jobs\CreateShopForMerchant;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Validations\RegisterMerchantRequest;
use App\Notifications\SuperAdmin\VerdorRegistered as VerdorRegisteredNotification;

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
        // Start transaction!
        DB::beginTransaction();

        try {
            $merchant = $this->create($request->all());

            // Dispatching Shop create job
            CreateShopForMerchant::dispatch($merchant, $request->all());

            Auth::guard()->login($merchant);

        } catch(\Exception $e){

            // rollback the transaction and log the error
            DB::rollback();
            Log::error('Vendor Registration Failed: ' . $e->getMessage());

            // add your error messages:
            $error = new \Illuminate\Support\MessageBag();
            $error->add('errors', trans('responses.vendor_config_failed'));

            return redirect()->route('register')->withErrors($error)->withInput();
        }

        // Everything is fine. Now commit the transaction
        DB::commit();

        // Trigger after registration events
        $this->triggerAfterEvents($merchant);

        // Send notification to Admin
        if(config('system_settings.notify_when_vendor_registered')){
            $system = System::orderBy('id', 'asc')->first();
            $system->superAdmin()->notify(new VerdorRegisteredNotification($merchant));
        }

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
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Trigger some events after a valid registration.
     *
     * @param  User  $merchant
     * @return void
     */
    protected function triggerAfterEvents(User $merchant)
    {
        // Trigger the systems default event
        event(new Registered($merchant));

        // Trigger shop created event
        event(new ShopCreated($merchant->owns));

        return;
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
