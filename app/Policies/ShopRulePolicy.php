<?php

namespace App\Policies;

use App\User;
use App\ShopRule;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopRulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user is the owner of the shop
     *
     * @param  \App\User $user
     * @param  str $ability
     *
     * @return boot
     */
    public function before($user, $ability)
    {
        if ($user->owns->owner_id == $user->id)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can view shop_rules.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        return (new Authorize($user, 'view_shop_rule'))->check();
    }

    /**
     * Determine whether the user can view the ShopRule.
     *
     * @param  \App\User  $user
     * @param  \App\ShopRule  $shopRule
     * @return mixed
     */
    public function view(User $user, ShopRule $shopRule)
    {
        return $user->shop_id == $shopRule->shop_id &&
            (new Authorize($user, 'view_shop_rule', $shopRule))->check();
    }

    /**
     * Determine whether the user can create ShopRules.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return  (new Authorize($user, 'add_shop_rule', $shopRule))->check();
    }

    /**
     * Determine whether the user can update the ShopRule.
     *
     * @param  \App\User  $user
     * @param  \App\ShopRule  $shopRule
     * @return mixed
     */
    public function update(User $user, ShopRule $shopRule)
    {
        return $user->shop_id == $shopRule->shop_id &&
            (new Authorize($user, 'edit_shop_rule', $shopRule))->check();
    }

    /**
     * Determine whether the user can delete the ShopRule.
     *
     * @param  \App\User  $user
     * @param  \App\ShopRule  $shopRule
     * @return mixed
     */
    public function delete(User $user, ShopRule $shopRule)
    {
        return $user->shop_id == $shopRule->shop_id &&
            (new Authorize($user, 'delete_shop_rule', $shopRule))->check();
    }
}
