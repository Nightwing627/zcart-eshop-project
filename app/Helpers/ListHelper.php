<?php

namespace App\Helpers;

use Auth;
use App\User;
use App\Role;
use App\Order;
use App\Module;
use App\Ticket;
use App\Message;
use App\Refund;
use App\Dispute;
use App\FaqTopic;
use App\Attribute;
use App\Permission;
use App\PaymentMethod;

/**
* This is a helper class to process,upload and remove images from different models
*/

class ListHelper
{
    public static function ticket_categories()
    {
        return \DB::table('ticket_categories')->orderBy('name', 'asc')->pluck('name', 'id');
    }


    /**
     * Get payment_method_types list for form dropdown.
     *
     * @return array
     */
    public static function payment_method_types()
    {
        return  [
            PaymentMethod::TYPE_PAYPAL      => trans("app.payment_method_type.paypal.name"),
            PaymentMethod::TYPE_CREDIT_CARD => trans("app.payment_method_type.credit_card.name"),
            PaymentMethod::TYPE_MANUAL      => trans("app.payment_method_type.manual.name"),
        ];
    }
    public static function payment_statuses()
    {
        return  [
            Order::PAYMENT_STATUS_UNPAID    => trans("app.statuses.unpaid"),
            Order::PAYMENT_STATUS_PENDING   => trans("app.statuses.pending"),
            Order::PAYMENT_STATUS_PAID      => trans("app.statuses.paid"),
        ];
    }
    public static function ticket_priorities()
    {
        return  [
            Ticket::PRIORITY_LOW      => trans("app.priorities.low"),
            Ticket::PRIORITY_NORMAL   => trans("app.priorities.normal"),
            Ticket::PRIORITY_HIGH     => trans("app.priorities.high"),
            Ticket::PRIORITY_CRITICAL => trans("app.priorities.critical"),
        ];
    }

    public static function ticket_statuses_new()
    {
        return  [
            Ticket::STATUS_NEW      => trans("app.statuses.new"),
            Ticket::STATUS_OPEN     => trans("app.statuses.open"),
            Ticket::STATUS_PENDING  => trans("app.statuses.pending"),
        ];
    }

    public static function ticket_statuses_all()
    {
        return  self::ticket_statuses_new() + [
            Ticket::STATUS_CLOSED   => trans("app.statuses.closed"),
            Ticket::STATUS_SOLVED   => trans("app.statuses.solved"),
            Ticket::STATUS_SPAM     => trans("app.statuses.spam"),
        ];
    }

    public static function faq_topics_for()
    {
        return  [
            'Merchant'    => trans("app.merchants"),
            'Customer'    => trans("app.customers"),
        ];
    }

    /**
     * Get dispute statuses list for form dropdown.
     *
     * @return array
     */
    public static function dispute_statuses()
    {
        $statuses =  [
            Dispute::STATUS_NEW      => trans("app.statuses.new"),
            Dispute::STATUS_OPEN     => trans("app.statuses.open"),
            Dispute::STATUS_WAITING  => trans("app.statuses.waiting"),
            Dispute::STATUS_SOLVED   => trans("app.statuses.solved"),
            Dispute::STATUS_CLOSED   => trans("app.statuses.closed"),
        ];

        if(auth()->user()->isFromPlatform())
            $statuses[Dispute::STATUS_APPEALED] = trans("app.statuses.appealed");

        return $statuses;
    }

    /**
     * Get refund statuses list for form dropdown.
     *
     * @return array
     */
    public static function refund_statuses()
    {
        return  [
            Refund::STATUS_NEW      => trans("app.statuses.new"),
            Refund::STATUS_APPROVED  => trans("app.statuses.approved"),
            Refund::STATUS_DECLINED => trans("app.statuses.declined"),
        ];
    }

    /**
     * Get ssystem ettings.
     *
     * @return array
     */
    public static function system_settings()
    {
        return (array) \DB::table('systems')->orderBy('id', 'asc')->first();
    }

    /**
     * Get setting list for the shop.
     *
     * @return array
     */
    public static function shop_settings($shop = null)
    {
        $shop = $shop ?: Auth::user()->merchantId(); //Get current user's shop_id
        $settings = \DB::table('configs')->where('shop_id', $shop)->first();
        $result = [];
        if($settings){
            foreach ($settings as $key => $value) {
                if ( is_serialized($value) )
                    $result[$key] = unserialize($value);
                else
                    $result[$key] = $value;
            }
        }
        return $result;
    }

