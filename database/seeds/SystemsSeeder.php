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
            'address_line_1' => 'Demo Platform Address',
            'city' => 'Hollywood',
            'state' => 'New York', //state name from states table
            'state_id' => 1221, //state_id from database states table
            'country' => 'United States', //Country name from country table
            'country_id' => 840, //Country_id from database countries table
            'zip_code' => null,
            // 'is_multi_vendor' => 1,
            'date_format' => 'YYYY-MM-DD',
            'date_separate' => '-',
            'time_format' => '12h',
            'time_separate' => ':',
            'time_zone' => 'UTC',
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
            'show_inactive_categories_also_when_create_category' => null,

            // Vendot Defults
            'vendor_can_create_category_group' => null,
            'vendor_can_create_category_sub_group' => null,
            'vendor_can_create_category' => null,
            'vendor_can_create_attribute' => null,
            'vendor_can_create_attribute_value' => 1,
            'vendor_can_create_manufacturer' => 1,
            'vendor_can_create_product' => 1,
            'vendor_have_own_carriers' => 1,
            'vendor_can_have_own_gift_cards' => 1,

            // Address Defults
            'address_geocode' => 1,
            'address_default_country' => 840, //Country id
            'address_default_state' => 1221, //State id
            // 'address_default_country' => 'United States', //Country name
            // 'address_default_state' => 'New York', //Name of the state
            'address_show_country' => 1,

            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);
    }
}
