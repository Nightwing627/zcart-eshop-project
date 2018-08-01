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
        'key_features' => [$faker->sentence, $faker->sentence, $faker->sentence, $faker->sentence, $faker->sentence, $faker->sentence, $faker->sentence],
        'stock_quantity' => rand(9,99),
        'damaged_quantity' => 0,
        'product_id' => $faker->randomElement(\DB::table('products')->pluck('id')->toArray()),
        'supplier_id' => $faker->randomElement(\DB::table('suppliers')->pluck('id')->toArray()),
        'user_id' => $faker->randomElement(\DB::table('users')->pluck('id')->toArray()),
        'purchase_price' => $num,
        'sale_price' => $num+rand(50, 200),
        'offer_price' => rand(1, 0) ? $num+rand(1, 49) : Null,
        'offer_start' => Carbon::Now()->format('Y-m-d h:i a'),
        'offer_end' => date('Y-m-d h:i a', strtotime(rand(3, 22) . ' days')),
        'min_order_quantity' => 1,
        'shipping_weight' => rand(100,1999),
        'free_shipping' => $faker->boolean,
        'linked_items' => array_rand(range(1,50), rand(2,3)),
        'slug' => $faker->slug,
        'meta_title' => $faker->sentence,
        'meta_description' => $faker->realText,
        'stuff_pick' => $faker->boolean,
        'active' => 1,
        'created_at' => Carbon::Now()->subDays(rand(0, 15)),
        'updated_at' => Carbon::Now()->subDays(rand(0, 15)),
    ];
});
