<?php

namespace App\Http\Middleware;

use View;
use Closure;
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
        // View::setFinder(new FileViewFinder(app()['files'], $paths));

        return $next($request);
    }
}
