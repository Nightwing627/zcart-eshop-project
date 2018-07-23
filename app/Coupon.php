<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coupons';

    /**
     * The attributes that should be casted to boolean types.
     *
     * @var array
     */
    protected $casts = [
        'partial_use'           => 'boolean',
        'exclude_offer_items'   => 'boolean',
        'limited'               => 'boolean',
        'exclude_tax_n_shipping' => 'boolean',
        'active'                 => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['starting_time', 'ending_time', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'shop_id',
                    'name',
                    'code',
                    'description',
                    'value',
                    'min_order_amount',
                    'type',
                    'partial_use',
                    'quantity',
                    'quantity_per_customer',
                    'starting_time',
                    'ending_time',
                    'limited',
                    'exclude_offer_items',
                    'exclude_tax_n_shipping',
                    'active',
                 ];

    /**
     * Get the Shop associated with the Coupon.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Get the customers for the coupon.
     */
    public function customers()
    {
        return $this->belongsToMany(Customer::class)->withTimestamps();
    }

    /**
     * Setters
     */
    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] = $value > 1 ? $value : 1;
    }
    public function setQuantityPerCustomerAttribute($value)
    {
        $this->attributes['quantity_per_customer'] = $value > 1 ? $value : 1;
    }
    public function setPartialUseAttribute($value)
    {
        $this->attributes['partial_use'] = (bool) $value;
    }
    public function setLimitedAttribute($value)
    {
        $this->attributes['limited'] = (bool) $value;
    }
    public function setExcludeOfferItemsAttribute($value)
    {
        $this->attributes['exclude_offer_items'] = (bool) $value;
    }
    public function setExcludeTaxNShippingAttribute($value)
    {
        $this->attributes['exclude_tax_n_shipping'] = (bool) $value;
    }

    /**
     * Getters
     */
    // public function getStartingTimeAttribute($value)
    // {
    //     if($value) $this->attributes['starting_time'] = Carbon::createFromFormat('Y-m-d h:i a', $value);
    // }
    // public function getEndingTimeAttribute($value)
    // {
    //     if($value) $this->attributes['ending_time'] = Carbon::createFromFormat('Y-m-d h:i a', $value);
    // }
    public function getCustomerListAttribute()
    {
        if (count($this->customers)) return $this->customers->pluck('id')->toArray();
    }

    /**
     * Scope a query to only include active records.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    /**
     * Scope a query to only include valid records.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeValid($query)
    {
        return $query->where('active', 1)->where('starting_time', '<', Carbon::now())->where('ending_time', '>', Carbon::now());
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
