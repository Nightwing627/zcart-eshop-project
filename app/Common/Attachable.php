<?php

namespace App\Common;

use Illuminate\Support\Facades\Storage;

/**
 * Attach this Trait to a User (or other model) for easier read/writes on Replies
 *
 * @author Munna Khan
 */
trait Attachable {

	/**
	 * Check if model has an attachments.
	 *
	 * @return bool
	 */
	public function hasAttachments()
	{
		return (bool) $this->attachments()->count();
	}

	/**
	 * Return collection of attachments related to the attachable
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function attachments()
    {
        return $this->morphMany(\App\Attachment::class, 'attachable')->orderBy('order', 'asc');
    }

	/**
	 * Deletes all the attachments of this model.
	 *
	 * @return bool
	 */
	public function flushAttachments()
	{
		$attachments = $this->attachments()->get();

		foreach ($attachments as $attachment){
	    	Storage::delete($attachment->path);
		}

	    return \App\Attachment::destroy($attachments->pluck('id')->toArray());
	}

	/**
	 * Prepare the previews for the dropzone
	 *
	 * @return array
	 */
	public function previewAttachments()
	{
		$urls = '';
		$configs = '';

		$attachments = $this->attachments()->get();

		foreach ($attachments as $attachment){
	    	Storage::url($attachment->path);
            $path = Storage::url($attachment->path);
            $deleteUrl = route('attachment.delete', $attachment->id);
            $urls .= '"' .$path . '",';
            $configs .= '{caption:"' . $attachment->name . '", size:' . $attachment->size . ', url: "' . $deleteUrl . '", key:' . $attachment->id . '},';
		}

		return [
			'urls' => rtrim($urls, ','),
			'configs' => rtrim($configs, ',')
		];
	}
}