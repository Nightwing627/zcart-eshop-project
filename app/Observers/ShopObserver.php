<?php

namespace App\Observers;

use App\Shop;
use App\User;

class ShopObserver
{
    /**
     * Listen to the Shop created event.
     *
     * @param  \App\Shop  $shop
     * @return void
     */
    public function created(Shop $shop)
    {
        $user = User::find($shop->owner_id);
        $user->shop_id = $shop->id;
        $user->save();
    }

    /**
     * Listen to the Shop deleting event.
     *
     * @param  \App\Shop  $shop
     * @return void
     */
    public function deleting(Shop $shop)
    {
        //
    }
}