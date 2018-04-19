<?php

namespace App\Listeners\User;

use App\Events\User\UserUpdated;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\User\ProfileUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyUserProfileUpdated implements ShouldQueue
{
    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;

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
        $event->user->notify(new ProfileUpdated($event->user));
    }
}
