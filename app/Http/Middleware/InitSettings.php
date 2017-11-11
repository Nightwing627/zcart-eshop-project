<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\ListHelper; // TEMPORARY

class InitSettings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // TEMPORARY :: Must move somewhere more appropriate
        $system_settings = ListHelper::system_settings();
        config()->set('system_settings', $system_settings);

        if(\Auth::check())
        {
            $shop_settings = ListHelper::shop_settings();
            config()->set('shop_settings', $shop_settings);

            $permissions = ListHelper::authorizations();
            config()->set('permissions', $permissions);
        }

        return $next($request);
    }
}
