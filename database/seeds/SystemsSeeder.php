<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SystemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('systems')->insert([
            'name' => 'Incevio',
            'legal_name' => 'Incevio Inc.',
            'email' => 'notify@demo.com',
            // 'description' => 'Etc marketplace.',
            'support_email' => 'support@demo.com',
            'is_multi_vendor' => 1,
            'date_format' => 'YYYY-MM-DD',
            'date_separator' => '-',
            'time_format' => '12h',
            'time_separator' => ':',
            'timezone_id' => '35',
            'currency_id' => 148,
            'currency_code' => 'USD',
            'currency_symbol' => '$',
            'length_unit' => 'cm',
            'weight_unit' => 'gm',
            'valume_unit' => 'liter',
            'decimals' => 2,
            // 'currency_format' => 'x,xxx.xx',
            'show_currency_symbol' => 1,
            'show_space_after_symbol' => 1,

            // Vendot Defults
            // 'merchant_can_create_category_group' => null,
            // 'merchant_can_create_category_sub_group' => null,
            // 'merchant_can_create_category' => null,
            // 'merchant_can_create_attribute' => null,
            // 'merchant_can_create_attribute_value' => 1,
            // 'merchant_can_create_manufacturer' => 1,
            // 'merchant_can_create_product' => 1,
            // 'merchant_can_have_own_user_roles' => 1,
            // 'merchant_can_have_own_carriers' => 1,
            // 'merchant_can_have_own_gift_cards' => 1,

            // Address Defults
            'address_geocode' => 1,
            'address_default_country' => 840, //Country id
            'address_default_state' => 1221, //State id
            'address_show_country' => 1,

            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);

        DB::table('addresses')->insert([
            'address_type' => 'Primary',
            'address_line_1' => 'Demo Platform Address',
            'state_id' => 806,
            'zip_code' => 63585,
            'country_id' => 604,
            'city' => 'Hollywood',
            'addressable_id' => 1,
            'addressable_type' => 'App\System',
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);
    }
}
