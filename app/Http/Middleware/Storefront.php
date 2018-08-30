<?php

namespace App\Http\Middleware;

use View;
use Auth;
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

        //Supply important data to all views if not ajax request
        if( ! $request->ajax() ){
            View::share('all_categories', ListHelper::categoriesForTheme());
            View::share('search_category_list', ListHelper::search_categories());
            View::share('recently_viewed_items', ListHelper::recentlyViewedItems());
            View::share('featured_categories', ListHelper::hot_categories());
            View::share('pages', ListHelper::pages(\App\Page::VISIBILITY_PUBLIC));
            View::share('cart_item_count', ListHelper::cart_item_count($request));
        }

        return $next($request);
    }
}