    /**
     * Get role list for form dropdown.
     * If the logged in user from a shop then show return roles thats are public.
     * otherwise return roles thats not public
     *
     * @return array
     */
    public static function roles()
    {
        $roles = Role::lowerPrivileged();

        if (Auth::user()->isFromPlatform()){
            $roles->whereNull('shop_id')->notPublic();
        }
        else{
            $roles->orWhere(
                function($query){
                    $query->whereNull('shop_id')
                        ->where('public', 1);
                });
        }

        return $roles->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get list of all available category group
     *
     * @return array
     */
    public static function categoryGrps()
    {
        return \DB::table('category_groups')->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get list of category sub-group under the given category
     *
     * @return array
     */
    public static function thisCatSubGrps($category)
    {
        return \DB::table('category_sub_groups')->where('deleted_at', Null)->where('category_group_id', $category)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get categories list for form dropdown.
     *
     * @return array
     */
    public static function categories()
    {
        return \DB::table('categories')->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get all catGrpSubGrpListArray
     *
     * @return array
     */
    public static function catGrpSubGrpListArray()
    {
        $grps = [];

        foreach (self::categoryGrps() as $key => $value)
        {
            $list = [];

            foreach (self::thisCatSubGrps($key) as $key2 => $value2)
            {
                $list[$key2] = $value2;
            }

            if(count($list))
            {
                $grps[$value] = $list;
            }
        }

        return $grps;
    }

    /**
     * Get permissions list for form dropdown.
     *
     * @return array
     */
    public static function permissions()
    {
        return Permission::orderBy('module_id', 'asc')->pluck('name', 'id');
    }

    /**
     * Get modulesWithPermissions list.
     *
     * @return array
     */
    public static function modulesWithPermissions()
    {
        return Module::active()->with('permissions')->orderBy('name', 'asc')->get();
    }

    /**
     * Get array of slugsWithModulAccess list.
     *
     * @return array
     */
    public static function slugsWithModulAccess()
    {
        return Permission::with('module')->get()->pluck('module.access', 'slug')->toArray();
    }

    /**
     * Get users list for form dropdown.
     *
     * @return array
     */
    public static function users()
    {
        return \DB::table('users')->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get users list for form dropdown.
     *
     * @return array
     */
    public static function platform_users()
    {
        return \DB::table('users')->where('shop_id', Null)->where('role_id', '!=', 3)->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get permission slugs for the user role.
     *
     * @return array
     */
    public static function authorizations(User $user = null)
    {
        $user = $user ?: Auth::user(); //Get current user

        if($user->isSuperAdmin()){
            return [];
        }

        return $user->role->permissions()->pluck('slug')->toArray();
    }

    /**
     * Get all FAQ topic list for form dropdown.
     *
     * @return array
     */
    public static function faq_topics()
    {
        return \DB::table('faq_topics')->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get all merchants list for form dropdown.
     *
     * @return array
     */
    public static function merchants()
    {
        return \DB::table('users')
                ->where('role_id', 3)
                ->where('deleted_at', Null)
                ->orderBy('name', 'asc')
                ->pluck('name', 'id');
    }

    /**
     * Get new merchants list for form dropdown.
     *
     * @return array
     */
    public static function new_merchants()
    {
        return \DB::table('users')
                ->whereNull('shop_id')
                ->whereNull('deleted_at')
                ->where('role_id', Role::MERCHANT)
                ->orderBy('name', 'asc')
                ->pluck('name', 'id');
    }

    /**
     * Get users list under the shop for form dropdown.
     *
     * @return array
     */
    public static function staffs($shop = null)
    {
        $shop = $shop ?: Auth::user()->merchantId(); //Get current user's shop_id

        return \DB::table('users')->where('shop_id', $shop)->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get suppliers list for form dropdown.
     *
     * @return array
     */
    public static function suppliers()
    {
        return \DB::table('suppliers')->where('shop_id', Auth::user()->merchantId())->where('deleted_at', Null)->where('active', 1)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get timezones list for form dropdown.
     *
     * @return array
     */
    public static function timezones()
    {
        return \DB::table('timezones')->pluck('text', 'id');
    }

    /**
     * Get warehouses list for form dropdown.
     *
     * @return array
     */
    public static function warehouses()
    {
        return \DB::table('warehouses')->where('shop_id', Auth::user()->merchantId())->where('deleted_at', Null)->where('active', 1)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get carriers list for form dropdown.
     *
     * @return array
     */
    public static function carriers()
    {
        return \DB::table('carriers')->where('shop_id', Auth::user()->merchantId())->where('deleted_at', Null)->where('active', 1)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get taxes list for form dropdown.
     *
     * @return array
     */
    public static function taxes()
    {
        return \DB::table('taxes')
                ->where('active', 1)
                ->where('deleted_at', Null)
                ->where( function ($query) {
                    $query->where('public', 1)
                    ->orWhere('shop_id', Auth::user()->merchantId());
                })
                ->orderBy('name', 'asc')
                ->pluck('name', 'id');
    }

    /**
     * Get customers list for form dropdown.
     *
     * @return array
     */
    public static function customers()
    {
        return \DB::table('customers')->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get orders list for form dropdown.
     *
     * @return array
     */
    public static function orders()
    {
        return \DB::table('orders')->where('shop_id', Auth::user()->merchantId())->where('deleted_at', Null)->orderBy('order_number', 'asc')->pluck('order_number', 'id')->toArray();
    }

    /**
     * Get paid_orders list for form dropdown.
     *
     * @return array
     */
    public static function paid_orders()
    {
        return \DB::table('orders')->where('shop_id', Auth::user()->merchantId())
                ->where('payment_status', Order::PAYMENT_STATUS_PAID)
                ->where('deleted_at', Null)->orderBy('order_number', 'asc')
                ->pluck('order_number', 'id')->toArray();
    }

    /**
     * Get order_statuses list for form dropdown.
     *
     * @return array
     */
    public static function order_statuses()
    {
        return \DB::table('order_statuses')->where('deleted_at', Null)->pluck('name', 'id');
    }

    // /**
    //  * Get payment_statuses list for form dropdown.
    //  *
    //  * @return array
    //  */
    // public static function payment_statuses()
    // {
    //     return \DB::table('payment_statuses')->where('deleted_at', Null)->pluck('name', 'id');
    // }

    /**
     * Get address_types list for form dropdown.
     *
     * @return array
     */
    public static function address_types()
    {
        return \DB::table('address_types')->orderBy('id', 'asc')->pluck('type', 'type');
    }

    /**
     * Get payment_methods list for form dropdown.
     *
     * @return array
     */
    public static function payment_methods()
    {
        return \DB::table('payment_methods')->where('enabled', 1)->pluck('name', 'id');
    }

    /**
     * Get packagings list for form dropdown.
     *
     * @return array
     */
    public static function packagings()
    {
        return \DB::table('packagings')->where('shop_id', Auth::user()->merchantId())->where('active', 1)->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get country list for form dropdown.
     *
     * @return array
     */
    public static function countries()
    {
        return \DB::table('countries')->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get states list for form dropdown.
     *
     * @param  int $country_id
     *
     * @return array
     */
    public static function states($country_id = null)
    {
        $country_id = $country_id ?: config('system_settings.address_default_country');
        return \DB::table('states')->where('country_id', $country_id)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get currency list for form dropdown.
     *
     * @return array
     */
    public static function currencies()
    {
        $currencies = \DB::table('currencies')->select('name', 'iso_code', 'id')->where('active', 1)->orderBy('priority', 'asc')->orderBy('name', 'asc')->get();
        // $currencies = \DB::table('currencies')->where('active', 1)->orderBy('name', 'asc')->pluck('name', 'id')->toArray();

        $result = [];
        foreach ($currencies as $currency)
            $result[$currency->id] = $currency->name . ' (' . $currency->iso_code . ')';

        return $result;
    }

    /**
     * Get attributes list for form dropdown.
     *
     * @return array
     */
    public static function attributes()
    {
        return \DB::table('attributes')->where('shop_id', Auth::user()->merchantId())->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get attributes list with all values for form dropdown.
     *
     * @return array
     */
    public static function attributeWithValues()
    {
        return Attribute::where('deleted_at', Null)->with('attributeValues')->orderBy('order', 'asc')->get();
    }

    /**
     * Get attribute_types list for form dropdown.
     *
     * @return array
     */
    public static function attribute_types()
    {
        return \DB::table('attribute_types')->orderBy('type', 'asc')->pluck('type', 'id');
    }

    /**
     * Get manufacturers list for form dropdown.
     *
     * @return array
     */
    public static function manufacturers()
    {
        return \DB::table('manufacturers')->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get gtin_types list for form dropdown.
     *
     * @return array
     */
    public static function gtin_types()
    {
        return \DB::table('gtin_types')->pluck('name', 'name');
    }

    /**
     * Get EmailTemplate list with all values for form dropdown.
     *
     * @return array
     */
    public static function email_templates()
    {
        return \DB::table('email_templates')->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get tags list for form dropdown.
     *
     * @return array
     */
    public static function tags()
    {
        return \DB::table('tags')->orderBy('name', 'asc')->pluck('name', 'id');
    }

}