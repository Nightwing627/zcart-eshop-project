<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ShopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            'id' => 1,
            'owner_id' => 3,
            'name' => 'Demo Shop',
            'legal_name' => 'Demo Shop Ltd.',
            'email' => 'shop@demo.com',
            'description' => 'The shop is for demo application.',
        	'active' => 1,
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);

        DB::table('addresses')->insert([
            'address_type' => 'Primary',
            'addressable_type' => 'App\Shop',
            'addressable_id' => 1,
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);

        DB::table('settings')->insert([
            'shop_id' => 1,
            'display_name' => 'Demo Shop',
            'support_email' => 'support.shop@demo.com',
            'slug' => 'demo-shop',
            'time_zone' => 'Asia/Dhaka',
            'order_number_prefix' => '#',
            'default_tax_id_for_inventory' => rand(1, 5),
            'default_tax_id_for_order' => rand(1, 5),
            'default_carrier_id' => rand(1, 5),
            'flat_shipping_cost' => 2,
            'order_handling_cost' => 2,
            'free_shipping_starts' => 20,
        ]);
    }
}
