<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'configs';

    /**
     * The database primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'shop_id';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'maintenance_mode' => 'boolean',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the shop.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Get the tax.
     */
    public function tax()
    {
        return $this->belongsTo(Tax::class, 'default_tax_id_for_order');
    }

    /**
     * Get the tax for inventory.
     */
    public function inventoryTax()
    {
        return $this->belongsTo(Tax::class, 'default_tax_id_for_inventory');
    }

    /**
     * Get the default payment method.
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'default_payment_method_id');
    }

    /**
     * Get the supplier.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'default_supplier_id');
    }

    /**
     * Get the warehouse.
     */
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'default_warehouse_id');
    }

    /**
     * Get the carrier.
     */
    public function carrier()
    {
        return $this->belongsTo(Carrier::class, 'default_carrier_id');
    }

    /**
     * Get the packaging.
     */
    public function packaging()
    {
        return $this->belongsTo(Packaging::class, 'default_packaging_id');
    }

    /**
     * Get the carriersForInventory.
     */
    public function carriersForInventory()
    {
        return unserialize($this->default_carrier_ids_for_inventory);
    }

    /**
     * Setters
     */
    public function setDefaultCarrierIdsForInventoryAttribute($value)
    {
        $this->attributes['default_carrier_ids_for_inventory'] = serialize($value);
    }

    public function setDefaultPackagingIdsAttribute($value)
    {
        $this->attributes['default_packaging_ids'] = serialize($value);
    }

    /**
     * Getters
     */
    public function getDefaultCarrierIdsForInventoryAttribute($value)
    {
        return unserialize($value);
    }

    public function getDefaultPackagingIdsAttribute($value)
    {
        return unserialize($value);
    }

    /**
     * Scope a query to only include active shops.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLive($query)
    {
        return $query->where('maintenance_mode', false);
    }

    /**
     * Scope a query to only include shops thats are down for maintainance.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDown($query)
    {
        return $query->where('maintenance_mode', 1);
    }
}
