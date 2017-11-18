<?php

namespace App\Policies;

use App\User;
use App\Order;
use App\Helpers\Authorize;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view orders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        return (new Authorize($user, 'view_order'))->check();
    }

    /**
     * Determine whether the user can view the Order.
     *
     * @param  \App\User  $user
     * @param  \App\Order  $order
     * @return mixed
     */
    public function view(User $user, Order $order)
    {
        return (new Authorize($user, 'view_order', $order))->check();
    }

    /**
     * Determine whether the user can create Orders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return (new Authorize($user, 'add_order'))->check();
    }

    /**
     * Determine whether the user can update the Order.
     *
     * @param  \App\User  $user
     * @param  \App\Order  $order
     * @return mixed
     */
    public function update(User $user, Order $order)
    {
        return (new Authorize($user, 'edit_order', $order))->check();
    }

    /**
     * Determine whether the user can delete the Order.
     *
     * @param  \App\User  $user
     * @param  \App\Order  $order
     * @return mixed
     */
    public function delete(User $user, Order $order)
    {
        return (new Authorize($user, 'delete_order', $order))->check();
    }
}
