<?php

namespace App\Helpers;

use Auth;

/**
* Check the action athentications
*/
class Authorize
{
	protected $user;

	protected $model;

	protected $slug;

	function __construct($user, $slug, $model = Null)
	{
		$this->user = $user;
		$this->model = $model;
		$this->slug = $slug;
	}

	public function check()
	{
		if(
			Auth::user()->isSuperAdmin() ||
			isset($this->model->user_id) &&
			$this->model->user_id == $this->user->id
		)
			return true;

        $permissions = config('permissions') ?: $this->user->role->permissions()->pluck('slug')->toArray();

        return in_array($this->slug, $permissions);
	}
}