<?php

use Faker\Generator as Faker;

$factory->define(App\CategoryGroup::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->text(500),
        'active' => 1,
    ];
});
