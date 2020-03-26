<?php

use Carbon\Carbon;

class CountriesSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Get all of the countries
        $countries = json_decode(file_get_contents(__DIR__ . '/data/countries.json'), true);

        foreach ($countries as $countryId => $country){

            if(! isset($country['iso_code'])) continue;

            if(isset($country['currency_code'])){
                $currency = \DB::table('currencies')->select('id')
                ->where('iso_code', $country['currency_code'])->first();
            }

            // if(isset($country['currency_code'])){
            //     $currency = \DB::table('currencies')->select('id')
            //     ->where('iso_code', $country['currency_code'])->first();
            // }

            DB::table('countries')->insert([
                'id' => $countryId,
                'name' => $country['name'],
                'full_name' => isset($country['full_name']) ? $country['full_name'] : Null,
                'capital' => isset($country['capital']) ? $country['capital'] : Null,
                'timezone_id' => isset($timezone) && $timezone ? $timezone->id : Null,
                'currency_id' => isset($currency) && $currency ? $currency->id : Null,
                'citizenship' => isset($country['citizenship']) ? $country['citizenship'] : Null,
                // 'country_code' => $country['country-code'],
                // 'currency' => isset($country['currency']) ? $country['currency'] : Null,
                // 'currency_code' => isset($country['currency_code']) ? $country['currency_code'] : Null,
                // 'currency_sub_unit' => isset($country['currency_sub_unit']) ? $country['currency_sub_unit'] : Null,
                // 'currency_symbol' => isset($country['currency_symbol']) ? $country['currency_symbol'] : Null,
                'iso_code' => $country['iso_code'],
                // 'iso_3166_3' => $country['iso_3166_3'],
                'iso_numeric' => isset($country['iso_numeric']) ? $country['iso_numeric'] : Null,
                // 'region_code' => $country['region-code'],
                // 'sub_region_code' => $country['sub-region-code'],
                'calling_code' => $country['calling_code'],
                'flag' => isset($country['flag']) ? $country['flag'] : Null,
                'eea' => (bool) $country['eea'],
                'active' => 1,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]);
        }
    }
}
