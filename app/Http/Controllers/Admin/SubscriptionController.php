<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Shop;
use Carbon\Carbon;
use App\SubscriptionPlan;
use App\Helpers\Statistics;
use Illuminate\Http\Request;
use App\Jobs\SubscribeShopToNewPlan;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\UpdateTrialPeriodRequest;

class SubscriptionController extends Controller
{
    /**
     * Display the subscription features.
     *
     * @param  \App\SubscriptionPlan  $subscriptionPlan
     * @return \Illuminate\Http\Response
     */
    public function features(SubscriptionPlan $subscriptionPlan)
    {
        return view('admin.subscription_plan._show', compact('subscriptionPlan'));
    }

    /**
     * Subscribe Or Swap to the given subscription
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $plan
     * @param  int $merchant
     *
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request, $plan, $merchant = Null)
    {
        if( config('app.demo') == true && $request->user()->merchantId() <= config('system.demo.shops', 1) )
            return redirect()->route('admin.account.billing')->with('warning', trans('messages.demo_restriction'));

		$merchant = $merchant ? User::findOrFail($merchant) : Auth::user();

        if ( config('system_settings.required_card_upfront') && ! $merchant->hasBillingToken() )
            return redirect()->route('admin.account.billing')->with('error', trans('messages.no_card_added'));

        // create the subscription
        try {
            $subscription = SubscriptionPlan::findOrFail($plan);

            // If the merchant already has any subscription then just swap to new plan
            if ($currentPlan = $merchant->getCurrentPlan()) {
                if(! $this->validateSubscriptionSwap($subscription)) {
                    return redirect()->route('admin.account.billing')
                    ->with('error', trans('messages.using_more_resource', ['plan' => $subscription->name]));
                }

                $currentPlan->swap($plan)->update([ 'name' => $subscription->name ]);

                $merchant->shop->forceFill([
                    'current_billing_plan' => $plan
                ])->save();
            }
            else{
                // Subscribe the merchant to the given plan
                SubscribeShopToNewPlan::dispatch($merchant, $plan);
            }
        } catch (\Exception $e) {
            \Log::error('Subscription Failed: ' . $e->getMessage());

	        return redirect()->route('admin.account.billing')->with('error', trans('messages.subscription_error'));
        }

        return redirect()->route('admin.account.billing')->with('success', trans('messages.subscribed'));
    }

    /**
     * Update the shop's card info
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateCardinfo(Request $request)
    {
        if( config('app.demo') == true && $request->user()->merchantId() <= config('system.demo.shops', 1) )
            return redirect()->route('admin.account.billing')->with('warning', trans('messages.demo_restriction'));

        try {
            $ccToken = $request->input('cc_token');

            if ($request->user()->hasBillingToken()) {
                $request->user()->shop->updateCard($ccToken);
            }
            else{
                $request->user()->shop->createAsStripeCustomer($ccToken, [
                    'email' => $request->user()->email
                ]);
            }
        }
        catch(\Stripe\Error\Card $e){
            $response = $e->getJsonBody();

            return redirect()->route('admin.account.billing')->with(['error' => $response['error']['message']]);
        }

        return redirect()->route('admin.account.billing')->with('success', trans('messages.card_updated'));
    }

    /**
     * Resume subscription
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resumeSubscription(Request $request)
    {
        if( config('app.demo') == true && $request->user()->merchantId() <= config('system.demo.shops', 1) )
            return redirect()->route('admin.account.billing')->with('warning', trans('messages.demo_restriction'));

        try {
            $request->user()->getCurrentPlan()->resume();
        }
        catch(\Stripe\Error\Card $e){
            $response = $e->getJsonBody();
            return redirect()->route('admin.account.billing')->with('error', $response['error']['message']);
        }

        return redirect()->route('admin.account.billing')->with('success', trans('messages.subscription_resumed'));
    }

    /**
     * Cancel subscription
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cancelSubscription(Request $request)
    {
        if( config('app.demo') == true && $request->user()->merchantId() <= config('system.demo.shops', 1) )
            return redirect()->route('admin.account.billing')->with('warning', trans('messages.demo_restriction'));

        try {
            $request->user()->getCurrentPlan()->cancel();
        }
        catch(\Stripe\Error\Card $e){
            $response = $e->getJsonBody();
            return redirect()->route('admin.account.billing')->with(['error' => $response['error']['message']]);
        }

        return redirect()->route('admin.account.billing')->with('success', trans('messages.subscription_cancelled'));
    }

    /**
     * Update subscription trial priod
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Shop    $shop
     *
     * @return \Illuminate\Http\Response
     */
    public function editTrial(Request $request, Shop $shop)
    {
        return view('admin.shop._edit_trial', compact('shop'));
    }

    /**
     * Update subscription trial priod
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Shop    $shop
     *
     * @return \Illuminate\Http\Response
     */
    public function updateTrial(UpdateTrialPeriodRequest $request, Shop $shop)
    {
        try {
            $new_end_time = Carbon::createFromFormat('Y-m-d h:i a', $request->trial_ends_at)->timestamp;

            if($shop->hasBillingToken()){
                $currentPlan = $shop->owner->getCurrentPlan();

                $currentPlan->swap($shop->current_billing_plan)->update([ 'trial_ends_at' => $new_end_time ]);
            }

            if( $shop->onGenericTrial() || $shop->hasExpiredOnGenericTrial() ){
                $shop->forceFill([
                    'trial_ends_at' => $new_end_time,
                    'hide_trial_notice' => $request->hide_trial_notice,
                ])->save();
            }
        } catch (\Exception $e) {
            \Log::error('Subscription Trial Period Update Failed: ' . $e->getMessage());

            return back()->with('error', trans('messages.subscription_update_failed'));
        }

        return back()->with('success', trans('messages.subscription_updated'));
    }

    /**
     * Validate new plan with the current plan
     *
     * @param  App\SubscriptionPlan $plan
     * @return bool
     */
    private function validateSubscriptionSwap(SubscriptionPlan $plan)
    {
        $resources = [
            'users' => Statistics::shop_user_count(),
            'inventories' => Statistics::shop_inventories_count(),
        ];

        if($resources['users'] > $plan->team_size || $resources['inventories'] > $plan->inventory_limit)
            return False;

        return True;
    }
}