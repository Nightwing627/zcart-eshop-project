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
