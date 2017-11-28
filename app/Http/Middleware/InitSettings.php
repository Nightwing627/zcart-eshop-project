<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Request;
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

        if(Auth::check())
        {
            // Check if the user has impersonated
            if(Request::session()->has('impersonated'))
                Auth::onceUsingId(Request::session()->get('impersonated'));

            // Set all authorization slugs into the session to check permission very fast
            $permissions = ListHelper::authorizations();
            config()->set('permissions', $permissions);

            // If the user from the platform then no need to set shop settings
            if( ! Auth::user()->isFromPlatform() )
            {
                $shop_settings = ListHelper::shop_settings();
                config()->set('shop_settings', $shop_settings);
            }

            // For the authorization purpouse the Super Admin will need auth slugs to hide the merchant module on the dashboard
            if(Auth::user()->isSuperAdmin())
            {
                $slugs = ListHelper::slugsWithModulAccess();
                config()->set('authSlugs', $slugs);
            }
        }

        return $next($request);
    }
}
