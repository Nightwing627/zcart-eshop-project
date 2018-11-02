<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

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
            'current_billing_plan' => 'business',
            'description' => 'The shop is for demo application.',
            'timezone_id' => 73,
        	'active' => 1,
            'trial_ends_at' => Carbon::Now()->addDays(13),
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);

        DB::table('addresses')->insert([
            'address_type' => 'Primary',
            'addressable_type' => 'App\Shop',
            'address_line_1' => 'Demo Platform Address',
            'state_id' => 806,
            'zip_code' => 63585,
            'country_id' => 604,
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
            'default_tax_id' => 1,
            'default_packaging_ids' => serialize(array_rand(range(1,6), 3)),
            'order_handling_cost' => 2,
            'maintenance_mode' => false,
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);

        $country_ids = [ 50, 840];
        $state_ids = \DB::table('states')->whereIn('country_id', $country_ids)->pluck('id')->toArray();

        DB::table('shipping_zones')->insert([
            [
                'shop_id' => 1,
                'name' => 'Domestic',
                'tax_id' => 1,
                'country_ids' => serialize($country_ids),
                'state_ids' => serialize($state_ids),
                'rest_of_the_world' => false,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'shop_id' => 1,
                'name' => 'Worldwide',
                'tax_id' => 1,
                'country_ids' => null,
                'state_ids' => null,
                'rest_of_the_world' => true,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);

        if (env('APP_DEMO') == true && File::isDirectory(public_path('images/demo'))) {
            $path = storage_path('app/public/'.image_storage_dir());
            if(!File::isDirectory($path)) File::makeDirectory($path);

            $logos = glob(public_path('images/demo/logos/*.png'));

            File::copy($logos[array_rand($logos)], $path . "/shop_1_logo.png");

            DB::table('images')->insert([
                [
                    'name' => 'shop_1_logo.png',
                    'path' => image_storage_dir()."/shop_1_logo.png",
                    'extension' => 'png',
                    'featured' => 0,
                    'imageable_id' => 1,
                    'imageable_type' => 'App\Shop',
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            ]);
        }
    }
}
