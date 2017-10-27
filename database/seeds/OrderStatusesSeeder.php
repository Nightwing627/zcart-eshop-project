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
                'name' => 'Completed',
                'label_color' => '#ffffff',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'name' => 'Waiting for approval',
                'label_color' => '#fddfff',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'name' => 'Payment error',
                'label_color' => '#fff11f',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'name' => 'Shipped',
                'label_color' => '#00ffff',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'name' => 'Awaiting delivery',
                'label_color' => '#f04fff',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'name' => 'Delivered',
                'label_color' => '#f04fff',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'name' => 'Cancelled',
                'label_color' => '#f04fff',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'name' => 'Refunded',
                'label_color' => '#f04fff',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);
    }
}
