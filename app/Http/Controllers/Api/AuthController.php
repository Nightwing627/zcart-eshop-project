<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Notifications\Auth\SendVerificationEmail as EmailVerificationNotification;

class AuthController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:customers',
            'password' => 'required|string|min:6|confirmed',
            'agree' => 'required',
        ]);

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

        return response()->json(['data' => $customer->toArray()], 201);
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

            return response()->json([
                'data' => $customer->toArray(),
            ]);
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