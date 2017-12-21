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
                    'path',
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
     * @param  str $attachable
     *
     * @return attachment model
     */
    public static function storeAttachmentFromRequest($request, $attachable)
    {
        $path = str_replace(' ', '_', $attachable->id.'_'.$request->file('attachment')->getClientOriginalName());

        $file = Storage::putFileAs(attachment_storage_path(), $request->file('attachment'), $path);

        return $attachable->attachments()->create(['path' => $path]);
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
