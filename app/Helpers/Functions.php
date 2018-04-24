<?php

if ( ! function_exists('is_serialized') )
{
    /**
     * Check if the given value is_serialized or not
     */
    function is_serialized( $data ) {
        // if it isn't a string, it isn't serialized
        if ( !is_string( $data ) )
            return false;
        $data = trim( $data );
        if ( 'N;' == $data )
            return true;
        if ( !preg_match( '/^([adObis]):/', $data, $badions ) )
            return false;
        switch ( $badions[1] ) {
            case 'a' :
            case 'O' :
            case 's' :
                if ( preg_match( "/^{$badions[1]}:[0-9]+:.*[;}]\$/s", $data ) )
                    return true;
                break;
            case 'b' :
            case 'i' :
            case 'd' :
                if ( preg_match( "/^{$badions[1]}:[0-9.E-]+;\$/", $data ) )
                    return true;
                break;
        }
        return false;
    }
}

// if ( ! function_exists('get_platform_tld') )
// {
//     /**
//      * Return shop title or the application title
//      */
//     function get_platform_tld()
//     {
//         $url = parse_url(config('app.url'));

//         return $url['host'];
//     }
// }

if ( ! function_exists('get_platform_title') )
{
    /**
     * Return shop title or the application title
     */
    function get_platform_title()
    {
        return config('system_settings.name') ?: config('app.name');
    }
}

if ( ! function_exists('get_site_title') )
{
    /**
     * Return shop title or the application title
     */
    function get_site_title()
    {
        if(auth()->guard('web')->check() && auth()->user()->isFromMerchant() && auth()->user()->shop)
            return auth()->user()->shop->name;

        return get_platform_title();
    }
}

if ( ! function_exists('get_shop_url') )
{
    /**
     * Return shop title or the application title
     */
    function get_shop_url($id = null)
    {
        $slug = '';
        if(auth()->user()->isFromMerchant() && auth()->user()->shop)
            $slug = auth()->user()->shop->slug;
        else if(auth()->user()->isFromPlatform() && $id)
            $slug = \DB::table('shops')->find($id)->slug;

        return url('/shop/' . $slug);
    }
}

if ( ! function_exists('get_gravatar_url') )
{
    function get_gravatar_url($email, $size = 'small')
    {
        $email = md5(strtolower(trim($email)));

        $size = config("image.sizes.{$size}");

        return "https://www.gravatar.com/avatar/{$email}?s={$size['w']}&d=mm";

        // $defaultImage = urlencode('https://raw.githubusercontent.com/BadChoice/handesk/master/public/images/default-avatar.png');
        // return "https://www.gravatar.com/avatar/" . $email . "?s={$size['w']}&default={$defaultImage}";
    }
}

if ( ! function_exists('get_sender_email') )
{
    /**
     * Return shop title or the application title
     */
    function get_sender_email($shop = Null)
    {
        if ($shop)
            return config('shop_settings.default_sender_email_address') ?: config('mail.from.address');

        return config('system_settings.default_sender_email_address') ?: config('mail.from.address');
    }
}

if ( ! function_exists('get_sender_name') )
{
    /**
     * Return shop title or the application title
     */
    function get_sender_name($shop = Null)
    {
        if ($shop)
            return config('shop_settings.default_email_sender_name') ?: config('mail.from.name');

        return config('system_settings.default_email_sender_name') ?: config('mail.from.name');
    }
}
/**
 * Get latitude and longitude of an address from Google API
 */
if ( ! function_exists('getGeocode') )
{
    function getGeocode($address)
    {
        if(is_object($address)){
            $address = $address->toGeocodeString();
        }
        else if(is_numeric($address)){
            $address = \DB::table('addresses')->find($address);
            $address = $address->toGeocodeString();
        }

        $url = 'https://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false';

        $result = [];

        // try to get geo codes
        if ( $geocode = file_get_contents($url) ){
            $output = json_decode($geocode);

            if ( count($output->results) && isset($output->results[0]) ){
                if ( $geo = $output->results[0]->geometry ){
                    $result['latitude'] = $geo->location->lat;
                    $result['longitude'] = $geo->location->lng;
                }
            }
        }

        return $result;
    }
}

