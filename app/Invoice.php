<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'invoices';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'date_invoice', 'date_payment'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
                    [
                        'shop_id',
                        'order_id',
                        'customer_id',
                        'total',
                        'shipping',
                        'discount',
                        'tax_amount',
                        'grand_total',
                        'paid',
                        'tax_id',
                        'payment_date',
                        'payment_status_id',
                        'payment_method_id',
                        'payment_date',
                    ];

    /**
     * Get the customer associated with the invoice.
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * Get the shop associated with the invoice.
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
     * Get the order associated with the cart.
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    /**
     * Get the status for the order.
     */
    public function status()
    {
        return $this->belongsTo('App\PaymentStatus', 'payment_status_id');
    }


    /**
     * Get the paymentMethod for the invoice.
     */
    public function paymentMethod()
    {
        return $this->belongsTo('App\PaymentMethod');
    }

    // /**
    //  * Get the products for the product.
    //  */
    // public function products()
    // {
    //     return $this->hasManyThrough('App\Product', 'App\Inventory');
    // }

    // *
    //  * Get the inventories for the product.

    // public function inventories()
    // {
    //     return $this->belongsToMany('App\Inventory', 'order_items')
    //                 ->withPivot('item_description', 'quantity', 'unit_price')
    //                 ->withTimestamps();
    // }

    /**
     * Scope a query to only include records from the users shop.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMine($query)
    {
        return $query->where('shop_id', Auth::user()->shop_id);
    }

    /**
     * Set tag date formate
     */
    public function setPaymentDateAttribute($date){
        $this->attributes['payment_date']= Carbon::createFromFormat('Y-m-d', $date);
    }
}
