<?php

namespace App;

use App\Common\Imageable;
use App\Common\Addressable;
use App\Events\ShopCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes, Addressable, Imageable;

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
    protected $dates = ['deleted_at'];

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
                    'active',
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
     * Get the rules for the shop.
     */
    public function rules()
    {
        return $this->hasOne(ShopRule::class);
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
     * Scope a query to only include active shops.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
