<?php

namespace App\Http\Controllers\Storefront;

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
        return view('dashboard');
    }
}
