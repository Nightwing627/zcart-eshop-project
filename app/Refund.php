<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    const STATUS_NEW       = 1;         //Default
    const STATUS_PENDING   = 2;
    const STATUS_APPROVED  = 3;
    const STATUS_DECLINED  = 4;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'refunds';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'shop_id',
                    'order_id',
                    'order_received',
                    'return_goods',
                    'amount',
                    'description',
                    'status',
                ];

    /**
     * Get the shop for the refund.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Get the order for the refund.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Set the order_received.
     */
    public function setOrderReceivedAttribute($value)
    {
        $this->attributes['order_received'] = (bool) $value;
    }

    /**
     * Set the return_goods.
     */
    public function setReturnGoodsAttribute($value)
    {
        $this->attributes['return_goods'] = (bool) $value;
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
     * Scope a query to only include records from the users shop.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOpen($query)
    {
        return $query->where('status' , '<', Refund::STATUS_APPROVED);
    }

    /**
     * Scope a query to only include records from the users shop.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeClosed($query)
    {
        return $query->where('status', '>=', Refund::STATUS_APPROVED);
    }

    /**
     * Scope a query to only include records that have the given status.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatusOf($query, $status)
    {
        return $query->where('status', $status);
    }

    public function statusName()
    {
        switch ($this->status) {
            case static::STATUS_NEW: return '<span class="label label-outline">' . trans('app.statuses.new') . '</span>';

            case static::STATUS_PENDING: return '<span class="label label-warning">' . trans('app.statuses.pending') . '</span>';

            case static::STATUS_APPROVED: return '<span class="label label-primary">' . trans('app.statuses.approved') . '</span>';

            case static::STATUS_DECLINED: return '<span class="label label-danger">' . trans('app.statuses.declined') . '</span>';
        }
    }
}
