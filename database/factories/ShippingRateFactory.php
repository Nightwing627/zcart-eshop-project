<?php

use Faker\Generator as Faker;

$factory->define(App\ShippingRate::class, function (Faker $faker) {
    $delivery_takes = rand(1,20);
    return [
        'name' => $faker->word,
        'shipping_zone_id' => $faker->randomElement(\DB::table('shipping_zones')->pluck('id')->toArray()),
        'delivery_takes' => $delivery_takes . '-' . ( $delivery_takes + rand(1,20) ) . ' days',
        'based_on' => $faker->randomElement(['price', 'weight']),
        'minimum' => rand(0,50),
        'maximum' => rand(50,500),
        'rate' => rand(0,20),
    ];
});
