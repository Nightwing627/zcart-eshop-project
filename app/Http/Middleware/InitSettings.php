<?php

namespace App\Http\Middleware;

use Auth;
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
        // Ignore the setup routes
        if($request->is('install*')) return $next($request);

        // $this->can_load();

        setSystemConfig();

        if(Auth::guard('web')->check()){

            // Check if the user has impersonated
            if($request->session()->has('impersonated'))
                Auth::onceUsingId($request->session()->get('impersonated'));

            // If the user from the platform then no need to set shop settings
            if( ! Auth::guard('web')->user()->isFromPlatform() && Auth::guard('web')->user()->merchantId())
                setShopConfig(Auth::guard('web')->user()->merchantId());

            // Set all authorization slugs into the session to check permission very fast
            $permissions = ListHelper::authorizations();
            $permissions = isset($extra_permissions) ? array_merge($extra_permissions, $permissions) : $permissions;
            config()->set('permissions', $permissions);

            // For the authorization purpouse the Super Admin will need auth slugs to hide the merchant module on the dashboard
            if(Auth::guard('web')->user()->isSuperAdmin()){
                $slugs = ListHelper::slugsWithModulAccess();
                config()->set('authSlugs', $slugs);
            }
        }

        // update the visitor table for state
        if( !$request->ajax() )
            updateVisitorTable($request);

        return $next($request);
    }

    /**
     * Set system currency information to config
     *
     * @return void
     */
    // private static function initCurrency()
    // {
    //     $currency = \DB::table('currencies')->where('id', config('system_settings.currency_id'))->first();

    //     config([
    //         'system_settings.currency' => [
    //             'name' => $currency->name,
    //             'symbol' => $currency->symbol,
    //             'iso_code' => $currency->iso_code,
    //             'symbol_first' => $currency->symbol_first,
    //             'decimal_mark' => $currency->decimal_mark,
    //             'thousands_separator' => $currency->thousands_separator,
    //             'subunit' => $currency->subunit,
    //         ]
    //     ]);

    //     return;
    // }

    private function can_load()
    {
        if (ZCART_MIX_KEY != "017bf8bc885fb37b" || md5_file(base_path().'/bootstrap/autoload.php') != "72dc6cd343ba316c88cfd12d97ae5b3d")
            die("Did you "."remove the "."old files "."!?");

        incevioAutoloadHelpers(getMysqliConnection());
    }
}