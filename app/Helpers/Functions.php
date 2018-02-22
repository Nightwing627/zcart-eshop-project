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

if ( ! function_exists('get_site_title') )
{
    /**
     * Return shop title or the application title
     */
    function get_site_title()
    {
        if(auth()->user()->isFromMerchant() && auth()->user()->shop)
            return auth()->user()->shop->name;

        return config('system_settings.name') ?: config('app.name');
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

if ( ! function_exists('gravatar') )
{
    function gravatar($email, $size = 30)
    {
        $email = md5(strtolower(trim($email)));

        $defaultImage = urlencode('https://raw.githubusercontent.com/BadChoice/handesk/master/public/images/default-avatar.png');

        $gravatarURL  = 'https://www.gravatar.com/avatar/'.$email.'?s='.$size."&default={$defaultImage}";

        return '<img id = '.$email.''.$size.' class="gravatar" src="'.$gravatarURL.'" width="'.$size.'">';
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

if ( ! function_exists('attachment_storage_path') )
{
    function attachment_storage_path()
    {
        return 'public/attachments/';
    }
}

if ( ! function_exists('attachment_real_path') )
{
    function attachment_real_path($filename)
    {
        return storage_path() . '/app/' . attachment_storage_path() . $filename;
    }
}

if ( ! function_exists('image_path') )
{
    function image_path($path = '')
    {
        return 'assets/images/' . $path .'/';
        // return base_path('assets/images').($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}

if ( ! function_exists('get_image_src') )
{
    function get_image_src($image = null, $dir = null, $size = null)
    {
        if(! $image || ! $dir)  return;

        $size = $size ? '_' . $size : '';

        $image_path = image_path($dir) . $image . $size . '.png';

        if(! file_exists($image_path))
            return asset(image_path($dir) . 'default.png');

        return asset($image_path);
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
        for($i=0; $i<$size; $i++)
        {
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
        $value = number_format(
             $value,
             config('system_settings.decimals') ?: 2,
             config('system_settings.decimalpoint') ?: '.',
             config('system_settings.thousands_separator') ?: ', '
        );

        if ($trim){
            $dotPos = strrpos($value, '.');
            $commaPos = strrpos($value, ',');
            $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos :
                ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);

            if (!$sep) {
                $value = floatval(preg_replace("/[^0-9]/", "", $value));
            }

            $value = floatval(
                preg_replace("/[^0-9]/", "", substr($value, 0, $sep)) . '.' .
                preg_replace("/[^0-9]/", "", substr($value, $sep+1, strlen($value)))
            );
        }

        if ($decimal)
            return number_format($value, $decimal);

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
        $value =  get_formated_decimal($value);

        if ($decimal)
            return get_formated_currency_symbol() . number_format($value, $decimal);

        return get_formated_currency_symbol() . $value;
    }
}

if ( ! function_exists('get_formated_currency_symbol') )
{
    function get_formated_currency_symbol()
    {
        return
            (config('system_settings.show_currency_symbol') ? config('system_settings.currency_symbol') : '') .
            (config('system_settings.show_space_after_symbol') ? ' ' : '');
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
        return get_formated_decimal($value) . ' ' . config('system_settings.weight_unit');
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

        $upper = get_formated_decimal($rate->maximum) > 0 ? ' - ' . $upper : ' and up';

        return  $lower . $upper;
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
            $full_path = image_path('flags') . $code . '.png';

            if(!file_exists($full_path))
                $full_path = image_path('flags') . 'default.gif';

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

        return \DB::table('packagings')->select('id', 'name', 'cost')->where('shop_id', $shop)->where('default', 1)->where('active', 1)->whereNull('deleted_at')->first();
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
        $grand_total = 0;

        foreach ($request->input('cart') as $cart){
            $total = $total + ($cart['quantity'] * $cart['unit_price']);
        }

        $grand_total =  ($total + $handling + $request->input('shipping') + $request->input('packaging') + $request->input('taxes')) - $request->input('discount');

        $request->merge([
            'shop_id' => $request->user()->merchantId(),
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