if ( ! function_exists('getPaginationValue') )
{
    function getPaginationValue()
    {
        if(auth()->user()->isFromPlatform())
            return config('system_settings.pagination') ?: 10;

        return config('shop_settings.pagination') ?: 10;
    }
}

if ( ! function_exists('getNumberOfInventoryImgs') )
{
    /**
     * Return max_number_of_inventory_imgs allowed to upload per item
     */
    function getNumberOfInventoryImgs()
    {
        return config('system_settings.max_number_of_inventory_imgs') ?: 10;
    }
}

if ( ! function_exists('highlightWords') )
{
    function highlightWords($content, $words = null)
     {
        if($words == null) return $content;

        if(is_array($words)){
            foreach ( $words as $word )
                $content = str_ireplace($word, '<mark>'.$word.'</mark>', $content);

            return $content;
        }

        return str_ireplace($words, '<mark>'.$words.'</mark>', $content);
     }
}

if ( ! function_exists('get_qualified_model') )
{
    function get_qualified_model($class_name = '')
    {
        return 'App\\' . str_singular(studly_case($class_name));
    }
}

if ( ! function_exists('attachment_storage_dir') )
{
    function attachment_storage_dir()
    {
        return 'attachments';
    }
}

if ( ! function_exists('image_storage_dir') )
{
    function image_storage_dir()
    {
        return config('image.dir');
    }
}

if ( ! function_exists('sys_image_path') )
{
    function sys_image_path($dir = '')
    {
        return str_finish("images/{$dir}", '/');
    }
}

if ( ! function_exists('image_storage_path') )
{
    function image_storage_path($path = Null)
    {
        $path = image_storage_dir() . '/' . $path;
        return str_finish($path, '/');
    }
}

if ( ! function_exists('image_cache_path') )
{
    function image_cache_path($path = Null)
    {
        $path = config('image.cache_dir') . '/' . $path;
        return str_finish($path, '/');
    }
}

if ( ! function_exists('get_storage_file_url') )
{
    function get_storage_file_url($path = null, $size = 'small')
    {
        if ( !$path )
            return get_placeholder_img($size);

        return url("image/{$path}?p={$size}");
    }
}

if ( ! function_exists('get_placeholder_img') )
{
    function get_placeholder_img($size = 'small')
    {
        $size = config("image.sizes.{$size}");

        if ($size && is_array($size))
            return "http://placehold.it/{$size['w']}x{$size['h']}?text=No Img";

        return "http://placehold.it/200?text=No Img";
    }
}

if ( ! function_exists('verifyUniqueSlug') )
{
    function verifyUniqueSlug($slug, $table, $field = 'slug')
    {
        if(\DB::table($table)->where($field, $slug)->first())
            return response()->json('false');

        return response()->json('true');
    }
}


if ( ! function_exists('generateCouponCode') )
{
    function generateCouponCode()
    {
        $unique = TRUE;
        $size = config('system_settings.coupon_code_size');

        do{
            $code = generateUniqueSrt($size);

            $check = \DB::table('coupons')->where('code', $code)->first();

            if($check) $unique = FALSE;

        }while( ! $unique );

        return $code;
    }
}

if ( ! function_exists('generatePinCode') )
{
    function generatePinCode()
    {
        $unique = TRUE;
        $size = config('system_settings.gift_card_pin_size');

        do{
            $code = generateUniqueSrt($size);

            $check = \DB::table('gift_cards')->where('pin_code', $code)->first();

            if($check) $unique = FALSE;

        }while( ! $unique );

        return $code;
    }
}

if ( ! function_exists('generateSerialNumber') )
{
    function generateSerialNumber()
    {
        $unique = TRUE;
        $size = config('system_settings.gift_card_serial_number_size');

        do{
            $code = generateUniqueSrt($size);

            $check = \DB::table('gift_cards')->where('serial_number', $code)->first();

            if($check) $unique = FALSE;

        }while( ! $unique );

        return $code;
    }
}

