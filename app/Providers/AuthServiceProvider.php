<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Blog::class            => \App\Policies\BlogPolicy::class,
        \App\Attribute::class       => \App\Policies\AttributePolicy::class,
        \App\AttributeValue::class  => \App\Policies\AttributeValuePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::resource('blog', 'BlogPolicy');

        // Gate::resource('posts', 'PostPolicy', [
        //     'restore' => 'restore',
        //     'destroy' => 'destroy',
        // ]);
    }
}
