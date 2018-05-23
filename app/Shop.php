<?php

namespace App;

use App\SubscriptionPlan;
use App\Common\Loggable;
use App\Common\Imageable;
use App\Common\Addressable;
use App\Events\ShopCreated;
use App\Helpers\Statistics;
use Laravel\Cashier\Billable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes, Loggable, Notifiable, Addressable, Imageable, Billable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shops';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'trial_ends_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'upgrade_plan_notice' => 'boolean',
    ];

    /**
     * The name that will be used when log this model. (optional)
     *
     * @var tring
     */
    protected static $logName = 'shop';

    /**
     * The name that will be ignored when log this model.
     *
     * @var array
     */
    protected static $ignoreChangedAttributes = [
                            'stripe_id',
                            'card_brand',
                            'card_holder_name',
                            'trial_ends_at',
                            'upgrade_plan_notice',
                        ];

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'owner_id',
                    'name',
                    'legal_name',
                    'email',
                    'slug',
                    'description',
                    'external_url',
                    'timezone_id',
                    'current_billing_plan',
                    'stripe_id',
                    'card_holder_name',
                    'card_brand',
                    'card_last_four',
                    'trial_ends_at',
                    'active',
                    'upgrade_plan_notice',
                ];

    /**
     * Get the user that owns the shop.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Get the staffs for the shop.
     */
    public function staffs()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the config for the shop.
     */
    public function config()
    {
        return $this->hasOne(Config::class);
    }

    /**
     * Get the warehouses for the product.
     */
    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }

    /**
     * Get the ShippingZones for the order.
     */
    public function shippingZones()
    {
        return $this->hasMany(ShippingZone::class);
    }

    /**
     * Get the carriers for the shop.
     */
    public function carriers()
    {
        return $this->hasMany(Carrier::class);
    }

    /**
     * Get the user shipping_zones.
     */
    public function shipping_zones()
    {
        return $this->hasMany(ShippingZone::class);
    }

    /**
     * Get the products for the shop.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the orders for the shop.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the carts for the shop.
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get the coupons for the customer.
     */
    public function coupons()
    {
        return $this->belongsToMany(Coupon::class)->withTimestamps();
    }

    /**
     * Get the user gift_cards.
     */
    public function gift_cards()
    {
        return $this->hasMany(GiftCard::class);
    }

    /**
     * Get the paymentMethods for the shop.
     */
    public function paymentMethods()
    {
        return $this->belongsToMany(PaymentMethod::class, 'shop_payment_methods', 'shop_id', 'payment_method_id')
                    ->withTimestamps();
    }

    /**
     * Get the invoices for the shop.
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Get the taxes for the shop.
     */
    public function taxes()
    {
        return $this->hasMany(Tax::class);
    }

    /**
     * Get the suppliers for the product.
     */
    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

    /**
     * Get the timezone the shop.
     */
    public function timezone()
    {
        return $this->belongsTo(Timezone::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function openTickets()
    {
        return $this->tickets()->where('status', '<', Ticket::STATUS_SOLVED);
    }

    public function solvedTickets()
    {
        return $this->tickets()->where('status', '=', Ticket::STATUS_SOLVED);
    }

    public function closedTickets()
    {
        return $this->tickets()->where('status', '=', Ticket::STATUS_CLOSED);
    }

    public function disputes()
    {
        return $this->hasMany(Dispute::class);
    }

    public function openDisputes()
    {
        return $this->disputes()->where('status', '<', Dispute::STATUS_SOLVED);
    }

    public function solvedDisputes()
    {
        return $this->disputes()->where('status', '=', Dispute::STATUS_SOLVED);
    }

    public function closedDisputes()
    {
        return $this->disputes()->where('status', '=', Dispute::STATUS_CLOSED);
    }

    /**
     * Check if the current subscription plan allow to add more user
     *
     * @return bool
     */
    public function canAddMoreUser()
    {
        if($this->current_billing_plan){
            $plan = SubscriptionPlan::findOrFail($this->current_billing_plan);

            if( Statistics::shop_user_count() < $plan->team_size )
                return True;
        }

        return false;
    }

    /**
     * Check if the current subscription plan allow to add more Inventory
     *
     * @return bool
     */
    public function canAddMoreInventory()
    {
        if($this->current_billing_plan){
            $plan = SubscriptionPlan::findOrFail($this->current_billing_plan);

            if( Statistics::shop_inventories_count() < $plan->inventory_limit )
                return True;
        }

        return false;
    }

    /**
     * Scope a query to only include active shops.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
