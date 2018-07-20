<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Feedback::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->randomElement(\DB::table('customers')->pluck('id')->toArray()),
        'rating' => rand(1, 5),
        'comment' => $faker->paragraph,
        'feedbackable_id' => rand(1, 15),
        'feedbackable_type' => rand(0, 1) == 1 ? 'App\Shop' : 'App\Product',
        'created_at' => Carbon::Now()->subDays(rand(0, 15)),
        'updated_at' => Carbon::Now()->subDays(rand(0, 15)),
    ];
});