if ( ! function_exists('generateUniqueSrt') )
{
    /**
     * Generate random alfa numaric str.
     *
     * @param  str $dob date of bith
     *
     * @return string
     */
    function generateUniqueSrt($size = 8)
    {
        $characters = implode(range('A', 'Z')) . implode(range(0, 9));
        $uniqueStr = '';
        for($i=0; $i<$size; $i++){
            $uniqueStr .= $characters[mt_rand(0, strlen($characters) - 1)];
        }

        return $uniqueStr;
    }
}

if ( ! function_exists('get_age') )
{
    /**
     * Get age of user/customer from date of birth.
     *
     * @param  str $dob date of bith
     *
     * @return string
     */
    function get_age($dob)
    {
        return date_diff(date_create($dob), date_create('today') )->y . ' years old';
    }
}

if ( ! function_exists('get_formated_file_size') )
{
    /**
     * Get the formated file size.
     *
     * @param  int $bytes
     *
     * @return str formated size string
     */
    function get_formated_file_size($bytes = 0, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}

if ( ! function_exists('get_formated_cutomer_str') )
{
    /**
     * Get the formated customer string.
     *
     * @param  object|array $customer
     *
     * @return str      formated customer string
     */
    function get_formated_cutomer_str($customer)
    {
        if (is_array($customer))
            return  $customer['nice_name'] . ' | ' . $customer['name'] . ' | ' . $customer['email'];

        return  $customer->nice_name . ' | ' . $customer->name . ' | ' . $customer->email;
    }
}

if ( ! function_exists('get_formated_gender') )
{
    /**
     * Get the formated gender string.
     *
     * @param  str $sex
     *
     * @return str      formated gender to display
     */
    function get_formated_gender($sex)
    {
        $icon = '';
        if ("Male" == $sex || "app.male" == $sex){
            $icon =  "<i class='fa fa-mars'></i> ";
        }
        elseif ("Female" == $sex || "app.female" == $sex){
            $icon =  "<i class='fa fa-venus'></i> ";
        }

        return $icon . trans($sex) ;
    }
}

if ( ! function_exists('get_formated_decimal') )
{
    /**
     * Get the formated decimal value.
     *
     * @param  integer $value
     * @param  boolean $trim  remove un wanted zeros after decimal point
     *
     * @return decimal
     */
    function get_formated_decimal($value = 0, $trim = true, $decimal = null)
    {
        if (!$decimal){
            if ($decimal === 0)
                $decimal = 0;
            else
                $decimal = config('system_settings.decimals');
        }

        $value = number_format( $value, $decimal, config('system_settings.currency.decimal_mark'), config('system_settings.currency.thousands_separator') );

        if ($trim){
            if('.' == config('system_settings.currency.decimal_mark'))
                return floatval($value);
        }

        return $value;
    }
}

if ( ! function_exists('get_formated_currency') )
{
    /**
     * Get the formated currency tring.
     *
     * @param  integer $value amount
     *
     * @return str        currency tring
     */
    function get_formated_currency($value = 0, $decimal = null)
    {
        $value =  get_formated_decimal($value, true, $decimal);

        if (config('system_settings.currency.symbol_first'))
            return get_formated_currency_symbol() . $value;

        return $value . get_formated_currency_symbol();
    }
}

if ( ! function_exists('get_formated_currency_symbol') )
{
    function get_formated_currency_symbol()
    {
        if (config('system_settings.show_currency_symbol')) {
            if (config('system_settings.currency.symbol_first'))
                return config('system_settings.currency.symbol') . (config('system_settings.show_space_after_symbol') ? ' ' : '');

            return (config('system_settings.show_space_after_symbol') ? ' ' : '') . config('system_settings.currency.symbol');
        }

        return '';
    }
}

if ( ! function_exists('get_formated_dimension') )
{
    function get_formated_dimension($packaging)
    {
        $dimension = get_formated_decimal($packaging->width) . ' x ' . get_formated_decimal($packaging->height);

        if ($packaging->depth && $packaging->depth > 0)
            $dimension .= ' x ' . get_formated_decimal($packaging->depth);

        return $dimension . ' ' . config('system_settings.length_unit');
    }
}

if ( ! function_exists('get_formated_weight') )
{
    function get_formated_weight($value = 0)
    {
        return get_formated_decimal($value, true, 0) . ' ' . config('system_settings.weight_unit');
    }
}

if ( ! function_exists('get_formated_order_number') )
{
    function get_formated_order_number($order_id = null)
    {
        $order_id = $order_id ?: str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);

        return config('shop_settings.order_number_prefix') . $order_id . config('shop_settings.order_number_suffix');
    }
}

