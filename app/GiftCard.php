<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiftCard extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gift_cards';

    /**
     * The attributes that should be casted to boolean types.
     *
     * @var array
     */
    protected $casts = [
        'partial_use' => 'boolean',
        'exclude_offer_items' => 'boolean',
        'exclude_tax_n_shipping' => 'boolean',
        'active' => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['activation_time', 'expiry_time', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'name',
                    'description',
                    'serial_number',
                    'pin_code',
                    'value',
                    'partial_use',
                    'activation_time',
                    'expiry_time',
                    'exclude_offer_items',
                    'exclude_tax_n_shipping',
                    'active',
                 ];

    /**
     * Get the customer for the GiftCard.
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * Set the activation_time for the packaging.
     */
    public function setActivationTimeAttribute($value)
    {
        if($value) $this->attributes['activation_time'] = Carbon::createFromFormat('Y-m-d h:i a', $value);
    }

    /**
     * Set the expiry_time for the packaging.
     */
    public function setExpiryTimeAttribute($value)
    {
        if($value) $this->attributes['expiry_time'] = Carbon::createFromFormat('Y-m-d h:i a', $value);
    }

    /**
     * Set the partial_use for the packaging.
     */
    public function setPartialUseAttribute($value)
    {
        $this->attributes['partial_use'] = (bool) $value;
    }

    /**
     * Set the exclude_offer_items for the packaging.
     */
    public function setExcludeOfferItemsAttribute($value)
    {
        $this->attributes['exclude_offer_items'] = (bool) $value;
    }

    /**
     * Set the exclude_tax_n_shipping for the packaging.
     */
    public function setExcludeTaxNShippingAttribute($value)
    {
        $this->attributes['exclude_tax_n_shipping'] = (bool) $value;
    }

    /**
     * Scope a query to only include valid records.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeValid($query)
    {
        return $query->where('active', 1)->where('activation_time', '<', Carbon::now())->where('expiry_time', '>', Carbon::now());
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
}
