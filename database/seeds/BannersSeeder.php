<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class BannersSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Banner::class, 3)->create([
            'columns' => 4,
            'group_id' => 'best_deals'
        ]);
        factory(App\Banner::class, 2)->create([
            'columns' => 6,
            'group_id' => 'place_one'
        ]);
        factory(App\Banner::class)->create([
            'columns' => 12,
            'group_id' => 'place_two'
        ]);
        factory(App\Banner::class, 2)->create([
            'columns' => 12,
            'group_id' => 'sidebar'
        ]);
        factory(App\Banner::class, 2)->create([
            'columns' => 6,
            'group_id' => 'place_three'
        ]);
        factory(App\Banner::class)->create([
            'columns' => 12,
            'group_id' => 'bottom'
        ]);

        if (File::isDirectory($this->demo_dir))
        {
            $bgs = glob($this->demo_dir . '/banners/backgrounds/*.jpg');
            natsort($bgs);
            $i = 0;

            foreach ($bgs as $bg) { $i++;

                $name = "banner_bg_{$i}.jpg";
                $targetFile = $this->dir . DIRECTORY_SEPARATOR . $name;

                if( $this->disk->put($targetFile, file_get_contents($bg)) )
                {
                    DB::table('images')->insert([
                        [
                            'name' => $name,
                            'path' => $targetFile,
                            'extension' => 'jpg',
                            'featured' => 0,
                            'imageable_id' => $i,
                            'imageable_type' => 'App\Banner',
                            'created_at' => Carbon::Now(),
                            'updated_at' => Carbon::Now(),
                        ]
                    ]);
                }

                $hover = $this->demo_dir . "/banners/hover/{$i}.png";
                if( ! file_exists($hover) ) continue;

                $name = "banner_{$i}.png";
                $targetFile = $this->dir . DIRECTORY_SEPARATOR . $name;

                if( $this->disk->put($targetFile, file_get_contents($hover)) )
                {
                    DB::table('images')->insert([
                        [
                            'name' => $name,
                            'path' => $targetFile,
                            'extension' => 'png',
                            'featured' => 1,
                            'imageable_id' => $i,
                            'imageable_type' => 'App\Banner',
                            'created_at' => Carbon::Now(),
                            'updated_at' => Carbon::Now(),
                        ]
                    ]);
                }
            }
        }
    }
}
