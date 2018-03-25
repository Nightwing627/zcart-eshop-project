<?php

namespace App\Common;

use League\Glide\Server;
use Illuminate\Support\Facades\Storage;

/**
 * Attach this Trait to a User (or other model) for easier read/writes on Replies
 *
 * @author Munna Khan
 */
trait Imageable {

	/**
	 * Check if model has an images.
	 *
	 * @return bool
	 */
	public function hasImages()
	{
		return (bool) $this->images()->count();
	}

	/**
	 * Return collection of images related to the imageable
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function images()
    {
        return $this->morphMany(\App\Image::class, 'imageable')->whereNull('featured')->orderBy('order', 'asc');
    }

	/**
	 * Return the image related to the imageable
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function image()
    {
        return $this->morphOne(\App\Image::class, 'imageable')->orderBy('order', 'asc');
    }

	/**
	 * Return the featured Image related to the imageable
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function featuredImage()
    {
        return $this->morphOne(\App\Image::class, 'imageable')->whereNotNull('featured')->orderBy('order', 'asc');
    }

	/**
     * Save images
     *
     * @param  file  $image
     *
     * @return image model
	 */
	public function saveImage($image, $featured = null)
	{
        $file = Storage::put(image_storage_dir(), $image);

        return $this->image()->create([
            'path' => $file,
            'name' => str_slug($image->getClientOriginalName(), '-'),
            'extension' => $image->getClientOriginalExtension(),
            'featured' => (bool) $featured,
            'size' => $image->getClientSize()
        ]);
	}

	/**
	 * Deletes all the images of this model.
	 *
	 * @return bool
	 */
	public function deleteImage($image = Null)
	{
		if (!$image)
			$image = $this->image;

		// \Log::info($image);
		if (optional($image)->path) {
	    	Storage::delete($image->path);
			Storage::deleteDirectory(image_cache_path($image->path));
		    return $image->delete();
		}

		return;
	}

	/**
	 * Deletes the Featured Image of this model.
	 *
	 * @return bool
	 */
	public function deleteFeaturedImage()
	{
		return $this->deleteImage($this->featuredImage);
	}

	/**
	 * Deletes all the images of this model.
	 *
	 * @return bool
	 */
	public function flushImages()
	{
		$images = $this->images;

		foreach ($images as $image)
			$this->deleteImage($image);

		return $this->deleteFeaturedImage();
	}

	/**
	 * Prepare the previews for the dropzone
	 *
	 * @return array
	 */
	public function previewImages()
	{
		$urls = '';
		$configs = '';

		foreach ($this->images as $image){
	    	Storage::url($image->path);
            $path = Storage::url($image->path);
            $deleteUrl = route('image.delete', $image->id);
            $urls .= '"' .$path . '",';
            $configs .= '{caption:"' . $image->name . '", size:' . $image->size . ', url: "' . $deleteUrl . '", key:' . $image->id . '},';
		}

		return [
			'urls' => rtrim($urls, ','),
			'configs' => rtrim($configs, ',')
		];
	}
}