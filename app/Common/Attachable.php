<?php

namespace App\Common;

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
        return $this->morphMany(\App\Attachment::class, 'attachable');
    }

	/**
	 * Deletes all the attachments of this model.
	 *
	 * @return bool
	 */
	public function flushAttachments()
	{
		$attachments = $this->attachments();

		foreach ($attachments->get() as $attachment)
			$this->removeAttachmentFileFromDisc($attachment);

		return $attachments->delete();
	}

    private function removeAttachmentFileFromDisc($attachment)
    {
    	$truePath = attachment_real_path($attachment->path);

        if (file_exists($truePath))
            unlink($truePath);

        return true;
    }
}