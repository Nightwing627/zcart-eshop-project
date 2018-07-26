<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Inventory::class, function (Faker $faker) {
    $num = $faker->randomFloat($nbMaxDecimals = NULL, $min = 100, $max = 400);
    return [
        'shop_id' => $faker->randomElement(\DB::table('shops')->pluck('id')->toArray()),
        'title' => $faker->sentence,
        'sku' => $faker->word,
        'condition' => 'New',
        'condition_note' => $faker->realText,
        'description' => $faker->text(1500),
        'stock_quantity' => rand(9,99),
        'damaged_quantity' => 0,
        'product_id' => $faker->randomElement(\DB::table('products')->pluck('id')->toArray()),
        'supplier_id' => $faker->randomElement(\DB::table('suppliers')->pluck('id')->toArray()),
        'user_id' => $faker->randomElement(\DB::table('users')->pluck('id')->toArray()),
        'purchase_price' => $num,
        'sale_price' => $num+15,
        'min_order_quantity' => 1,
        'shipping_weight' => rand(100,1999),
        'slug' => $faker->slug,
        'meta_title' => $faker->sentence,
        'meta_description' => $faker->realText,
        'active' => 1,
        'created_at' => Carbon::Now()->subDays(rand(0, 15)),
        'updated_at' => Carbon::Now()->subDays(rand(0, 15)),
    ];
});
