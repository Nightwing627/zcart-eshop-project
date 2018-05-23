<?php

namespace App\Helpers;

use Carbon\Carbon;

/**
* This is a helper class to prodive data to charts
*/
class CharttHelper
{

    /**
     * Return formated day trings to make labels
     *
     * @param integer $days   [description]
     * @return array
     */
   	public static function Days($days = 15)
    {
		$dates = [];
		$start = Carbon::today();

		for ($i = $days; $i > 0; $i--) {
			if($i == 1)
		    	$dates[] = 'Today';
			else if($i == 2)
		    	$dates[] = 'Yesterday';
		    else
			    $dates[] = $start->copy()->subDays($i)->format('F d');
		}

		return $dates;
    }
}