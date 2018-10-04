<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SlidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slugs = \DB::table('categories')->pluck('slug')->toArray();
        DB::table('sliders')->insert([
            [
                'title' => NULL,
                'sub_title' => NULL,
                'link' => '/category/' . $slugs[array_rand($slugs)],
                'order' => 1,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'title' => NULL,
                'sub_title' => NULL,
                'link' => '/category/' . $slugs[array_rand($slugs)],
                'order' => 2,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ], [
                'title' => 'Demo Slider',
                'sub_title' => 'You can change this',
                'link' => '/category/' . $slugs[array_rand($slugs)],
                'order' => 4,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);

        // copy(public_path('images/demo/1.jpeg'), image_storage_dir() . '/1.jpg');
        // copy(public_path('/images/demo/2.jpeg'), image_storage_dir() . '/2.jpg');
        // copy(public_path('/images/demo/3.jpeg'), image_storage_dir() . '/3.jpg');

        // DB::table('images')->insert([
        //     [
        //         'name' => '1.jpg',
        //         'path' => 'images/1.jpeg',
        //         'extension' => 'jpg',
        //         'order' => 1,
        //         'featured' => 1,
        //         'imageable_id' => 1,
        //         'imageable_type' => 'App\Slider',
        //         'created_at' => Carbon::Now(),
        //         'updated_at' => Carbon::Now(),
        //     ], [
        //         'name' => '2.jpg',
        //         'path' => 'images/2.jpeg',
        //         'extension' => 'jpg',
        //         'order' => 2,
        //         'featured' => 1,
        //         'imageable_id' => 2,
        //         'imageable_type' => 'App\Slider',
        //         'created_at' => Carbon::Now(),
        //         'updated_at' => Carbon::Now(),
        //     ], [
        //         'name' => '3.jpg',
        //         'path' => 'images/3.jpeg',
        //         'extension' => 'jpg',
        //         'order' => 3,
        //         'featured' => 1,
        //         'imageable_id' => 3,
        //         'imageable_type' => 'App\Slider',
        //         'created_at' => Carbon::Now(),
        //         'updated_at' => Carbon::Now(),
        //     ]
        // ]);
    }
}
