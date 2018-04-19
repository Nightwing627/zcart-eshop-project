<?php

namespace App\Listeners\Ticket;

use App\System;
use App\Events\Ticket\TicketCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Ticket\TicketCreated as TicketCreatedNotification;

class NotifyPlatformTicketCreated implements ShouldQueue
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
     * @param  TicketCreated  $event
     * @return void
     */
    public function handle(TicketCreated $event)
    {
        $system = System::orderBy('id', 'asc')->first();

        $system->notify(new TicketCreatedNotification($event->ticket));
    }
}
