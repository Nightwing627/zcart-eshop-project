<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\GiftCard::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->text(1500),
        'value' => rand(9,99),
        'serial_number' => $faker->unique->randomNumber(),
        'pin_code' => $faker->unique->randomNumber(),
        // 'activation_time' => $faker->dateTimeBetween('-2 days', '+2 weeks')->format('Y-m-d H:i:s'),
        // 'expiry_time' => $faker->dateTimeBetween('+3 weeks', '+3 months')->format('Y-m-d H:i:s'),
        'partial_use' => $faker->boolean,
        'exclude_offer_items' => $faker->boolean,
        'exclude_tax_n_shipping' => $faker->boolean,
        'active' => $faker->boolean,
        'created_at' => Carbon::Now()->subDays(rand(0, 15)),
        'updated_at' => Carbon::Now()->subDays(rand(0, 15)),
    ];
});
