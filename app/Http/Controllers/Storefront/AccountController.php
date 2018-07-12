<?php

namespace App\Http\Controllers\Storefront;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Show the customer dashboard.
     *
     * @return Response
     */
    public function index($tab = 'dashboard')
    {
    	$products = Product::paginate(10);

        return view('dashboard', compact('tab', 'products'));
    }
}
