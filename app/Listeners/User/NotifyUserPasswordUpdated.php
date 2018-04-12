<?php

namespace App\Listeners\User;

use App\Events\User\PasswordUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyUserPasswordUpdated
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
     * @param  PasswordUpdated  $event
     * @return void
     */
    public function handle(PasswordUpdated $event)
    {
        //
    }
}
