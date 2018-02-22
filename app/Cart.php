<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'carts';

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
                        'shop_id',
                        'customer_id',
                        'shipping_rate_id',
                        'packaging_id',
                        'item_count',
                        'quantity',
                        'total',
                        'discount',
                        'shipping',
                        'packaging',
                        'handling',
                        'taxes',
                        'grand_total',
                        'shipping_address',
                        'billing_address',
                        'payment_method_id',
                        'payment_status_id',
                        'message_to_customer',
                        'admin_note',
                    ];

    /**
     * Get the customer associated with the cart.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the shop associated with the cart.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Get the shippingRate for the order.
     */
    public function shippingRate()
    {
        return $this->belongsTo(ShippingRate::class, 'shipping_rate_id');
    }

    /**
     * Get the packaging for the order.
     */
    public function shippingPackage()
    {
        return $this->belongsTo(Packaging::class, 'packaging_id');
    }

    /**
     * Get the carrier associated with the cart.
     */
    public function carrier()
    {
        return $this->shippingRate->carrier();
    }

    /**
     * Get the inventories for the product.
     */
    public function inventories()
    {
        return $this->belongsToMany(Inventory::class, 'cart_items')
                    ->withPivot('item_description', 'quantity', 'unit_price')
                    ->withTimestamps();
    }

    /**
     * Get the paymentMethod for the order.
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * Get the paymentStatus for the order.
     */
    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class);
    }

    /**
     * Scope a query to only include records from the users shop.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMine($query)
    {
        return $query->where('shop_id', Auth::user()->merchantId());
    }
}
