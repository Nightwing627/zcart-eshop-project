<?php
namespace App\Helpers;

use Image;
use Illuminate\Http\Request;

/**
* This is a helper class to process,upload and remove images from different models
*/

class ImageHelper
{

    /**
     * Upload Images for the specified model.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return void
     */
    public static function UploadImages(Request $request, $directory, $id)
    {
        if ($request->file('image')->isValid())
        {
            $request->file('image')->move(image_path($directory), $id . '.png');

            self::CreateThumbnails($directory, $id);
        }
    }

    /**
     * Delete avatar for the specified model.
     *
     * @param  int  $id
     * @return void
     */
    public static function RemoveImages($directory, $id)
    {
        if (file_exists(image_path($directory) . $id . '.png'))
        {
            unlink(image_path($directory) . $id . '.png');

            $mask = image_path($directory) . $id . '_*.*';

            array_map('unlink', glob($mask));
        }

        return true;
    }

    /**
     * Create Thumbnails for system use
     * @param string $directory the directory name if the image
     * @param int $id        the image ID
     */
    public static function CreateThumbnails($directory, $id)
    {
        Image::make(image_path($directory) . $id . '.png')->resize(150, 150)->save(image_path($directory) . $id . '_150x150.png');

        Image::make(image_path($directory) . $id . '_150x150.png')->resize(35, 35)->save(image_path($directory) . $id . '_35x35.png');
    }

    /**
     * Resize Image from a give image directory and id
     * @param string $directory the directory name if the image
     * @param int $id        the image ID
     * @param int $width     The result width of the image
     * @param int $height    The result height of the image
     */
    public static function ResizeImage($directory, $id, $width = null, $height = null)
    {
        $height = $height ?: $width;

        Image::make(image_path($directory) . $id . '.png')->resize($width, $height)->save(image_path($directory) . $id . '_' . $width . 'x' . $height . '.png');
    }
}