<?php

namespace App\Providers;

use App\Cart;
use App\Inventory;
use App\Helpers\ListHelper;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeRoleForm();

        $this->composeUserForm();

        $this->composeAttributeForm();

        $this->composeAttributeValueForm();

        $this->composeShopForm();

        $this->composeProductForm();

        $this->composeInventoryForm();

        $this->composeInventoryVariantForm();

        $this->composeTaxForm();

        $this->composeManufacturerForm();

        $this->composeWarehouseForm();

        $this->composeCarrierForm();

        $this->composeAddressForm();

        $this->composeSearchFilterForm();

        // $this->composeSearchCustomerForm();

        $this->composeCreateOrderForm();

        $this->composeCouponForm();

    }

    /**
     * compose partial view of role form
     */
    private function composeRoleForm()
    {
        view()->composer(

                'admin.role._form',

                function($view)
                {
                    $view->with('modules', ListHelper::modulesWithPermissions());
                });
    }

    /**
     * compose partial view of user form
     */
    private function composeUserForm()
    {
        view()->composer(

                'admin.user._form',

                function($view)
                {
                    $view->with('roles', ListHelper::roles());
                });
    }

    /**
     * compose partial view of attribute form
     */
    private function composeAttributeForm()
    {
        view()->composer(

                'admin.attribute._form',

                function($view)
                {
                    $view->with('typeList', ListHelper::attribute_types());
                });
    }

    /**
     * compose partial view of attribute value form
     */
    private function composeAttributeValueForm()
    {
        view()->composer(

                'admin.attribute-value._form',

                function($view)
                {
                    $view->with('attributeList', ListHelper::attributes());
                });
    }

    /**
     * compose partial view of shop form
     */
    private function composeShopForm()
    {
        view()->composer(

                'admin.shop._form',

                function($view)
                {
                    $view->with('users', ListHelper::merchants());
                });
    }

    /**
     * compose partial view of product form
     */
    private function composeProductForm()
    {
        view()->composer(

                'admin.product._form',

                function($view)
                {
                    $view->with('categories', ListHelper::categories());

                    $view->with('manufacturers', ListHelper::manufacturers());

                    $view->with('gtin_types', ListHelper::gtin_types());

                    $view->with('countries', ListHelper::countries());

                    $view->with('tags', ListHelper::tags());
                });
    }

    /**
     * compose partial view of genaral inventory form
     */
    private function composeInventoryForm()
    {
        view()->composer(

                'admin.inventory._form',

                function($view)
                {
                    $view->with('attributes', ListHelper::attributeWithValues());

                    $view->with('taxes', ListHelper::taxes());

                    $view->with('carriers', ListHelper::carriers());

                    $view->with('warehouses', ListHelper::warehouses());

                    $view->with('suppliers', ListHelper::suppliers());
                });
    }

    /**
     * compose partial view of inventory variant form
     */
    private function composeInventoryVariantForm()
    {
        view()->composer(

                'admin.inventory._formWithVariant',

                function($view)
                {
                    $view->with('taxes', ListHelper::taxes());

                    $view->with('carriers', ListHelper::carriers());

                    $view->with('warehouses', ListHelper::warehouses());

                    $view->with('suppliers', ListHelper::suppliers());
                });
    }

    /**
     * compose partial view of tax form
     */
    private function composeTaxForm()
    {
        view()->composer(

            'admin.tax._form',

            function($view)
            {
                $view_data = $view->getData();

                $country_id = isset($view_data['tax']) ?
                        $view_data['tax']['country_id'] :
                        config('system_settings.address_default_country');

                $view->with('countries', ListHelper::countries());

                $view->with('states', ListHelper::states($country_id));
            }
        );
    }

    /**
     * compose partial view of manufacturer form
     */
    private function composeManufacturerForm()
    {
        view()->composer(

            'admin.manufacturer._form',

            function($view)
            {
                $view->with('countries', ListHelper::countries());
            }
        );
    }

    /**
     * compose partial view of warehouse form
     */
    private function composeWarehouseForm()
    {
        view()->composer(

            'admin.warehouse._form',

            function($view)
            {
                $view->with('staffs', ListHelper::staffs());
            }
        );
    }

    /**
     * compose partial view of carrier form
     */
    private function composeCarrierForm()
    {
        view()->composer(

            'admin.carrier._form',

            function($view)
            {
                $view->with('taxes', ListHelper::taxes());
            }
        );
    }

    /**
     * compose partial view of address form
     */
    private function composeAddressForm()
    {
        view()->composer(

            'address._form',

            function($view)
            {
                $view_data = $view->getData();

                $country_id = isset($view_data['address']) ?
                        $view_data['address']['country_id'] :
                        config('system_settings.address_default_country');

                if (
                    isset($view_data['addressable_type']) && 'App\Customer' == $view_data['addressable_type']
                    ||
                    isset($view_data['address']) && 'App\Customer' == $view_data['address']['addressable_type']
                    )
                {
                    $view->with('address_types', ListHelper::address_types());
                }

                $view->with('countries', ListHelper::countries());

                $view->with('states', ListHelper::states($country_id));
            }
        );
    }

    /**
     * compose partial view of invoice and order filter
     */
    private function composeSearchFilterForm()
    {
        view()->composer(

            'admin.partials._filter',

            function($view)
            {
                $view->with('customers', ListHelper::customers());

                $view->with('statuses', ListHelper::order_statuses());

                $view->with('payments', ListHelper::payment_statuses());
            }
        );
    }

    /**
     * compose partial view of invoice and order filter
     */
    private function composeCreateOrderForm()
    {
        view()->composer(

            'admin.order.create',

            function($view)
            {
                $view->with('carriers', ListHelper::carriers());

                $view->with('taxes', ListHelper::taxes());

                $view->with('order_statuses', ListHelper::order_statuses());

                $view->with('payment_statuses', ListHelper::payment_statuses());

                $view->with('payment_methods', ListHelper::payment_methods());

                $view->with('packagings', ListHelper::packagings());

                // $cart_lists = Cart::where('customer_id', $customer_id)->with('inventories', 'customer', 'tax')->orderBy('created_at', 'desc')->get();

                // $view->with('cart_lists', $cart_lists);

                $inventories = Inventory::mine()->active()->with('product', 'attributeValues')->get();

                foreach ($inventories as $inventory)
                {
                    $str = ' - ';

                    foreach ($inventory->attributeValues as $k => $attrValue)
                    {
                        $str .= $attrValue->value .' - ';
                    }

                    $str = substr($str, 0, -3);

                    $items[$inventory->id] = $inventory->sku .': '. $inventory->product->name . $str . ' - ' . $inventory->condition;

                    $product_info[$inventory->id] = [
                        "id" => $inventory->product_id,
                        "salePrice" => round($inventory->sale_price, 2),
                        "offerPrice" => round($inventory->offer_price, 2),
                        "stockQtt" => $inventory->stock_quantity,
                        "offerStart" => $inventory->offer_start,
                        "offerEnd" => $inventory->offer_end,
                    ];
                }

                $view->with('products', isset($items) ? $items : []);
                $view->with('inventories', isset($product_info) ? $product_info : []);

            }
        );
    }

    /**
     * compose partial view of coupon form
     */
    private function composeCouponForm()
    {
        view()->composer(

            'admin.coupon._form',

            function($view)
            {
                $view->with('customers', ListHelper::customers());
            }
        );
    }

}
