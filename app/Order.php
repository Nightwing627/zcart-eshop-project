<?php

namespace App;

use Carbon\Carbon;
use App\Common\Loggable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes, Loggable;

    const PAYMENT_STATUS_UNPAID             = 1;       //Default
    const PAYMENT_STATUS_PENDING            = 2;
    const PAYMENT_STATUS_PAID               = 3;      //All status before paid value consider as unpaid
    const PAYMENT_STATUS_INITIATED_REFUND   = 4;
    const PAYMENT_STATUS_PARTIALLY_REFUNDED = 5;
    const PAYMENT_STATUS_REFUNDED           = 6;

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
    protected $dates = ['created_at', 'deleted_at', 'shipping_date', 'delivery_date', 'payment_date'];

    /**
     * The name that will be used when log this model. (optional)
     *
     * @var boolean
     */
    protected static $logName = 'order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                        'order_number',
                        'shop_id',
                        'customer_id',
                        'shipping_zone_id',
                        'shipping_rate_id',
                        'packaging_id',
                        'item_count',
                        'quantity',
                        'shipping_weight',
                        'taxrate',
                        'total',
                        'discount',
                        'shipping',
                        'packaging',
                        'handling',
                        'taxes',
                        'grand_total',
                        'billing_address',
                        'shipping_address',
                        'shipping_date',
                        'delivery_date',
                        'tracking_id',
                        'carrier_id',
                        'message_to_customer',
                        'send_invoice_to_customer',
                        'admin_note',
                        'buyer_note',
                        'payment_method_id',
                        'payment_date',
                        'payment_status',
                        'order_status_id',
                        'goods_received',
                        'approved',
                        'feedback_id',
                        'disputed',
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
        return $this->belongsTo(Shop::class)->withDefault();
    }

    /**
     * Fetch billing address
     *
     * @return Address or null
     */
    public function billingAddress()
    {
        return $this->belongsTo(Address::class, 'billing_address');
    }

    /**
     * Fetch billing address
     *
     * @return Address or null
     */
    public function shippingAddress()
    {
        return $this->belongsTo(Address::class, 'shipping_address');
    }

    /**
     * Get the tax associated with the order.
     */
    public function tax()
    {
        return $this->shippingRate->shippingZone->tax();
    }

    /**
     * Get the carrier associated with the cart.
     */
    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

    /**
     * Get the inventories for the order.
     */
    public function inventories()
    {
        return $this->belongsToMany(Inventory::class, 'order_items')
                    ->withPivot('item_description', 'quantity', 'unit_price','feedback_id')
                    ->withTimestamps();
    }

    /**
     * Return collection of conversation related to the order
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function conversation()
    {
        return $this->hasOne(Message::class, 'order_id')->where('customer_id', $this->customer_id);
    }

    /**
     * Return collection of refunds related to the order
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function refunds()
    {
        return $this->hasMany(Refund::class)->orderBy('created_at', 'dec');
    }

    /**
     * Get the dispute for the order.
     */
    public function dispute()
    {
        return $this->hasOne(Dispute::class);
    }

    /**
     * Get the shippingRate for the order.
     */
    public function shippingRate()
    {
        return $this->belongsTo(ShippingRate::class, 'shipping_rate_id');
    }

    /**
     * Get the shippingZone for the order.
     */
    public function shippingZone()
    {
        return $this->belongsTo(ShippingZone::class, 'shipping_zone_id');
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
    public function shippingPackage()
    {
        return $this->belongsTo(Packaging::class, 'packaging_id');
    }

    /**
     * Get the status for the order.
     */
    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    /**
     * Get the shop feedback for the order/shop.
     */
    public function feedback()
    {
        return $this->belongsTo(Feedback::class, 'feedback_id');
    }

    /**
     * Set tag date formate
     */
    public function setShippingDateAttribute($value){
        $this->attributes['shipping_date'] = Carbon::createFromFormat('Y-m-d', $value);
    }
    public function setDeliveryDateAttribute($value){
        $this->attributes['delivery_date'] = Carbon::createFromFormat('Y-m-d', $value);
    }
    public function setShippingAddressAttribute($value){
        if(is_numeric($value))
            $this->attributes['shipping_address'] = Address::find($value)->toHtml('<br/>', false);
    }
    public function setBillingAddressAttribute($value){
        if(is_numeric($value))
            $this->attributes['billing_address'] = Address::find($value)->toHtml('<br/>', false);
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
     * Scope a query to only include paid orders.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePaid($query)
    {
        return $query->where('payment_status', '>=', static::PAYMENT_STATUS_PAID);
    }

    /**
     * Scope a query to only include unpaid orders.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnpaid($query)
    {
        return $query->where('payment_status', '<', static::PAYMENT_STATUS_PAID);
    }

    /**
     * Scope a query to only include unfulfilled orders.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnfulfilled($query)
    {
        return $query->whereHas('status', function ($q) {
            $q->where('fulfilled', 0);
        });
    }

    /**
     * Check if the order has been paid
     *
     * @return boolean
     */
    public function isPaid()
    {
        return $this->payment_status >= static::PAYMENT_STATUS_PAID;
    }

    /**
     * Check if the order has been Fulfilled
     *
     * @return boolean
     */
    public function isFulfilled()
    {
        return $this->status->fulfilled;
    }

    public function refundedSum()
    {
        return $this->refunds->where('status', Refund::STATUS_APPROVED)->sum('amount');
    }

    // Update the goods_received field when customer confirm or change status
    public function goods_received()
    {
        return $this->update(['order_status_id' => 6, 'goods_received' => 1]); // Delivered Status. This id is freezed by system config
    }

    // Update the feedback_given field when customer leave feedback for the shop
    public function feedback_given($feedback_id = Null)
    {
        return $this->update(['feedback_id' => $feedback_id]);
    }

    public function paymentStatusName()
    {
        switch ($this->payment_status) {
            case static::PAYMENT_STATUS_UNPAID: return '<span class="label label-danger">' . strtoupper(trans('app.statuses.unpaid')) . '</span>';

            case static::PAYMENT_STATUS_PENDING: return '<span class="label label-info">' . strtoupper(trans('app.statuses.pending')) . '</span>';

            case static::PAYMENT_STATUS_PAID: return '<span class="label label-outline">' . strtoupper(trans('app.statuses.paid')) . '</span>';

            case static::PAYMENT_STATUS_INITIATED_REFUND:  return '<span class="label label-info">' . strtoupper(trans('app.statuses.refund_initiated')) . '</span>';

            case static::PAYMENT_STATUS_PARTIALLY_REFUNDED: return '<span class="label label-info">' . strtoupper(trans('app.statuses.partially_refunded')) . '</span>';

            case static::PAYMENT_STATUS_REFUNDED: return '<span class="label label-danger">' . strtoupper(trans('app.statuses.refunded')) . '</span>';
        }
    }
}
