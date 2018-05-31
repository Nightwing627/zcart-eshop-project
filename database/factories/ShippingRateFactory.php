<?php

use Faker\Generator as Faker;

$factory->define(App\ShippingRate::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'shipping_zone_id' => $faker->randomElement(\DB::table('shipping_zones')->pluck('id')->toArray()),
        'based_on' => $faker->randomElement(['price', 'weight']),
        'minimum' => rand(0,50),
        'maximum' => rand(50,500),
        'rate' => rand(0,20),
    ];
});
