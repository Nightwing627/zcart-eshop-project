<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrier extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'carriers';

    /**
     * The attributes that should be casted to boolean types.
     *
     * @var array
     */
    protected $casts = [
        'is_free' => 'boolean',
        'handling_cost' => 'boolean',
    ];

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
                    'name',
                    'email',
                    'phone',
                    'std_delivery_time',
                    'time_unit',
                    'max_width',
                    'max_height',
                    'max_depth',
                    'max_weight',
                    'is_free',
                    'flat_shipping_cost',
                    'tax_id',
                    'handling_cost',
                    'tracking_url',
                    'active'
                 ];

    /**
     * Get the tax for the carrier.
     */
    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    /**
     * Get the Shop associated with the carrier.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Get the inventories for the carrier.
     */
    public function inventories()
    {
        return $this->belongsToMany(Inventory::class)->withTimestamps();
    }

    /**
     * Get the carts for the carrier.
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get the orders for the carrier.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Set the is_free for the Carrier.
     */
    public function setIsFreeAttribute($value)
    {
        $this->attributes['is_free'] = (bool) $value;
    }

    /**
     * Set the handling_cost for the Carrier.
     */
    public function setHandlingCostAttribute($value)
    {
        $this->attributes['handling_cost'] = (bool) $value;
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
     * Scope a query to only include records from the users shop.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMine($query)
    {
        return $query->where('shop_id', Auth::user()->merchantId());
    }
}
