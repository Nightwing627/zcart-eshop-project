<?php

namespace App\Http\Controllers\Storefront;

use Auth;
use App\Product;
use App\Wishlist;
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

        $wishlists = Wishlist::mine()->with('product.inventories:product_id,sale_price')->paginate(7);

        $orders = Auth::user()->orders;
        // echo "<pre>"; print_r($orders); echo "</pre>"; exit();

        return view('dashboard', compact('tab', 'orders', 'wishlists', 'products'));
    }
}
