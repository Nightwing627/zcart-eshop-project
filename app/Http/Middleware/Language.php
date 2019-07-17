<?php

namespace App\Http\Middleware;

use App;
use Session;
use Closure;
use Carbon\Carbon;

/**
 * Class LocaleMiddleware.
 */
class Language
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         * Locale is enabled and allowed to be changed
         */
        if (Session::has('locale')) {
            /*
             * Set the Laravel locale
             */
            App::setLocale(Session::get('locale'));

            $locale = config('active_locales')->firstWhere('code', Session::get('locale'));

            /*
             * setLocale for php. Enables ->formatLocalized() with localized values for dates
             */
            setlocale(LC_TIME, $locale->php_locale_code);

            /*
             * setLocale to use Carbon source locales. Enables diffForHumans() localized
             */
            Carbon::setLocale($locale->code);
            // Carbon::setLocale(config('locale.languages')[Session::get('locale')][0]);

            /*
             * Set the session variable for whether or not the app is using RTL support
             * for the current language being selected
             * For use in the blade directive in BladeServiceProvider
             */
            if ($locale->rtl) {
                session(['lang-rtl' => true]);
            } else {
                Session::forget('lang-rtl');
            }
        }

        return $next($request);
    }
}
