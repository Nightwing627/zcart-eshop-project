<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategoryGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_groups')->insert([
            [
                'id' => 1,
                'name' => 'Home & Garden',
                'description' => 'Cookware, Dining, Bath, Home Decor and more',
                'icon' => 'fa-home',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'id' => 2,
                'name' => 'Electronics',
                'description' => 'Mobile, Computer, Tablet, Camera etc',
                'icon' => 'fa-plug',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'id' => 3,
                'name' => 'Kids and Toy',
                'description' => 'Toys, Footwear etc',
                'icon' => 'fa-gamepad',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'id' => 4,
                'name' => 'Clothing and Shoes',
                'description' => 'Shoes, Clothing, Life style items',
                'icon' => 'fa-tags',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'id' => 5,
                'name' => 'Beauty and Health',
                'description' => 'Cosmetics, Foods and more.',
                'icon' => 'fa-leaf',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'id' => 6,
                'name' => 'Sports',
                'description' => 'Cycle, Tennis, Boxing, Cricket and more.',
                'icon' => 'fa-futbol-o',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'id' => 7,
                'name' => 'Jewelry',
                'description' => 'Necklances, Rings, Pendants and more.',
                'icon' => 'fa-diamond',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'id' => 8,
                'name' => 'Pets',
                'description' => 'Pet foods and supplies.',
                'icon' => 'fa-paw',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ],[
                'id' => 9,
                'name' => 'Hobbies & DIY',
                'description' => 'Craft Sewing, Supplies and more.',
                'icon' => 'fa-bicycle',
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]
        ]);

        if (env('APP_DEMO') == true && File::isDirectory(public_path('images/demo'))) {
            $path = storage_path('app/public/'.image_storage_dir());
            if(!File::isDirectory($path)) File::makeDirectory($path);

            $category_groups = \DB::table('category_groups')->pluck('id')->toArray();
            foreach ($category_groups as $grp) {
                $img = public_path("images/demo/categories/{$grp}.png");

                if( ! file_exists($img) ) continue;

                File::copy($img,  "{$path}/category_{$grp}.png");

                DB::table('images')->insert([
                    [
                        'name' => "category_{$grp}.png",
                        'path' => image_storage_dir()."/category_{$grp}.png",
                        'extension' => 'png',
                        'featured' => 0,
                        'imageable_id' => $grp,
                        'imageable_type' => 'App\CategoryGroup',
                        'created_at' => Carbon::Now(),
                        'updated_at' => Carbon::Now(),
                    ]
                ]);
            }
        }
    }
}
