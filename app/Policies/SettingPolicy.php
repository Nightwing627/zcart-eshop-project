<?php

namespace App\Policies;

use App\User;
use App\Setting;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        return true; //Temporarily

        // return $user->id == $setting->shop->owner_id ||
        //         (
        //             $user->shop_id == $setting->shop_id &&
        //             (new Authorize($user, 'view_setting', $setting))->check()
        //         );
    }

    /**
     * Determine whether the user can view the Setting.
     *
     * @param  \App\User  $user
     * @param  \App\Setting  $setting
     * @return mixed
     */
    public function view(User $user, Setting $setting)
    {
        return $user->id == $setting->shop->owner_id ||
                (
                    $user->shop_id == $setting->shop_id &&
                    (new Authorize($user, 'view_setting', $setting))->check()
                );
    }

    /**
     * Determine whether the user can create Settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the Setting.
     *
     * @param  \App\User  $user
     * @param  \App\Setting  $setting
     * @return mixed
     */
    public function update(User $user, Setting $setting)
    {
        return $user->id == $setting->shop->owner_id ||
                (
                    $user->shop_id == $setting->shop_id &&
                    (new Authorize($user, 'edit_setting', $setting))->check()
                );
    }

    /**
     * Determine whether the user can delete the Setting.
     *
     * @param  \App\User  $user
     * @param  \App\Setting  $setting
     * @return mixed
     */
    public function delete(User $user, Setting $setting)
    {
        return false;
    }
}