if ( ! function_exists('get_formated_shipping_range_of') )
{
    /**
     * get_formated_shipping_range_of given shipping rate
     *
     * @param $tax
     */
    function get_formated_shipping_range_of($rate){
        if( !is_object($rate) )
            $rate = \DB::table('shipping_rates')->find($rate);

        if ($rate->based_on == 'weight') {
            $lower = get_formated_weight($rate->minimum);
            $upper = get_formated_weight($rate->maximum);
        }
        else{
            $lower = get_formated_currency($rate->minimum);
            $upper = get_formated_currency($rate->maximum);
        }

        if (get_formated_decimal($rate->maximum) > 0)
            return  $lower . ' - ' . $upper;

        return  trans('app.and_up', ['value' => $lower]);
    }
}

// COUNTRY
if ( ! function_exists('get_countries_name_with_states') )
{
    /**
     * Return taxe rate for the given tax id
     *
     * @param $country
     */
    function get_countries_name_with_states($ids){
        if (is_array($ids)){
            $countries = \DB::table('countries')->select('iso_3166_2', 'name', 'id')->whereIn('id', $ids)->get()->toArray();
            $all_states = \DB::table('states')->whereIn('country_id', $ids)->pluck('country_id', 'id')->toArray();

            if(!empty($countries)){
                $result = [];
                foreach ($countries as $country) {
                    $states = array_filter($all_states, function ($value) use ($country) {
                            return $value == $country->id;
                        });

                    $result[$country->id]['code'] = $country->iso_3166_2;
                    $result[$country->id]['name'] = $country->name;
                    $result[$country->id]['states'] = array_keys($states);
                }
                return $result;
            }
        }
        else{
            $country_data = \DB::table('countries')->select('iso_3166_2', 'name')->find($country);
        }
    }
}

if ( ! function_exists('get_formated_country_name') )
{
    /**
     * Return taxe rate for the given tax id
     *
     * @param $country
     */
    function get_formated_country_name($country, $code = null){
        if (is_numeric($country)){
            $country_data = \DB::table('countries')->select('iso_3166_2', 'name')->find($country);
            $country = $country_data->name;
            $code = $country_data->iso_3166_2;
        }

        if($code){
            $full_path = sys_image_path('flags') . $code . '.png';

            if(!file_exists($full_path))
                $full_path = sys_image_path('flags') . 'default.gif';

            return '<img src="'. asset($full_path) .'" alt="'. $code .'"> <span class="indent5">' . $country . '</span>';
        }

        return $country;
    }
}

if ( ! function_exists('get_shipping_zone_of') )
{
    /**
     * Return the shipping zone id of given shop and country and state
     *
     * @param $tax
     */
    function get_shipping_zone_of($shop, $country, $state = null){
        $state_counts = get_state_count_of($country);

        $zones = \DB::table('shipping_zones')->select(['id','name','tax_id','country_ids','state_ids','rest_of_the_world'])->where('shop_id', $shop)->where('active', 1)->get();

        foreach ($zones as $zone) {
            // Check the the shop has a worldwide shipping zone
            if ($zone->rest_of_the_world == 1)
                $worldwide = $zone;

            $countries = unserialize($zone->country_ids);

            if( empty($countries) ) continue;

            if( ! in_array($country, $countries) ) continue;

            // If the country has no states and the given country matched then return the zone
            if ( $state_counts == 0 )
                return $zone;

            $states = unserialize($zone->state_ids);

            if ( $state_counts > 0 && ! $state ) continue;

            if( in_array($state, $states) )
                return $zone;
        }

        return isset($worldwide) ? $worldwide : false;
    }
}

