<?php

use Faker\Generator as Faker;

$factory->define(App\Supplier::class, function (Faker $faker) {
    return [
        'shop_id' => 1,
        'name' => $faker->company,
        'email' => $faker->email,
        'contact_person' => $faker->name,
        'url' => $faker->url,
        'description' => $faker->text(500),
        'active' => 1,
    ];
});
