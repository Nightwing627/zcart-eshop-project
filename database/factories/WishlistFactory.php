<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Wishlist::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->randomElement(\DB::table('customers')->pluck('id')->toArray()),
        'product_id' => $faker->randomElement(\DB::table('products')->pluck('id')->toArray()),
        'created_at' => Carbon::Now()->subDays(rand(0, 15)),
        'updated_at' => Carbon::Now()->subDays(rand(0, 15)),
    ];
});
