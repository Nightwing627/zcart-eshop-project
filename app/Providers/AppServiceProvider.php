<?php

namespace App\Providers;

use App\Shop;
use App\Order;
use App\Refund;
use App\Observers\ShopObserver;
use App\Observers\RefundObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Shop::observe(ShopObserver::class);
        Order::observe(OrderObserver::class);
        Refund::observe(RefundObserver::class);

        // Add pagination on collections
        if (!Collection::hasMacro('paginate')) {
            Collection::macro('paginate',
                function ($perPage = 15, $page = null, $options = []) {
                $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                return (new LengthAwarePaginator(
                    $this->forPage($page, $perPage), $this->count(), $perPage, $page, $options))
                    ->withPath(url()->full());
            });
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Ondemand Img manupulation
        $this->app->singleton(\League\Glide\Server::class, function($app)
            {
                $filesystem = $app->make(\Illuminate\Contracts\Filesystem\Filesystem::class);

                return \League\Glide\ServerFactory::create([
                    'response' => new \League\Glide\Responses\LaravelResponseFactory(app('request')),
                    'driver' => config('image.driver'),
                    'presets' => config('image.sizes'),
                    'source' => $filesystem->getDriver(),
                    'cache' => $filesystem->getDriver(),
                    'cache_path_prefix' => config('image.cache_dir'),
                    'base_url' => 'image', //Don't change this value
                ]);
            }
        );

    }
}
