<?php

use Faker\Generator as Faker;

$factory->define(App\Warehouse::class, function (Faker $faker) {
    return [
        'shop_id' => $faker->randomElement(\DB::table('shops')->pluck('id')->toArray()),
        'incharge' => $faker->randomElement(\DB::table('users')->pluck('id')->toArray()),
        'name' => $faker->company,
        'email' => $faker->email,
        'description' => $faker->text(500),
        'active' => 1,
    ];
});
