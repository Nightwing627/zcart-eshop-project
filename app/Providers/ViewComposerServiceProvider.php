<?php

namespace App\Providers;

use App\Cart;
use App\Module;
use App\Inventory;
use App\Helpers\ListHelper;
use Illuminate\Support\Facades\View;
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
        $this->composeAddressForm();

        $this->composeAttributeForm();

        $this->composeAttributeValueForm();

        $this->composeBlogForm();

        $this->composeCarrierForm();

        $this->composeCategoryForm();

        $this->composeCategorySubGroupForm();

        $this->composeConfigPage();

        $this->composeGeneralConfigPage();

        $this->composeCreateOrderForm();

        $this->composeDisputeResponseForm();

        $this->composeEmailTemplatePartialForm();

        $this->composeInventoryForm();

        $this->composeInventoryVariantForm();

        $this->composeManufacturerForm();

        $this->composeProductForm();

        $this->composeRefundInitiationForm();

        $this->composeRoleForm();

        $this->composeRoleShow();

        $this->composeSearchFilterForm();

        // $this->composeSearchCustomerForm();

        $this->composeSetVariantForm();

        $this->composeShopForm();

        $this->composeSystemGeneralPage();

        $this->composeSystemConfigPage();

        $this->composeTaxForm();

        $this->composeTicketCreateForm();

        $this->composeTicketStatusForm();

        $this->composeTicketAssignForm();

        $this->composeUserForm();

        $this->composeWarehouseForm();

    }

    /**
     * compose partial view of role form
     */
    private function composeRoleForm()
    {
        View::composer(

                'admin.role._form',

                function($view)
                {
                    $view->with('modules', ListHelper::modulesWithPermissions());
                });
    }

    /**
     * compose partial view of role
     */
    private function composeRoleShow()
    {
        View::composer(

                'admin.role._show',

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
        View::composer(

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
        View::composer(

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
        View::composer(

                'admin.attribute-value._form',

                function($view)
                {
                    $view->with('attributeList', ListHelper::attributes());
                });
    }

    /**
     * compose partial view of category form
     */
    private function composeCategoryForm()
    {
        View::composer(

                'admin.category._form',

                function($view)
                {
                    $view->with('catList', ListHelper::catGrpSubGrpListArray());
                });
    }

    /**
     * compose partial view of CategorySubGroupForm form
     */
    private function composeCategorySubGroupForm()
    {
        View::composer(

                'admin.category._formSubGrp',

                function($view)
                {
                    $view->with('catGroups', ListHelper::categoryGrps());
                });
    }

    /**
     * compose partial view of shop form
     */
    private function composeShopForm()
    {
        View::composer(

                'admin.shop._create',

                function($view)
                {
                    $view->with('merchants', ListHelper::new_merchants());
                    $view->with('timezones', ListHelper::timezones());
                });
    }

    /**
     * compose partial view of product form
     */
    private function composeProductForm()
    {
        View::composer(

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
        View::composer(

                'admin.inventory._form',

                function($view)
                {
                    $view->with('attributes', ListHelper::attributeWithValues());

                    $view->with('taxes', ListHelper::taxes());

                    $view->with('carriers', ListHelper::carriers());

                    $view->with('packagings', ListHelper::packagings());

                    $view->with('warehouses', ListHelper::warehouses());

                    $view->with('suppliers', ListHelper::suppliers());
                });
    }

    /**
     * compose partial view of inventory variant form
     */
    private function composeInventoryVariantForm()
    {
        View::composer(

                'admin.inventory._formWithVariant',

                function($view)
                {
                    $view->with('taxes', ListHelper::taxes());

                    $view->with('carriers', ListHelper::carriers());

                    $view->with('packagings', ListHelper::packagings());

                    $view->with('warehouses', ListHelper::warehouses());

                    $view->with('suppliers', ListHelper::suppliers());
                });
    }

    /**
     * compose partial view of set variant form
     */
    private function composeSetVariantForm()
    {
        View::composer(

                'admin.inventory._set_variant',

                function($view)
                {
                    $view->with('attributes', ListHelper::attributeWithValues());
                });
    }

    /**
     * compose partial view of tax form
     */
    private function composeTaxForm()
    {
        View::composer(

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
     * compose partial view of Email template partial form
     */
    private function composeEmailTemplatePartialForm()
    {
        View::composer(

                'admin.partials._email_template_id_field',

                function($view)
                {
                    $view->with('email_templates', ListHelper::email_templates());
                });
    }

    /**
     * compose partial view of manufacturer form
     */
    private function composeManufacturerForm()
    {
        View::composer(

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
        View::composer(

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
        View::composer(

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
        View::composer(

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
        View::composer(

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
        View::composer(

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
     * compose partial view of ticket create form
     */
    private function composeTicketCreateForm()
    {
        View::composer(

            'admin.ticket._create',

            function($view)
            {
                $view->with('ticket_categories', ListHelper::ticket_categories());
                $view->with('priorities', ListHelper::ticket_priorities());
            }
        );
    }

    /**
     * compose partial view of ticket status form
     */
    private function composeTicketStatusForm()
    {
        View::composer(

            'admin.ticket._status_form',

            function($view)
            {
                $view->with('priorities', ListHelper::ticket_priorities());
                $view->with('statuses', ListHelper::ticket_statuses_all());
            }
        );
    }

    /**
     * compose partial view of ticket status form
     */
    private function composeTicketAssignForm()
    {
        View::composer(

            'admin.ticket._assign',

            function($view)
            {
                $view->with('users', ListHelper::platform_users());
            }
        );
    }

    /**
     * compose partial view of dispute status form
     */
    private function composeDisputeResponseForm()
    {
        View::composer(

            'admin.dispute._response',

            function($view)
            {
                $view->with('statuses', ListHelper::dispute_statuses());
            }
        );
    }

    private function composeRefundInitiationForm()
    {
        View::composer(

            'admin.refund._initiate',

            function($view)
            {
                $view->with('orders', ListHelper::orders());
                $view->with('statuses', ListHelper::refund_statuses());
            }
        );
    }

    /**
     * compose partial view of Config Page
     */
    private function composeConfigPage()
    {
        View::composer(

                'admin.config.index',

                function($view)
                {
                    $view->with('taxes', ListHelper::taxes());
                    $view->with('suppliers', ListHelper::suppliers());
                    $view->with('warehouses', ListHelper::warehouses());
                    $view->with('carriers', ListHelper::carriers());
                    $view->with('packagings', ListHelper::packagings());
                    $view->with('payment_methods', ListHelper::payment_methods());
                });
    }

    /**
     * compose partial view of SystemConfig Page
     */
    private function composeSystemConfigPage()
    {
        View::composer(

                'admin.system.config',

                function($view)
                {
                    $view->with('countries', ListHelper::countries());
                    $view->with('states', ListHelper::states());
                });
    }

    /**
     * compose partial view of GeneralConfig Page
     */
    private function composeGeneralConfigPage()
    {
        View::composer(

                'admin.config.general',

                function($view)
                {
                    $view->with('timezones', ListHelper::timezones());
                });
    }

    /**
     * compose partial view of General System Config Page
     */
    private function composeSystemGeneralPage()
    {
        View::composer(

                'admin.system.general',

                function($view)
                {
                    $view->with('timezones', ListHelper::timezones());
                    $view->with('currencies', ListHelper::currencies());
                });
    }

    /**
     * compose partial view of blog form
     */
    private function composeBlogForm()
    {
        View::composer(

            'admin.blog._form',

            function($view)
            {
                $view->with('tags', ListHelper::tags());
            }
        );
    }
}
