<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {
    return [
    	'title' => $faker->realText,
        'slug' => $faker->slug,
        'excerpt' => $faker->sentence,
        'content' => $faker->paragraph(10),
        'user_id' => $faker->randomElement(\DB::table('users')->pluck('id')->toArray()),
        'status' => $faker->boolean,
        'created_at' => Carbon::Now()->subDays(rand(0, 15)),
        'updated_at' => Carbon::Now()->subDays(rand(0, 15)),
    ];
});
