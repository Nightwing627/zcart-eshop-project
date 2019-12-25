<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckForGuestCheckoutMode
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
        if(! config('system_settings.allow_guest_checkout') && ! Auth::guard('customer')->check())
            return redirect()->route('customer.login')->with('error', trans('theme.notify.please_login_to_checkout'));

        return $next($request);
    }
}
