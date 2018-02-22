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
                    'tracking_url',
                    'active'
                 ];

    /**
     * Get all of the shippingRates for the country.
     */
    public function shippingRates()
    {
        return $this->hasMany(ShippingRate::class);
    }

    /**
     * Get all of the shippingZones for the country.
     */
    public function shippingZones()
    {
        $shipping_zone_ids = $this->shippingRates->pluck('shipping_zone_id')->unique()->toArray();

        $shippingZones = \DB::table('shipping_zones')->whereIn('id', $shipping_zone_ids)->pluck('name');

        $zone_str = '';
        foreach ($shippingZones as $zone)
            $zone_str .= '<label class="label label-outline">' . $zone . '</label> ';

        return $zone_str;
    }

    /**
     * Get the Shop associated with the carrier.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
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