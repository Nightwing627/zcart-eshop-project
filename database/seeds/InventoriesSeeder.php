<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class InventoriesSeeder extends BaseSeeder
{

    private $itemCount = 30;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Inventory::class, $this->itemCount)->create();

        if (File::isDirectory($this->demo_dir))
        {
            $inventories = \DB::table('inventories')->pluck('id')->toArray();

            $img_dirs = glob($this->demo_dir . '/products/*', GLOB_ONLYDIR);

            foreach ($inventories as $item)
            {
                $images = glob($img_dirs[array_rand($img_dirs)] . DIRECTORY_SEPARATOR . '*.jpg');

                foreach ($images as $key => $file)
                {
                    $name = Str::random(10) . '.png';
                    $targetFile = $this->dir . DIRECTORY_SEPARATOR . $name;

                    if( $this->disk->put($targetFile, file_get_contents($file)) )
                    {
                        DB::table('images')->insert([
                            [
                                'name' => $name,
                                'path' => $targetFile,
                                'extension' => 'png',
                                'size' => 0,
                                'imageable_id' => $item,
                                'imageable_type' => 'App\Inventory',
                                'created_at' => Carbon::Now(),
                                'updated_at' => Carbon::Now(),
                            ]
                        ]);
                    }
                }
            }
        }
    }
}
