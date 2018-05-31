<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->unique->company,
        'slug' => $faker->slug,
        'description' => $faker->text(500),
        'active' => 1,
    ];
});
