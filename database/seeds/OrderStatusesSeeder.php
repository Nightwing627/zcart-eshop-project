<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            [
                'id' => 1,
                'name' => 'Waiting for payment',
                'label_color' => '#fddfff',
                'fulfilled' => false,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'id' => 2,
                'name' => 'Payment error',
                'label_color' => '#fff11f',
                'fulfilled' => false,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'id' => 3,
                'name' => 'Confirmed',
                'label_color' => '#ffffff',
                'fulfilled' => false,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'id' => 4,
                'name' => 'Fulfilled',
                'label_color' => '#00ffff',
                'fulfilled' => true,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'id' => 5,
                'name' => 'Awaiting delivery',
                'label_color' => '#f04fff',
                'fulfilled' => true,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'id' => 6,
                'name' => 'Delivered',
                'label_color' => '#f04fff',
                'fulfilled' => true,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'id' => 7,
                'name' => 'Returned',
                'label_color' => '#f04fff',
                'fulfilled' => true,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);
    }
}
