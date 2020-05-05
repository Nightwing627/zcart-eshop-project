<?php

namespace App\Common;

use Illuminate\Support\Str;

/**
 * Attach this Trait to a User has ApiAuthTokens
 *
 * @author Munna Khan
 */
trait ApiAuthTokens {

	public function generateToken()
    {
        $this->api_token = Str::random(60);
        $this->save();

        return $this->api_token;
    }

}