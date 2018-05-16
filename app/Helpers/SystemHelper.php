<?php

use App\Helpers\ListHelper;
use Laravel\Cashier\Cashier;

if ( ! function_exists('setSystemConfig') )
{
    /**
     * system config into the config
     */
    function setSystemConfig($shop = Null)
    {
        if(!config('system_settings')){
            $system_settings = ListHelper::system_settings();

            config()->set('system_settings', $system_settings);

            setSystemCurrency();
        }

        if($shop && !config('shop_settings')){
            setShopConfig($shop);
        }
    }
}

if ( ! function_exists('setShopConfig') )
{
    /**
     * shop config into the config
     */
    function setShopConfig($shop = Null)
    {
        if(!config('shop_settings')){
            $shop_settings = ListHelper::shop_settings($shop);

            config()->set('shop_settings', $shop_settings);
        }
    }
}

if ( ! function_exists('setSystemCurrency') )
{
    /**
     * system currency into the config
     */
    function setSystemCurrency()
    {
        $currency = \DB::table('currencies')->where('id', config('system_settings.currency_id'))->first();

        // Set Cashier Currency
        Cashier::useCurrency($currency->iso_code, $currency->symbol);

        config([
            'system_settings.currency' => [
                'name' => $currency->name,
                'symbol' => $currency->symbol,
                'iso_code' => $currency->iso_code,
                'symbol_first' => $currency->symbol_first,
                'decimal_mark' => $currency->decimal_mark,
                'thousands_separator' => $currency->thousands_separator,
                'subunit' => $currency->subunit,
            ]
        ]);
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

