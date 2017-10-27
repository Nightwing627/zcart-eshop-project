<?php
namespace App\Helpers;

use Auth;
use App\Module;
use App\Attribute;

/**
* This is a helper class to process,upload and remove images from different models
*/

class ListHelper
{

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
        $shop = $shop ?: Auth::user()->shop_id; //Get current user's shop_id
        return (array) \DB::table('settings')->where('shop_id', $shop)->first();
    }

    /**
     * Get role list for form dropdown.
     * If the logged in user from a shop then show return roles thats are public.
     * otherwise return roles thats not public
     *
     * @return array
     */
    public static function roles($shop = null)
    {
        $roles = \DB::table('roles')
                ->where('id', '!=', 1)
                ->where('deleted_at', Null)
                ->orderBy('name', 'asc');

        if (Auth::user()->shop_id)
            $roles->where('public', 1);
        else
            $roles->where('public', Null);

        return $roles->pluck('name', 'id');
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
        return \DB::table('permissions')->orderBy('module_id', 'asc')->pluck('name', 'id');
    }

    /**
     * Get modulesWithPermissions list for form dropdown.
     *
     * @return array
     */
    public static function modulesWithPermissions()
    {
        return Module::active()->with('permissions')->orderBy('name', 'asc')->get();
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
     * Get merchants list for form dropdown.
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
     * Get users list under the shop for form dropdown.
     *
     * @return array
     */
    public static function staffs($shop = null)
    {
        $shop = $shop ?: Auth::user()->shop_id; //Get current user's shop_id

        return \DB::table('users')->where('shop_id', $shop)->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get suppliers list for form dropdown.
     *
     * @return array
     */
    public static function suppliers($shop = null)
    {
        $shop = $shop ?: Auth::user()->shop_id; //Get current user's shop_id

        return \DB::table('suppliers')->where('shop_id', $shop)->where('deleted_at', Null)->where('active', 1)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get warehouses list for form dropdown.
     *
     * @return array
     */
    public static function warehouses($shop = null)
    {
        $shop = $shop ?: Auth::user()->shop_id; //Get current user's shop_id

        return \DB::table('warehouses')->where('shop_id', $shop)->where('deleted_at', Null)->where('active', 1)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get carriers list for form dropdown.
     *
     * @return array
     */
    public static function carriers($shop = null)
    {
        if(config('system_settings.vendor_have_own_carriers'))
        {
            $shop = $shop ?: Auth::user()->shop_id; //Get current user's shop_id
        }

        return \DB::table('carriers')->where('shop_id', $shop)->where('deleted_at', Null)->where('active', 1)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get taxes list for form dropdown.
     *
     * @return array
     */
    public static function taxes($shop = null)
    {
        return \DB::table('taxes')
                ->where('active',1)
                ->where('deleted_at', Null)
                ->where( function ($query) {
                    $query->where('public', 1)
                    ->orWhere('shop_id', Auth::user()->shop_id);
                })
                ->orderBy('name', 'asc')
                ->pluck('name', 'id');

        // return \DB::table('taxes')->where('shop_id', $shop)->where('active', 1)->orderBy('name', 'asc')->pluck('name', 'id');
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
     * Get order_statuses list for form dropdown.
     *
     * @return array
     */
    public static function order_statuses()
    {
        return \DB::table('order_statuses')->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get payment_statuses list for form dropdown.
     *
     * @return array
     */
    public static function payment_statuses()
    {
        return \DB::table('payment_statuses')->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get address_types list for form dropdown.
     *
     * @return array
     */
    public static function address_types()
    {
        return \DB::table('address_types')->orderBy('id', 'asc')->where('type', '!=', 'Primary')->pluck('type', 'type');
    }

    /**
     * Get payment_methods list for form dropdown.
     *
     * @return array
     */
    public static function payment_methods()
    {
        return \DB::table('payment_methods')->where('active', 1)->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
    }

    /**
     * Get packagings list for form dropdown.
     *
     * @return array
     */
    public static function packagings()
    {
        return \DB::table('packagings')->where('shop_id', Auth::user()->shop_id)->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
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
     * Get attributes list for form dropdown.
     *
     * @return array
     */
    public static function attributes()
    {
        return \DB::table('attributes')->where('deleted_at', Null)->orderBy('name', 'asc')->pluck('name', 'id');
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
        return \DB::table('attribute_types')->where('deleted_at', Null)->orderBy('type', 'asc')->pluck('type', 'id');
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
     * Get tags list for form dropdown.
     *
     * @return array
     */
    public static function tags()
    {
        return \DB::table('tags')->orderBy('name', 'asc')->pluck('name', 'id');
    }

}