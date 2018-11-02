<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BannersSeeder extends Seeder
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
            'columns' => 6,
            'group_id' => 'place_three'
        ]);
        factory(App\Banner::class, 2)->create([
            'columns' => 12,
            'group_id' => 'sidebar'
        ]);
        factory(App\Banner::class)->create([
            'columns' => 12,
            'group_id' => 'bottom'
        ]);

        if (env('APP_DEMO') == true && File::isDirectory(public_path('images/demo'))) {
            $path = storage_path('app/public/'.image_storage_dir());
            if(!File::isDirectory($path)) File::makeDirectory($path);

            $banner_count = 11;
            $banners = glob(public_path('images/demo/banners/banner_*.png'));
            $bgs = glob(public_path('images/demo/banners/banner_bg_*.jpg'));
            for ($i = 1; $i <= $banner_count; $i++) {
                File::copy($banners[array_rand($banners)], $path . "/banner_{$i}.png");
                File::copy($bgs[array_rand($bgs)], $path . "/banner_bg_{$i}.jpg");

                DB::table('images')->insert([
                    [
                        'name' => "banner_{$i}.png",
                        'path' => image_storage_dir()."/banner_{$i}.png",
                        'extension' => 'png',
                        'featured' => 1,
                        'imageable_id' => $i,
                        'imageable_type' => 'App\Banner',
                        'created_at' => Carbon::Now(),
                        'updated_at' => Carbon::Now(),
                    ], [
                        'name' => "banner_bg_{$i}.jpg",
                        'path' => image_storage_dir()."/banner_bg_{$i}.jpg",
                        'extension' => 'jpg',
                        'featured' => 0,
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
