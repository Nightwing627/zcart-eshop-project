<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
            'id' => 1,
        	'shop_id' => Null,
            'role_id' => 1,
            'nice_name' => 'SuperAdmin.',
            'name' => 'Super Admin',
            'email' => 'superadmin@demo.com',
            'password' => bcrypt('123456'),
        	'active' => 1,
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ],[
            'id' => 2,
            'shop_id' => Null,
            'role_id' => 2,
            'nice_name' => 'Admin.',
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'password' => bcrypt('123456'),
            'active' => 1,
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ],[
            'id' => 3,
            'shop_id' => 1,
            'role_id' => 3,
            'nice_name' => 'Marchent.',
            'name' => 'Marchent',
            'email' => 'marchent@demo.com',
            'password' => bcrypt('123456'),
            'active' => 1,
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]
        ]);

        DB::table('addresses')->insert([
        [
            'address_type' => 'Primary',
            'addressable_type' => 'App\User',
            'addressable_id' => 1,
            'address_title' => 'Primary Address',
            'state_id' => 1221,
            'country_id' => 840,
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ],[
            'address_type' => 'Primary',
            'addressable_type' => 'App\User',
            'addressable_id' => 2,
            'address_title' => 'Primary Address',
            'state_id' => 1221,
            'country_id' => 840,
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ],[
            'address_type' => 'Primary',
            'addressable_type' => 'App\Merchant',
            'addressable_id' => 3,
            'address_title' => 'Primary Address',
            'state_id' => 1221,
            'country_id' => 840,
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]
        ]);
    }
}
