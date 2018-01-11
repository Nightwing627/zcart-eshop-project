<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'shipping_date', 'delivery_date', 'payment_date'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
                    [
                        'order_number',
                        'shop_id',
                        'customer_id',
                        'carrier_id',
                        'packaging_id',
                        'tax_id',
                        'item_count',
                        'quantity',
                        'total',
                        'shipping',
                        'discount',
                        'tax_amount',
                        'grand_total',
                        'billing_address',
                        'shipping_address',
                        'shipping_date',
                        'package_width',
                        'package_height',
                        'package_depth',
                        'package_weight',
                        'tracking_number',
                        'delivery_date',
                        'message_to_customer',
                        'send_invoice_to_customer',
                        'admin_note',
                        'payment_method_id',
                        'payment_date',
                        'payment_status_id',
                        'order_status_id',
                        'approved',
                    ];

    /**
     * Get the customer associated with the order.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the shop associated with the order.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Get the tax associated with the order.
     */
    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    /**
     * Get the carrier associated with the cart.
     */
    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

    /**
     * Get the products for the order.
     */
    public function products()
    {
        // return $this->hasManyThrough(Product::class, Inventory::class);
        // $products = Product::
            //join('incentories', 'incentories.product_id', '=', 'products.id')
            // ->join('order_items', 'incentories.id', '=', 'order_items.inventory_id')
            // ->join('products', 'order_items.product_id', '=', 'products.id')
            // ->where('products.id', $this->id);

        // $hasMany = new Illuminate\Database\Eloquent\Relations\HasMany(User::query(), $this, 'accounts.owner_id', 'id');

        // $hasMany->matchMany(array($this), $products, 'products');

        // return $products;
    }

    /**
     * Get the inventories for the order.
     */
    public function inventories()
    {
        return $this->belongsToMany(Inventory::class, 'order_items')
                    ->withPivot('item_description', 'quantity', 'unit_price')
                    ->withTimestamps();
    }

    /**
     * Return collection of refunds related to the order
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function refunds()
    {
        return $this->hasMany(Refund::class);
    }

    /**
     * Get the paymentMethod for the order.
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * Get the packaging for the order.
     */
    public function packaging()
    {
        return $this->belongsTo(Packaging::class);
    }

    /**
     * Get the paymentStatus for the order.
     */
    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class);
    }

    /**
     * Get the status for the order.
     */
    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    /**
     * Scope a query to only include records from the users shop.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeArchived($query)
    {
        return $query->onlyTrashed();
    }

    /**
     * Scope a query to only include active orders.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeApproved($query)
    {
        return $query->where('approved', 1);
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

    /**
     * Set tag date formate
     */
    public function setShippingDateAttribute($date){
        $this->attributes['shipping_date']= Carbon::createFromFormat('Y-m-d', $date);
    }
    public function setDeliveryDateAttribute($date){
        $this->attributes['delivery_date']= Carbon::createFromFormat('Y-m-d', $date);
    }
}
