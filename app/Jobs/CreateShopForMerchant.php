<?php

namespace App\Jobs;

use App\User;
use App\Shop;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateShopForMerchant
{
    use Dispatchable;

    protected $merchant;
    protected $shop_name;

    /**
     * Create a new job instance.
     *
     * @param  User  $merchant
     * @param  str  $shop_name
     * @return void
     */
    public function __construct(User $merchant, $shop_name)
    {
        $this->merchant = $merchant;
        $this->shop_name = $shop_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $shop = Shop::create([
            'name' => $this->shop_name,
            'description' => trans('app.welcome'),
            'owner_id' => $this->merchant->id,
            'email' => $this->merchant->email,
            'slug' => str_slug($this->shop_name),
            'timezone_id' => config('system_settings.timezone_id'),
            'active' => 0
        ]);

        // configaring The Shop
        $shop->config()->create([
            'support_email' => $this->merchant->email,
            'default_sender_email_address' => $this->merchant->email
        ]);

        // Updating shop_id field in user table
        $this->merchant->shop_id = $shop->id;
        $this->merchant->save();

        // Creating WordWide shippingZones for the Shop
        $shop->shippingZones()->create([
            'name' => trans('app.worldwide'),
            'tax_id' => 1,
            'country_ids' => [],
            'state_ids' => [],
            'rest_of_the_world' => true,
        ]);
    }
}