if ( ! function_exists('get_state_count_of') )
{
    /**
     * Return total number of states of given country
     *
     * @param $tax
     */
    function get_state_count_of($country){
        return \DB::table('states')->where('country_id', $country)->count();
    }
}

if ( ! function_exists('get_states_of') )
{
    /**
     * Get states ids of given countries.
     *
     * @param  int $countries
     *
     * @return array
     */
    function get_states_of($countries)
    {
        if (is_array($countries))
            return \DB::table('states')->whereIn('country_id', $countries)->orderBy('name', 'asc')->pluck('name', 'id')->toArray();

        return \DB::table('states')->where('country_id', $countries)->orderBy('name', 'asc')->pluck('name', 'id')->toArray();
    }
}

if ( ! function_exists('getTaxRate') )
{
    /**
     * Return taxe rate for the given tax id
     *
     * @param $tax
     */
    function getTaxRate($tax)
    {
        return \DB::table('taxes')->select('taxrate')->where('id', $tax)->first()->taxrate;
    }
}

if ( ! function_exists('getShippingRates') )
{
    /**
     * Get shipping rates list for the given zone or shop.
     */
    function getShippingRates($zone = Null)
    {
        if($zone)
            return \DB::table('shipping_rates')->where('shipping_zone_id', $zone)->orderBy('rate', 'asc')->get();

        return \DB::table('shipping_zones')
                    ->join('shipping_rates', 'shipping_zones.id', 'shipping_rates.shipping_zone_id')
                    ->where('shipping_zones.shop_id', Auth::user()->merchantId())
                    ->where('shipping_zones.active', 1)
                    ->orderBy('shipping_rates.rate', 'asc')
                    ->get();
    }
}

if ( ! function_exists('getTrackingUrl') )
{
    /**
     * Return tracking utl for the given carrier and tracking id
     *
     * @param $carrier
     * @param $tracking_id
     */
    function getTrackingUrl($tracking_id = Null, $carrier = Null)
    {
        if (!$tracking_id || !$carrier)
            return '#';

        $tracking_url = \DB::table('carriers')->select('tracking_url')->where('id', $carrier)->first()->tracking_url;

        if (!$tracking_url)
            return '#';

        return str_replace('@', $tracking_id, $tracking_url);
    }
}

if ( ! function_exists('filterShippingOptions') )
{
    /**
     * Return filtered shipping options for a given zone and price
     *
     * @param $shop
     * @param $price
     * @param $weight
     */
    function filterShippingOptions($zone, $price, $weight = Null)
    {
        $results = \DB::table('shipping_rates')->where('shipping_zone_id', $zone);

        $results->where(function($query) use ($price, $weight){
            $query->where('based_on', 'price')
                ->where('minimum', '<=', $price)
                ->where(function($q) use ($price){
                    $q->where('maximum', '>=', $price)
                    ->orWhereNull('maximum');
                });

            if ($weight) {
                $query->orWhere(function($q) use ($weight){
                    $q->where('based_on', 'weight')
                        ->where('minimum', '<=', $weight)
                        ->where('maximum', '>=', $weight);
                });
            }
        });

        return $results->get();
    }
}

if ( ! function_exists('getDefaultPackaging') )
{
    /**
     * Return default packaging ID for given shop
     *
     * @param $int shop
     */
    function getDefaultPackaging($shop = null)
    {
        $shop = $shop ?: Auth::user()->merchantId();

        $found = \DB::table('packagings')->select('id', 'name', 'cost')->where('shop_id', $shop)->where('default', 1)->where('active', 1)->whereNull('deleted_at')->first();

        if ($found) return $found;

        return \DB::table('packagings')->select('id', 'name', 'cost')->where('id', 1)->first();
    }
}

