<?php

namespace App\Helpers;

use Auth;
use App\Permission;

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

	/**
	 * Check authorization
	 *
	 * @return boolean
	 */
	public function check()
	{
		// Auth::loginUsingId(1, true);

		return true; //FOR TEMPORARY TEST

		if($this->isExceptional())
			return true;

		if(isset($this->model) && ! Auth::user()->isFromPlatform() && ! $this->merchantAuth())
			return false;

        return in_array($this->slug, $this->permissionSlugs());
	}

	/**
	 * Some case in special conditions you may allow all actions for the user
	 *
	 * @return boolean
	 */
	private function merchantAuth()
	{
		return isset($this->model->shop_id) && $this->model->shop_id == $this->user->merchantId();
	}

	/**
	 * Some case in special conditions you may allow all actions for the user
	 *
	 * @return boolean
	 */
	private function isExceptional()
	{
		// The Super admin will not required to check authorization.
		// Just avoid the merchant modules to keep the dashboard clean
		if(Auth::user()->isSuperAdmin())
			return config('authSlugs')[$this->slug] != 'Merchant';

		// The content creator always have the full permission
		if(isset($this->model->user_id) && $this->model->user_id == $this->user->id)
			return true;

		return false;
	}

	/**
	 * If the logged in user is the same user to check the authorization,
	 * then return permission from config veriable that sets by the initSettings middleware.
	 * Otherwise get the permission from the database.
	 *
	 * @return arr
	 */
	private function permissionSlugs()
	{
		if( Auth::user()->id == $this->user->id )
	        return config('permissions');

        return $this->user->role->permissions()->pluck('slug')->toArray();
	}
}