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
    protected $fillable =
                    [
                        'shop_id',
                        'customer_id',
                        'carrier_id',
                        'packaging_id',
                        'tax_id',
                        'payment_method_id',
                        'billing_address',
                        'shipping_address',
                        'item_count',
                        'quantity',
                        'total',
                        'shipping',
                        'discount',
                        'tax_amount',
                        'grand_total',
                        'payment_status_id',
                        'order_status_id',
                        'message_to_customer',
                        'admin_note',
                    ];

    /**
     * Get the customer associated with the cart.
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * Get the shop associated with the cart.
     */
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    /**
     * Get the tax associated with the cart.
     */
    public function tax()
    {
        return $this->belongsTo('App\Tax');
    }

    /**
     * Get the carrier associated with the cart.
     */
    public function carrier()
    {
        return $this->belongsTo('App\Carrier');
    }

    /**
     * Get the products for the product.
     */
    // public function products()
    // {
    //     return $this->hasManyThrough('App\Product', 'App\Inventory');
    // }

    /**
     * Get the inventories for the product.
     */
    public function inventories()
    {
        return $this->belongsToMany('App\Inventory', 'cart_items')
                    ->withPivot('item_description', 'quantity', 'unit_price')
                    ->withTimestamps();
    }

    /**
     * Scope a query to only include records from the users shop.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMine($query)
    {
        return $query->where('shop_id', Auth::user()->shop_id);
    }
}