if ( ! function_exists('getPackagings') )
{
    /**
     * Return Shipping options for perticulater shop
     *
     * @param $int shop
     */
    function getPackagings($shop = null)
    {
        $shop = $shop ?: Auth::user()->merchantId();

        return \DB::table('packagings')->select('id', 'name', 'cost')->where('shop_id', $shop)->where('active', 1)->whereNull('deleted_at')->get();
    }
}

if ( ! function_exists('getPackagingCost') )
{
    /**
     * Return Shipping Cost and Handling fee for the given carrier
     *
     * @param $int packaging
     */
    function getPackagingCost($packaging)
    {
        return \DB::table('packagings')->select('cost')->where('id', $packaging)->first()->cost;
    }
}

if ( ! function_exists('find_string_in_array') )
{
    /**
     * find string or sub_string in array of string
     *
     * @param  array $arr haystack
     * @param  str $string needle
     *
     * @return bool
     */
    function find_string_in_array ($arr, $string)
    {
        return array_filter($arr, function($value) use ($string) {
            return strpos($value, $string) !== false;
        });
    }
}

if ( ! function_exists('generate_combinations') )
{
    /**
     * Generate all the possible combinations among a set of nested arrays.
     *
     * @param  array   $data  The entrypoint array container.
     * @param  array   &$all  The final container (used internally).
     * @param  array   $group The sub container (used internally).
     * @param  int     $k     The actual key for value to append (used internally).
     * @param  string  $value The value to append (used internally).
     * @param  integer $i     The key index (used internally).
     * @param  int     $key   The kay of parent array (used internally).
     * @return array          The result array with all posible combinations.
     */
    function generate_combinations(array $data, array &$all = [], array $group = [], $k = null, $value = null, $i = 0, $key = null)
    {
        $keys = array_keys($data);

        if ((isset($value) === true) && (isset($k) === true)) {
            $group[$key][$k] = $value;
        }

        if ($i >= count($data)){
            array_push($all, $group);
        }
        else {
            $currentKey = $keys[$i];

            $currentElement = $data[$currentKey];

            if(count($currentElement) <= 0){
               	generate_combinations($data, $all, $group, null, null, $i + 1, $currentKey);
            }
            else{
                foreach ($currentElement as $k => $val){
                    generate_combinations($data, $all, $group, $k, $val, $i + 1, $currentKey);
                }
            }
        }

        return $all;
    }
}

if ( ! function_exists('userLevelCompare') )
{
    /**
     * Compare two user access level and
     * return true is $user can access the $comparable users information
     *
     * @param  mix $compare
     * @param   $user request user
     *
     * @return bool
     */
    function userLevelCompare($compare, $user = Null)
    {
        if (!$user)
            $user = auth()->user();

        if ($user->isSuperAdmin())
            return true;

        if (! $compare instanceof \App\User )
            $compare = \App\User::findorFail($compare);

        // If the comparable user is from a shop and the request user is the owner of the shop
        if (
            $compare->merchantId() && $user->isMerchant() &&
            $user->merchantId() === $compare->merchantId()
        )
            return true;

        //Return if the user is from a shop and the compare user is not from the same shop
        if (!$user->isFromPlatform() && $user->merchantId() !== $compare->merchantId())
            return false;

        //Return true, If comparable user role level not set
        //and requesr user from platform or same shop
        if (!$compare->role->level)
            return $user->isFromPlatform() || $user->merchantId() == $compare->merchantId();

        //If the comparable user role have level.
        //Then the request user must have role level set and have to be an user level user
        return $user->role->level && $compare->role->level > $user->role->level;
    }
}

