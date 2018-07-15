<?php

namespace App\Http\Middleware;

use View;
use Closure;
use App\Helpers\ListHelper;
use Illuminate\View\FileViewFinder;
use Illuminate\Support\Facades\Config;

class Storefront
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
        $paths = [
            theme_views_path(),
            theme_views_path('default'),
        ];

        // Reset views path to load theme views
        View::setFinder(new FileViewFinder(app('files'), $paths));

        //Supply important data to all views
        View::share('all_categories', ListHelper::categoriesForTheme());
        View::share('search_category_list', ListHelper::catSubGrps());
        View::share('recently_viewed_items', ListHelper::recentlyViewedItems());

        $hotcat = ['Hot Category One', 'Hot Category Two', 'Hot Category Three']; //TEST
        View::share('hot_categories', $hotcat);

        return $next($request);
    }
}
