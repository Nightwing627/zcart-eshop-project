<?php

namespace App\Policies;

use App\User;
use App\PaymentStatus;
use App\Helpers\Authorize;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentStatusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view utilities.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        return (new Authorize($user, 'view_utility'))->check();
    }

    /**
     * Determine whether the user can view the PaymentStatus.
     *
     * @param  \App\User  $user
     * @param  \App\PaymentStatus  $paymentStatus
     * @return mixed
     */
    public function view(User $user, PaymentStatus $paymentStatus)
    {
        return (new Authorize($user, 'view_utility', $paymentStatus))->check();
    }

    /**
     * Determine whether the user can create PaymentStatuss.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return (new Authorize($user, 'add_utility'))->check();
    }

    /**
     * Determine whether the user can update the PaymentStatus.
     *
     * @param  \App\User  $user
     * @param  \App\PaymentStatus  $paymentStatus
     * @return mixed
     */
    public function update(User $user, PaymentStatus $paymentStatus)
    {
        return (new Authorize($user, 'edit_utility', $paymentStatus))->check();
    }

    /**
     * Determine whether the user can delete the PaymentStatus.
     *
     * @param  \App\User  $user
     * @param  \App\PaymentStatus  $paymentStatus
     * @return mixed
     */
    public function delete(User $user, PaymentStatus $paymentStatus)
    {
        return (new Authorize($user, 'delete_utility', $paymentStatus))->check();
    }
}
