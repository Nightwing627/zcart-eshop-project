<?php
if ( ! function_exists('get_shop_title') )
{
    /**
     * Return shop title or the application title
     */
    function get_shop_title()
    {
        if(auth()->user()->isFromMerchant() && auth()->user()->shop)
            return auth()->user()->shop->name;

        return config('system_settings.name') ?: config('app.name');
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
        if(! $image || ! $dir)
        {
            return;
        }

        $size = $size ? '_' . $size : '';

        $image_path = image_path($dir) . $image . $size . '.png';

        if(! file_exists($image_path))
        {
            return asset(image_path($dir) . 'default.png');
        }

        return asset($image_path);
    }
}

if ( ! function_exists('generateCouponCode') )
{
    function generateCouponCode()
    {
        $unique = TRUE;
        $size = config('system_settings.coupon_code_size');

        do
        {
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

        do
        {
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

        do
        {
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

        if ("Male" == $sex || "app.male" == $sex)
        {
            $icon =  "<i class='fa fa-mars'></i> ";
        }
        elseif ("Female" == $sex || "app.female" == $sex)
        {
            $icon =  "<i class='fa fa-venus'></i> ";
        }

        return $icon . trans($sex) ;
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
        $discount = 0;
        $grand_total = 0;

        foreach ($request->input('cart') as $cart)
        {
            $total = $total + ($cart['quantity'] * $cart['unit_price']);
        }

        $tax = ($total * getTaxRate($request->input('tax_id'))) / 100;

        $shipping = getShippingCostWithHandlingFee($request->input('carrier_id'));

        $grand_total =  ($total - $discount + $tax + $shipping);

        $request->merge([
            'shop_id' => $request->user()->merchantId(),
            'item_count' => count($request->input('cart') ),
            'quantity' => array_sum(array_column($request->input('cart'), 'quantity') ),
            'total' => $total,
            'shipping' => $shipping ?: null,
            'discount' => $discount ?: null,
            'tax_amount' => $tax ?: null,
            'grand_total' => $grand_total,
            'shipping_address' => $request->input('same_as_billing_address')  ?
                                $request->input('billing_address') :
                                $request->input('shipping_address'),
            'approved' => 1,
        ]);

        return $request;
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
    function get_formated_decimal($value = 0, $trim = true)
    {
        $value = number_format(
             $value,
             config('system_settings.decimals') ?: 2,
             config('system_settings.decimalpoint') ?: '.',
             config('system_settings.thousands_separator') ?: ', '
        );

        if ($trim)
        {
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
    function get_formated_currency($value = 0)
    {
        $value = get_formated_decimal($value);

        return
            (config('system_settings.show_currency_symbol') ? config('system_settings.currency_symbol') : '') .
            (config('system_settings.show_space_after_symbol') ? ' ' : '') .
            $value;
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

if ( ! function_exists('getTaxRate') )
{
    /**
     * Return taxe rate for the given tax id
     *
     * @param $request
     */
    function getTaxRate($id)
    {
        $taxrate = \DB::table('taxes')->find($id)->taxrate;

        return get_formated_decimal($taxrate);
    }
}

if ( ! function_exists('getShippingCostWithTaxForCarrier') )
{
    /**
     * Return Shipping Cost for the given carrier id
     *
     * @param $request
     */
    function getShippingCostWithTaxForCarrier($carrier)
    {
        //Check if the given carrier is an object
        if( ! is_object($carrier))
        {
            $carrier = \DB::table('carriers')->find($carrier);
        }

        if($carrier->tax_id)
        {
            $taxrate = \DB::table('taxes')->find($carrier->tax_id)->taxrate;
        }

        $tax = ($carrier->tax_id) ? ($carrier->flat_shipping_cost * ($taxrate / 100)) : 0;

        return $carrier->flat_shipping_cost + $tax;
    }
}

if ( ! function_exists('getShippingCostWithHandlingFee') )
{
    /**
     * Return Shipping Cost and Handling fee for the given carrier
     *
     * @param $request
     */
    function getShippingCostWithHandlingFee($carrier)
    {
        //Check if the given carrier is an object
        if( ! is_object($carrier))
        {
            $carrier = \DB::table('carriers')->find($carrier);
        }

        $handling_cost = $carrier->handling_cost ? config('shop_settings.order_handling_cost') : 0;

        if($carrier->is_free)
        {
            return $handling_cost;
        }

        return getShippingCostWithTaxForCarrier($carrier) + $handling_cost;
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

        if ($i >= count($data))
        {
            array_push($all, $group);

        } else {

            $currentKey = $keys[$i];

            $currentElement = $data[$currentKey];

            if(count($currentElement) <= 0)
            {
               	generate_combinations($data, $all, $group, null, null, $i + 1, $currentKey);

            } else
            {
                foreach ($currentElement as $k => $val)
                {
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

