<?php

use Faker\Generator as Faker;

$factory->define(App\AttributeValue::class, function (Faker $faker) {
    return [
        'shop_id' => $faker->randomElement(\DB::table('shops')->pluck('id')->toArray()),
        'value' => $faker->word,
        'color' => $faker->hexcolor,
        'attribute_id' => $faker->randomElement(\DB::table('attributes')->pluck('id')->toArray()),
        'order' => $faker->randomDigit,
    ];
});
