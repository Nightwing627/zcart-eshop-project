<?php

namespace App\Listeners\User;

use App\Events\User\UserUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyUserProfileUpdated
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
     * @param  UserUpdated  $event
     * @return void
     */
    public function handle(UserUpdated $event)
    {
        //
    }
}
