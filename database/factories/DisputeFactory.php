<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Dispute::class, function (Faker $faker) {
    $shop_id = rand(1, 30);
    $order_id = $faker->randomElement(\DB::table('orders')->where('shop_id', $shop_id)->pluck('id')->toArray());

    return [
        'dispute_type_id' => rand(1, 7),
        'shop_id' => $shop_id,
        'customer_id' => rand(1, 30),
        'order_id' => $order_id ?: rand(1, 50),
        'description' => $faker->text(100),
        'return_goods' => $faker->boolean,
        'order_received' => $faker->boolean,
        'status' => rand(1, 6),
        'created_at' => Carbon::Now()->subMonths(rand(0, 5)),
        'updated_at' => Carbon::Now()->subMonths(rand(0, 5)),
    ];
});
