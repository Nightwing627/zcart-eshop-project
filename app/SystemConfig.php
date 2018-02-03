<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemConfig extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'systems';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                        'support_phone',
                        'support_phone_toll_free',
                        'support_email',
                        'default_sender_email_address',
                        'default_email_sender_name',
                        'length_unit',
                        'weight_unit',
                        'valume_unit',
                        'date_format',
                        'date_separator',
                        'time_format',
                        'time_separator',
                        'decimals',
                        'decimalpoint',
                        'thousands_separator',
                        'show_currency_symbol',
                        'show_space_after_symbol',
                        'coupon_code_size',
                        'gift_card_serial_number_size',
                        'gift_card_pin_size',
                        'merchant_logo_max_size_limit_kb',
                        'pagination',
                        'show_address_title',
                        'address_show_country',
                        'address_geocode',
                        'address_default_country',
                        'address_default_state',
                        'allow_guest_checkout',
                        'auto_approve_order',
                        'ask_customer_for_email_subscription',
                        'notify_when_vendor_registered',
                        'notify_when_disput_appealed',
                        'notify_new_message',
                        'notify_new_ticket',
                    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
                'allow_guest_checkout' => 'boolean',
                'auto_approve_order' => 'boolean',
                'ask_customer_for_email_subscription' => 'boolean',
                'notify_when_vendor_registered' => 'boolean',
                'notify_when_disput_appealed' => 'boolean',
                'notify_new_message' => 'boolean',
                'notify_new_ticket' => 'boolean',
                'show_currency_symbol' => 'boolean',
                'show_space_after_symbol' => 'boolean',
                'show_address_title' => 'boolean',
                'address_show_country' => 'boolean',
                'address_geocode' => 'boolean',
            ];
}
