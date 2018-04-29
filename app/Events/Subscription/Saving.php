<?php

namespace App\Events\Subscription;

use App\SubscriptionPlan;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class Saving
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(SubscriptionPlan $subscriptionPlan)
    {
        if($subscriptionPlan->featured){
            SubscriptionPlan::where('featured', 1)->update(['featured' => 0]);
        }
    }
}
