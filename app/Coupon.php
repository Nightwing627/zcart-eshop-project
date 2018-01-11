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
     * Get the Shop associated with the packaging.
     */
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    /**
     * Get the customers for the coupon.
     */
    public function customers()
    {
        return $this->belongsToMany('App\Customer')->withTimestamps();
    }

    /**
     * Set the quantity for the inventory.
     */
    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] = $value > 1 ? $value : 1;
    }

    /**
     * Set the quantity_per_customer for the inventory.
     */
    public function setQuantityPerCustomerAttribute($value)
    {
        $this->attributes['quantity_per_customer'] = $value > 1 ? $value : 1;
    }

    /**
     * Set the starting_time
     */
    public function setStartingTimeAttribute($value)
    {
        if($value) $this->attributes['starting_time'] = Carbon::createFromFormat('Y-m-d h:i a', $value);
    }

    /**
     * Set the ending_time
     */
    public function setEndingTimeAttribute($value)
    {
        if($value) $this->attributes['ending_time'] = Carbon::createFromFormat('Y-m-d h:i a', $value);
    }

    /**
     * Set the partial_use
     */
    public function setPartialUseAttribute($value)
    {
        $this->attributes['partial_use'] = (bool) $value;
    }

    /**
     * Set the limited
     */
    public function setLimitedAttribute($value)
    {
        $this->attributes['limited'] = (bool) $value;
    }

    /**
     * Set the exclude_offer_items
     */
    public function setExcludeOfferItemsAttribute($value)
    {
        $this->attributes['exclude_offer_items'] = (bool) $value;
    }

    /**
     * Set the exclude_tax_n_shipping
     */
    public function setExcludeTaxNShippingAttribute($value)
    {
        $this->attributes['exclude_tax_n_shipping'] = (bool) $value;
    }

    /**
     * Get the Customer list for the product.
     *
     * @return array
     */
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
