<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KeyValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('key_values')->insert([
            [
                'title' => 'About the marketplace',
                'key' => 'about_marketplace',
                'value' => '',
                'default' => 'Welcome',
                'help_text' => 'This message will shown on the about section',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'title' => 'Terms of use',
                'key' => 'terms_of_use',
                'value' => '',
                'default' => 'Terms of use',
                'help_text' => 'This message will shown on the terms of use section',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'title' => 'Return and refund policy',
                'key' => 'return_and_refund_policy',
                'value' => '',
                'default' => 'Return and refund policy',
                'help_text' => 'This message will shown on the return and refund policy section',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'title' => 'Welcome message for vendors',
                'key' => 'welcome_msg_for_vendors',
                'value' => '',
                'default' => 'Welcome',
                'help_text' => 'This message will shown on the vendor registration section',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'title' => 'Welcome message for customers',
                'key' => 'welcome_msg_for_customers',
                'value' => '',
                'default' => 'Welcome',
                'help_text' => 'This message will shown on the customer registration section',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'title' => 'Privacy policy for customers',
                'key' => 'privacy_for_customers',
                'value' => '',
                'default' => 'Welcome',
                'help_text' => 'This message will shown on the customer privacy policy section',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'title' => 'Privacy policy for vendors',
                'key' => 'privacy_for_vendors',
                'value' => '',
                'default' => 'Welcome',
                'help_text' => 'This message will shown on the vendor privacy policy section',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);
    }
}
