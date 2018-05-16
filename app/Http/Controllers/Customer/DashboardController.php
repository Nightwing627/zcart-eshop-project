<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Show the customer dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('customer_dashboard');
    }
}
