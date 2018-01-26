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
            'slug' => 'demo-shop',
            'email' => 'shop@demo.com',
            'description' => 'The shop is for demo application.',
            'timezone_id' => 73,
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

        DB::table('configs')->insert([
            'shop_id' => 1,
            'support_email' => 'support.shop@demo.com',
            'default_sender_email_address' => 'noreply.shop@demo.com',
            'default_email_sender_name' => 'Support Agent',
            'order_number_prefix' => '#',
            'default_tax_id_for_inventory' => rand(1, 5),
            'default_tax_id_for_order' => rand(1, 5),
            'default_carrier_id' => rand(1, 5),
            'default_carrier_ids_for_inventory' => serialize(array_rand(range(1,30), rand(1,4))),
            'default_packaging_ids' => serialize(array_rand(range(1,30), rand(1,4))),
            // 'flat_shipping_cost' => 2,
            'order_handling_cost' => 2,
            'free_shipping_starts' => 20,
        ]);
    }
}
