<?php

namespace App\Repositories\Cart;

use Illuminate\Http\Request;

interface CartRepository
{
    public function syncCartItems($cart, array $items);
}