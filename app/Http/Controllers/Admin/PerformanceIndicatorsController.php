<?php

namespace App\Http\Controllers\Admin;

use App\Shop;
use Carbon\Carbon;
use App\SubscriptionPlan;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\PerformanceIndicatorsRepository;

class PerformanceIndicatorsController extends Controller
{
    /**
     * The performance indicators repository instance.
     *
     * @var PerformanceIndicatorsRepository
     */
    protected $indicators;

    /**
     * Create a new controller instance.
     *
     * @param  PerformanceIndicatorsRepository  $indicators
     * @return void
     */
    public function __construct(PerformanceIndicatorsRepository $indicators)
    {
        $this->indicators = $indicators;
    }

    /**
     * Get the performance indicators for the application.
     *
     * @return Response
     */
    public function all()
    {
        return response()->json([
            'indicators' => $this->indicators->all(60),
            'last_month' => $this->indicators->forDate(Carbon::today()->subMonths(1)),
            'last_year' => $this->indicators->forDate(Carbon::today()->subYears(1)),
        ]);
    }

    /**
     * Get the revenue amounts for the application.
     *
     * @return Response
     */
    public function revenue()
    {
        return [
            'monthlyRecurringRevenue' => $this->indicators->monthlyRecurringRevenue(),
            'totalVolume' => $this->indicators->totalVolume(),
        ];
    }

    /**
     * Get the subscriber counts by plan.
     *
     * @return Response
     */
    public function subscribers()
    {
        $plans = [];

        foreach (SubscriptionPlan::all() as $plan) {
            $plans[] = [
                'name' => $plan->name,
                'cost' => $plan->cost,
                'count' => $this->indicators->subscribers($plan),
                'trialing' => $this->indicators->trialing($plan),
            ];
        }

        return collect($plans)->sortByDesc('count')->values()->all();
    }

    /**
     * Get the number of users who are on a generic trial.
     *
     * @return Response
     */
    public function trialUsers()
    {
        return Shop::where('trial_ends_at', '>=', Carbon::now())->count();
    }
}
