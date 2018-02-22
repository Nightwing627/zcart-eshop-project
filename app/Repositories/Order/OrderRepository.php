<?php

namespace App\Repositories\Order;

use Illuminate\Http\Request;

interface OrderRepository
{
    public function getCustomer($id);

    public function getCart($id);

    public function getCartList($customerId);

    public function syncInventory($order, array $cart);

    // public function getShippingCost(Request $request);

    // public function getPackagingCost(Request $request);
}