<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'shop_id' => NULL,
                'name' => 'Super Admin',
                'description' => 'Super Admin can do anything over the application.',
                'public' => 0,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'shop_id' => NULL,
                'name' => 'Admin',
                'description' => 'Admins can do anything over the application. Just cant access Super Admin and other Admins information.',
                'public' => 0,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'shop_id' => NULL,
                'name' => 'Merchant',
                'description' => 'The owner of a shop. A merchant can control all contents under his/her shop.',
                'public' => 0,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'shop_id' => NULL,
                'name' => 'Modaretor',
                'description' => 'Can access all information except the shop settings in under his/her shop.',
                'public' => 1,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'shop_id' => NULL,
                'name' => 'Order Handler',
                'description' => 'Only can access order information under his/her shop.',
                'public' => 1,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);
    }
}
