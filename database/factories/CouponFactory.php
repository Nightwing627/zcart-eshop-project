<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Coupon::class, function (Faker $faker) {
    return [
        'shop_id' => $faker->randomElement(\DB::table('shops')->pluck('id')->toArray()),
        'name' => $faker->word,
        'code' => $faker->unique->randomNumber(),
        'description' => $faker->text(1500),
        'value' => rand(9, 99),
        'type' => $faker->randomElement(['amount', 'percent']),
        'quantity' => rand(1, 100),
        'quantity_per_customer' => rand(1, 5),
        // 'starting_time' => $faker->dateTimeBetween('-2 days', '+2 weeks')->format('Y-m-d H:i:s'),
        // 'ending_time' => $faker->dateTimeBetween('+3 weeks', '+3 months')->format('Y-m-d H:i:s'),
        'partial_use' => $faker->boolean,
        'exclude_offer_items' => $faker->boolean,
        'exclude_tax_n_shipping' => $faker->boolean,
        'active' => $faker->boolean,
        'created_at' => Carbon::Now()->subDays(rand(0, 15)),
        'updated_at' => Carbon::Now()->subDays(rand(0, 15)),
    ];
});