if ( ! function_exists('get_value_from') )
{
    /**
     * Get value from a given table and id
     *
     * @param  int $ids    The primary keys
     * @param  str $table
     * @param  mix $field
     *
     * @return mix
     */
    function get_value_from($ids, $table, $field)
    {
        if(is_array($ids)){
            $values = \DB::table($table)->select($field)->whereIn('id', $ids)->get()->toArray();
            if(!empty($values)){
                $result = [];
                foreach ($values as $value) {
                    $result[] = $value->$field;
                }
                return $result;
            }
        }
        else{
            $value = \DB::table($table)->select($field)->where('id', $ids)->get();
            if(!empty($value) && isset($value->$field))
                return $value->$field;
        }

        return null;
    }
}

if ( ! function_exists('get_yes_or_no') )
{
    /**
     * Return YES or No tring for views base on a given bool value
     *
     * @param  bool $value
     *
     * @return str
     */
    function get_yes_or_no($value = null)
    {
        return $value ? trans('app.yes') : trans('app.no');
    }
}

if ( ! function_exists('get_msg_folder_name_from_label') )
{
    /**
     * get_msg_folder_name_from_label
     *
     * @param  int $label
     *
     * @return str
     */
    function get_msg_folder_name_from_label($label = 1)
    {
        switch ($label) {
            case \App\Message::LABEL_INBOX: return trans("app.message_labels.inbox");
            case \App\Message::LABEL_SENT: return trans("app.message_labels.sent");
            case \App\Message::LABEL_DRAFT: return trans("app.message_labels.draft");
            case \App\Message::LABEL_SPAM: return trans("app.message_labels.spam");
            case \App\Message::LABEL_TRASH: return trans("app.message_labels.trash");
            default: return trans("app.message_labels.inbox");
        }
    }
}

if ( ! function_exists('get_payment_method_type') )
{
    function get_payment_method_type($id)
    {
        switch ($id) {
            case \App\PaymentMethod::TYPE_PAYPAL:
                return [
                        'name' => trans('app.payment_method_type.paypal.name'),
                        'description' => trans('app.payment_method_type.paypal.description'),
                        'admin_description' => trans('app.payment_method_type.paypal.admin_description'),
                    ];

            case \App\PaymentMethod::TYPE_CREDIT_CARD:
                return [
                        'name' => trans('app.payment_method_type.credit_card.name'),
                        'description' => trans('app.payment_method_type.credit_card.description'),
                        'admin_description' => trans('app.payment_method_type.credit_card.admin_description'),
                    ];

            case \App\PaymentMethod::TYPE_MANUAL:
                return [
                        'name' => trans('app.payment_method_type.manual.name'),
                        'description' => trans('app.payment_method_type.manual.description'),
                        'admin_description' => trans('app.payment_method_type.manual.admin_description'),
                    ];
        }
    }
}

if ( ! function_exists('get_payment_status_name') )
{
    /**
     * get_payment_status_name
     *
     * @param  int $label
     *
     * @return str
     */
    function get_payment_status_name($status = 1)
    {
        switch ($status) {
            case \App\Order::PAYMENT_STATUS_UNPAID: return trans("app.statuses.unpaid");
            case \App\Order::PAYMENT_STATUS_PENDING: return trans("app.statuses.pending");
            case \App\Order::PAYMENT_STATUS_PAID: return trans("app.statuses.paid");
            case \App\Order::PAYMENT_STATUS_INITIATED_REFUND: return trans("app.statuses.refund_initiated");
            case \App\Order::PAYMENT_STATUS_PARTIALLY_REFUNDED: return trans("app.statuses.partially_refunded");
            case \App\Order::PAYMENT_STATUS_REFUNDED: return trans("app.statuses.refunded");
            default: return trans("app.statuses.unpaid");
        }
    }
}


