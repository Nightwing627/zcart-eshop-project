<?php

namespace App\Jobs;

use App\User;
use App\Shop;
use Carbon\Carbon;
use App\SubscriptionPlan;
use Illuminate\Foundation\Bus\Dispatchable;

class SubscribeShopToNewPlan
{
    use Dispatchable;

    protected $merchant;
    protected $plan;
    protected $token;

    /**
     * Create a new job instance.
     *
     * @param  User  $merchant
     * @param  str  $plan
     * @param  str/Null  $token
     * @return void
     */
    public function __construct(User $merchant, $plan, $token = Null)
    {
        $this->merchant = $merchant;
        $this->plan = $plan;
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $shop = $this->merchant->owns;

        // Create subscription intance
        $subscriptionPlan = SubscriptionPlan::findOrFail($this->plan);
        $subscription = $shop->newSubscription($subscriptionPlan->name, $this->plan);

        $trialDays = (bool) config('system_settings.trial_days') ? config('system_settings.trial_days') : Null;

        // If the merchant has generic trial
        if($shop->trial_ends_at){
            // subtract the used trial days with the new subscription
            $trialDays = Carbon::now()->lt($shop->trial_ends_at) ? Carbon::now()->diffInDays($shop->trial_ends_at) : Null;

            $this->removeGenericTrial($shop);
        }

        // Set trial days
        if($trialDays)
            $subscription->trialDays($trialDays);

        if ($this->token) {
            $subscription->create($this->token, [
                'email' => $this->merchant->email
            ]);
        }
        else if($this->merchant->hasBillingToken()){
            $subscription->create();
        }
        else if ( ! config('system_settings.required_card_upfront') && (bool) config('system_settings.trial_days') ){
            $shop->forceFill([
                'current_billing_plan' => $this->plan,
                'trial_ends_at' => now()->addDays($trialDays),
            ])->save();
        }
    }

    /**
     * Remove generic trial
     *
     * @param  App\Shop   $shop
     * @return [type]
     */
    private function removeGenericTrial(Shop $shop){
        return $shop->forceFill([
                        'trial_ends_at' => Null
                    ])->save();
    }
}
