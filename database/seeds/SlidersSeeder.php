<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SlidersSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::Now();

        $slugs = \DB::table('categories')->pluck('slug')->toArray();
        DB::table('sliders')->insert([
            [
                'title' => NULL,
                'sub_title' => NULL,
                'link' => '/category/' . $slugs[array_rand($slugs)],
                'order' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'title' => NULL,
                'sub_title' => NULL,
                'link' => '/category/' . $slugs[array_rand($slugs)],
                'order' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'title' => 'Demo Slider',
                'sub_title' => 'Change text and color',
                'link' => '/category/' . $slugs[array_rand($slugs)],
                'order' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'title' => NULL,
                'sub_title' => NULL,
                'link' => '/category/' . $slugs[array_rand($slugs)],
                'order' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);

        if (File::isDirectory($this->demo_dir))
        {
            $sliders = \DB::table('sliders')->pluck('id')->toArray();

            $img_dirs = glob($this->demo_dir . '/sliders/*', GLOB_ONLYDIR);

            foreach ($sliders as $slider_id)
            {
                $images = glob($img_dirs[array_rand($img_dirs)] . DIRECTORY_SEPARATOR . '*.{jpg,png,jpeg}', GLOB_BRACE);

                $file = $images[array_rand($images)];
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $name = Str::random(10) . '.' . $ext;
                $targetFile = $this->dir . DIRECTORY_SEPARATOR . $name;

                if( $this->disk->put($targetFile, file_get_contents($file)) )
                {
                   DB::table('images')->insert([
                        'name' => $name,
                        'path' => $targetFile,
                        'extension' => $ext,
                        'order' => $slider_id,
                        'featured' => 1,
                        'imageable_id' => $slider_id,
                        'imageable_type' => 'App\Slider',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]);
                }
            }
        }
    }
}
