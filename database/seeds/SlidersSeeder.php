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
                'title' => NULL,
                'sub_title' => NULL,
                'link' => '/category/' . $slugs[array_rand($slugs)],
                'order' => 3,
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

        if ( File::isDirectory(public_path('images/demo')) ) {
            $path = storage_path('app/public/'.image_storage_dir());

            if(!File::isDirectory($path))
                File::makeDirectory($path);

            $bgs = glob(public_path('images/demo/sliders/*.jpg'));
            $i = 0;
            foreach ($bgs as $bg) {
                $i++;
                File::copy($bg, $path . "/slider_{$i}.jpg");

                DB::table('images')->insert([
                    [
                        'name' => "slider_{$i}.jpg",
                        'path' => image_storage_dir()."/slider_{$i}.jpg",
                        'extension' => 'jpg',
                        'order' => 1,
                        'featured' => 1,
                        'imageable_id' => $i,
                        'imageable_type' => 'App\Slider',
                        'created_at' => Carbon::Now(),
                        'updated_at' => Carbon::Now(),
                    ]
                ]);
            }
        }
    }
}
