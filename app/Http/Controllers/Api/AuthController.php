<?php

namespace App\Http\Controllers\Api;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Http\Requests\Validations\RegisterCustomerRequest;
use App\Notifications\Auth\SendVerificationEmail as EmailVerificationNotification;

class AuthController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterCustomerRequest $request)
    {
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'accepts_marketing' => $request->subscribe,
            'verification_token' => str_random(40),
            'active' => 0,
        ]);

        // Sent email address verification notich to customer
        $customer->notify(new EmailVerificationNotification($customer));

        $customer->generateToken();

        return new CustomerResource($customer);
    }

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('customer')->attempt($credentials)) {

            $customer = Auth::guard('customer')->user();
            $customer->generateToken();

            return new CustomerResource($customer);
        } else {

            return response()->json(['error' => 'Unauthorized, check your credentials.'], 401);
        }
    }

    public function logout(Request $request)
    {
        $customer = Auth::guard('api')->user();

        if ($customer) {
            $customer->api_token = null;
            $customer->save();
        }

        return response()->json(['data' => 'Customer logged out.'], 200);
    }
}