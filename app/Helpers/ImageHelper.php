<?php
namespace App\Helpers;

use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
* This is a helper class to process,upload and remove images from different models
*/

class ImageHelper
{

    /**
     * Upload Images for the specified model.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  str  $directory
     * @param  int  $id
     * @param mix $sizes   thumbnail sizes
     *
     * @return void
     */
    public static function UploadImages(Request $request, $directory, $id, $thumbnails = Null)
    {
        if ($request->file('image')->isValid()){
            Storage::putFileAs(image_path("{$directory}/{$id}"), $request->file('image'), "{$id}.png");

            self::CreateThumbnails($request, $directory, $id);
        }

        return;
    }

    /**
     * Delete the whole image directory for the specified model.
     *
     * @param str $directory the directory name of the model
     * @param  int  $id
     *
     * @return bool
     */
    public static function RemoveImages($directory, $id)
    {
        return Storage::deleteDirectory(image_path("{$directory}/{$id}"));
    }

    /**
     * Create Thumbnails for given model and thumnails config
     *
     * @param string $directory the directory name of the model
     * @param int $id   the model id
     * @param mix $sizes   thumbnail sizes
     *
     * @return void
     */
    public static function CreateThumbnails(Request $request, $directory, $id, $sizes = Null)
    {
        $thumbnails = self::thumbnailConfigs($sizes);

        foreach ($thumbnails as $name => $thumbnail) {
            $image = Image::make($request->file('image'))
                    ->resize($thumbnail['width'], $thumbnail['height'],
                        function ($constraint) use ($thumbnail) {
                            if($thumbnail['aspectRatio'])
                                $constraint->aspectRatio();

                            $constraint->upsize();
                        });
            Storage::put(image_path("{$directory}/{$id}") . "{$name}.png", $image->stream());
        }

        return;
    }

    /**
     * Return thumbnail configs from config file
     *
     * @param  mix $thumbnails extra thumbnails with the primary config
     *
     * @return array
     */
    public static function thumbnailConfigs($thumbnails = Null)
    {
        $configs = config('image.sizes.primary');

        if(!$thumbnails) return $configs;

        if( is_array($thumbnails) ){
            foreach ($thumbnails as $thumbnail){
                if(config('image.sizes.' . $thumbnail))
                    $configs[$thumbnail] = config('image.sizes.' . $thumbnail);
            }
        }
        else{
            if(config('image.sizes.' . $thumbnails))
                $configs = array_merge($configs, config('image.sizes.' . $thumbnails));
        }

        return $configs;
    }
}