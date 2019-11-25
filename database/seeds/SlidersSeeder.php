<?php

use Carbon\Carbon;
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

        if (File::isDirectory($this->demo_dir))
        {
            $bgs = glob($this->demo_dir . '/sliders/*.jpg');

            $i = 0;
            foreach ($bgs as $bg)
            {
                $i++;
                $name = "slider_{$i}.jpg";
                $targetFile = $this->dir . DIRECTORY_SEPARATOR . $name;

                if( $this->disk->put($targetFile, file_get_contents($bg)) )
                {
                    DB::table('images')->insert([
                        [
                            'name' => $name,
                            'path' => $targetFile,
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
}
