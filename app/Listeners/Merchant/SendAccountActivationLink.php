<?php

namespace App\Listeners\Merchant;

use App\Events\Merchant\MerchantRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAccountActivationLink
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
     * @param  MerchantRegistered  $event
     * @return void
     */
    public function handle(MerchantRegistered $event)
    {
        \Log::info('Sending Activation line to the Merchant at ' . $event->merchant->email);
    }
}
