<?php

namespace App\Common;

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
            'name' => $image->getClientOriginalName(),
            // 'name' => str_slug($image->getClientOriginalName(), '-'),
            'extension' => $image->getClientOriginalExtension(),
            'featured' => (bool) $featured,
            'size' => $image->getClientSize()
        ]);
	}


	/**
     * Save images from external URL
     *
     * @param  file  $image
     *
     * @return image model
	 */
	public function saveImageFromUrl($url, $featured = null)
	{
    	$file_info = get_headers($url, TRUE);

    	if( ! isset($file_info['Content-Length']) )			return;

		$name = substr($url, strrpos($url, '/') + 1);
		$path = image_storage_dir() . '/' . $name;
    	$extension = substr($name, strrpos($name, '.') + 1);
    	$size = (int) $file_info['Content-Length'];

		$path = image_storage_dir() . '/' . str_random(40) . '.' . $extension;

    	$file = Storage::put($path, file_get_contents($url));

        return $this->image()->create([
            'path' => $path,
            'name' => $name,
            'extension' => $extension,
            'featured' => (bool) $featured,
            'size' => $size,
        ]);
	}

	/**
	 * Deletes the given image.
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
		foreach ($this->images as $image)
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