if ( ! function_exists('get_disput_status_name') )
{
    /**
     * get_disput_status_name
     *
     * @param  int $label
     *
     * @return str
     */
    function get_disput_status_name($status = 1)
    {
        switch ($status) {
            case \App\Dispute::STATUS_NEW: return trans('app.statuses.new');

            case \App\Dispute::STATUS_OPEN: return trans('app.statuses.open');

            case \App\Dispute::STATUS_WAITING: return trans('app.statuses.waiting');

            case \App\Dispute::STATUS_APPEALED: return trans('app.statuses.appealed');

            case \App\Dispute::STATUS_SOLVED: return trans('app.statuses.solved');

            case \App\Dispute::STATUS_CLOSED: return trans('app.statuses.closed');
        }
    }
}

if ( ! function_exists('get_activity_title') )
{
    function get_activity_title($activity){
        if(!$activity->causer)
            return trans('app.system') . ' ' . $activity->description . ' ' . trans('app.this') . ' ' . $activity->log_name;

        return title_case($activity->description) . ' ' . trans('app.by') . ' ' . $activity->causer->getName();
    }
}

if ( ! function_exists('setAdditionalCartInfo') )
{
    /**
     * Push some extra information into the request
     *
     * @param $request
     */
    function setAdditionalCartInfo($request)
    {
        $total = 0;
        $handling = config('shop_settings.order_handling_cost');
        $shipping_weight = 0;
        $grand_total = 0;

        foreach ($request->input('cart') as $cart){
            $total = $total + ($cart['quantity'] * $cart['unit_price']);
            $shipping_weight += $cart['shipping_weight'];
        }

        $grand_total =  ($total + $handling + $request->input('shipping') + $request->input('packaging') + $request->input('taxes')) - $request->input('discount');

        $request->merge([
            'shop_id' => $request->user()->merchantId(),
            'shipping_weight' => $shipping_weight,
            'item_count' => count($request->input('cart') ),
            'quantity' => array_sum(array_column($request->input('cart'), 'quantity') ),
            'total' => $total,
            'handling' => $handling,
            'grand_total' => $grand_total,
            'billing_address' => $request->input('same_as_shipping_address') ?
                                $request->input('shipping_address') :
                                $request->input('billing_address'),
            'approved' => 1,
        ]);

        return $request;
    }
}

// STRIPE Helper
// if ( ! function_exists('getStripeAuthorizeUrl') )
// {
//     /**
//      * Return authorize_url to Stripe connect authorization
//      */
//     function getStripeAuthorizeUrl()
//     {
//         return "https://connect.stripe.com/oauth/authorize?response_type=code&client_id=" . config('services.stripe.client_id') . "&scope=read_write&state=" . csrf_token();
//     }
// }

if ( ! function_exists('get_activity_str') )
{
    function get_activity_str($model, $attrbute, $new, $old){

        switch ($attrbute) {
            case 'order_status_id':
                $attrbute = trans('app.status');
                $statues = \App\OrderStatus::find([$old, $new])->pluck('name', 'id');
                $old  = $statues[$old];
                $new  = $statues[$new];
                break;

            case 'payment_status':
                $attrbute = trans('app.payment_status');
                $old  = get_payment_status_name($old);
                $new  = get_payment_status_name($new);
                break;

            case 'carrier_id':
                $attrbute = trans('app.shipping_carrier');
                $carrier = \App\Carrier::find([$old, $new])->pluck('name', 'id');
                $new  = $carrier[$new];

                if(is_null($old))
                    return trans('app.activities.added', ['key' => $attrbute, 'value' => $new]);

                $old  = $carrier[$old];
                break;

            case 'tracking_id':
                $attrbute = trans('app.tracking_id');
                if(is_null($old))
                    return trans('app.activities.added', ['key' => $attrbute, 'value' => $new]);

                break;

            case 'status':
                $attrbute = trans('app.status');
                if(class_basename($model) == 'Dispute'){
                    $old  = get_disput_status_name($old);
                    $new  = get_disput_status_name($new);
                }

                break;

            default:
                $attrbute = title_case(str_replace('_', ' ', $attrbute));
                break;
        }

        return trans('app.activities.updated', ['key' => $attrbute, 'from' => $old, 'to' => $new]);
    }
}
