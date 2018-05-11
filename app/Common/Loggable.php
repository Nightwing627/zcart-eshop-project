<?php

namespace App\Common;

use Spatie\Activitylog\Traits\LogsActivity;

trait Loggable
{
	use LogsActivity;

    /**
     * The attributes that will be logged on activity logger.
     *
     * @var boolean
     */
    protected static $logFillable = true;

    /**
     * The only attributes that has been changed.
     *
     * @var boolean
     */
    protected static $logOnlyDirty = true;

	/**
	 * Activities for the loggable model
	 *
	 * @return [type] [description]
	 */
    public function activities()
    {
        return $this->activity()->orderBy('created_at', 'desc')->get();
    }
}