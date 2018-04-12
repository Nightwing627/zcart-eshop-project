<?php

namespace App\Listeners\Shop;

use App\Events\Shop\ShopCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyMerchant
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ShopCreated  $event
     * @return void
     */
    public function handle(ShopCreated $event)
    {
        \Log::info('Notifying Merchant about shop ' . $event->shop->name);
    }
}
