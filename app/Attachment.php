<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attachments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'name',
                    'path',
                    'extension',
                    'size',
                    'order',
                    'featured',
                    'attachable_id',
                    'attachable_type',
                ];

    /**
     * Get all of the owning attachable models.
     */
	public function attachable()
    {
        return $this->morphTo();
    }

    /**
     * Save Attachments
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  model $attachable
     *
     * @return attachment model
     */
    public static function storeAttachmentFromRequest($attachment, $attachable, $dir = 'attachments')
    {
        $file = Storage::put($dir, $attachment);

        return $attachable->attachments()->create([
            'path' => $file,
            'name' => str_slug($attachment->getClientOriginalName(), '-'),
            'extension' => $attachment->getClientOriginalExtension(),
            'size' => $attachment->getClientSize()
        ]);
    }

    /**
     * @param IncomingMail $mail
     * @param $attachable
     */
    // public static function storeAttachmentsFromEmail($mail, $attachable)
    // {
    //     foreach ($mail->getAttachments() as $mailAttachment) {
    //         $path = str_replace(' ', '_', $attachable->id.'_'.$mailAttachment->name);
    //         Storage::put(attachment_storage_path() . $path, file_get_contents($mailAttachment->filePath));
    //         $attachable->attachments()->create(['path' => $path]);
    //         unlink($mailAttachment->filePath);
    //     }
    // }
}
