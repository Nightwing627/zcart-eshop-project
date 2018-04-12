<?php

namespace App\Events\Merchant;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class MerchantRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $merchant;

    /**
     * Create a new job instance.
     *
     * @param  User  $merchant
     * @return void
     */
    public function __construct(User $merchant)
    {
        $this->merchant = $merchant;
    }
}
