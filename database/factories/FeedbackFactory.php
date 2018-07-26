<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Feedback::class, function (Faker $faker) {
	$type = rand(0, 1) == 1 ? 'App\Shop' : 'App\Inventory';
    return [
        'customer_id' => $faker->randomElement(\DB::table('customers')->pluck('id')->toArray()),
        'rating' => rand(1, 5),
        'comment' => $faker->paragraph,
        'feedbackable_id' => $type == 'App\Shop' ? rand(1, 15) : rand(1, 50),
        'feedbackable_type' => $type,
        'created_at' => Carbon::Now()->subDays(rand(0, 15)),
        'updated_at' => Carbon::Now()->subDays(rand(0, 15)),
    ];
});
