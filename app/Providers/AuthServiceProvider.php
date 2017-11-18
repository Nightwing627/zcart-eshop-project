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
        \App\Blog::class                => \App\Policies\BlogPolicy::class,
        \App\Attribute::class           => \App\Policies\AttributePolicy::class,
        \App\AttributeValue::class      => \App\Policies\AttributeValuePolicy::class,
        \App\CarrierValue::class        => \App\Policies\CarrierValuePolicy::class,
        \App\Cart::class                => \App\Policies\CartPolicy::class,
        \App\Carrier::class              => \App\Policies\CarrierPolicy::class,
        \App\Category::class            => \App\Policies\CategoryPolicy::class,
        \App\CategoryGroup::class       => \App\Policies\CategoryGroupPolicy::class,
        \App\CategorySubGroup::class    => \App\Policies\CategorySubGroupPolicy::class,
        \App\Coupon::class              => \App\Policies\CouponPolicy::class,
        \App\Customer::class            => \App\Policies\CustomerPolicy::class,
        \App\EmailTemplate::class       => \App\Policies\EmailTemplatePolicy::class,
        \App\GiftCard::class            => \App\Policies\GiftCardPolicy::class,
        \App\Inventory::class           => \App\Policies\InventoryPolicy::class,
        \App\Manufacturer::class        => \App\Policies\ManufacturerPolicy::class,
        \App\Order::class               => \App\Policies\OrderPolicy::class,
        \App\OrderStatus::class         => \App\Policies\OrderStatusPolicy::class,
        \App\OrderStatus::class         => \App\Policies\OrderStatusPolicy::class,
        \App\Packaging::class           => \App\Policies\PackagingPolicy::class,
        \App\PaymentMethod::class       => \App\Policies\PaymentMethodPolicy::class,
        \App\PaymentStatus::class       => \App\Policies\PaymentStatusPolicy::class,
        \App\Permission::class          => \App\Policies\PermissionPolicy::class,
        \App\Product::class             => \App\Policies\ProductPolicy::class,
        \App\Role::class                => \App\Policies\RolePolicy::class,
        \App\Setting::class             => \App\Policies\SettingPolicy::class,
        \App\Shop::class                => \App\Policies\ShopPolicy::class,
        \App\ShopRule::class            => \App\Policies\ShopRulePolicy::class,
        \App\Supplier::class            => \App\Policies\SupplierPolicy::class,
        \App\Tax::class                 => \App\Policies\TaxPolicy::class,
        \App\User::class                => \App\Policies\UserPolicy::class,
        \App\Warehouse::class           => \App\Policies\WarehousePolicy::class,
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
