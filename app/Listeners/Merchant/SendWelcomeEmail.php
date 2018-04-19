<?php

namespace App\Listeners\Merchant;

use App\Events\Merchant\MerchantRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail
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
        //
    }
}
