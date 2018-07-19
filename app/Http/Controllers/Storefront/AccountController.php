<?php

namespace App\Http\Controllers\Storefront;

use Auth;
use App\Order;
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
        // Call the methods dynamically to load needed models
        $$tab = $this->$tab();

        return view('dashboard', compact('tab', $tab));
    }

    /**
     * Load dashboard content
     * @return mix
     */
    private function dashboard()
    {
        return [];
    }

    /**
     * Return orders
     * @return collection
     */
    private function orders()
    {
        return Order::where('customer_id', Auth::guard('customer')->user()->id)
                        ->with(['shop:id,name,slug', 'inventories.product:id,slug'])
                        ->get();
    }

    /**
     * Return wishlist
     * @return collection
     */
    private function wishlist()
    {
        return Wishlist::mine()->with('product.inventories:product_id,sale_price')->paginate(7);
    }

    /**
     * Return disputes
     * @return collection
     */
    private function disputes()
    {
        return [];
    }

    /**
     * Return feedbacks
     * @return collection
     */
    private function feedbacks()
    {
        return [];
    }

    /**
     * Return coupons
     * @return collection
     */
    private function coupons()
    {
        return [];
    }

    /**
     * Return account info
     * @return collection
     */
    private function account()
    {
        return [];
    }

    /**
     * Return addresses
     * @return collection
     */
    private function addresses()
    {
        return [];
    }
}
