<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Scopes\ActiveScope;

class Inventory extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inventories';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'offer_start', 'offer_end', 'available_from'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                        'shop_id',
                        'warehouse_id',
                        'product_id',
                        'supplier_id',
                        'sku',
                        'condition',
                        'condition_note',
                        'description',
                        'stock_quantity',
                        'damaged_quantity',
                        'tax_id',
                        'user_id',
                        'purchase_price',
                        'sale_price',
                        'offer_price',
                        'offer_start',
                        'offer_end',
                        // 'packaging_id',
                        'shipping_width',
                        'shipping_height',
                        'shipping_depth',
                        'shipping_weight',
                        'available_from',
                        'min_order_quantity',
                        'alert_quantity',
                        'active'
                    ];

    /**
     * Get the Warehouse associated with the inventory.
     */
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    /**
     * Get the product of the inventory.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the supplier for the inventory.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Get the carriers for the inventory.
     */
    public function carriers()
    {
        return $this->belongsToMany(Carrier::class)->withTimestamps();
    }

    /**
     * Get the packagings for the order.
     */
    public function packagings()
    {
        return $this->belongsToMany(Packaging::class)->withTimestamps();
    }

    /**
     * Get the Attributes for the inventory.
     */
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_inventory')
                    ->withPivot('attribute_value_id')
                    ->withTimestamps();
    }

    /**
     * Get the attribute values that owns the SubGroup.
     */
    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'attribute_inventory')
                    ->withPivot('attribute_id')
                    ->withTimestamps();
    }

    /**
     * Get the carts for the product.
     */
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_items')
                    ->withPivot('item_description', 'quantity', 'unit_price')
                    ->withTimestamps();
    }

    /**
     * Get the orders for the product.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
                    ->withPivot('item_description', 'quantity', 'unit_price')
                    ->withTimestamps();
    }

    /**
     * Get the tax for the inventory.
     */
    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    /**
     * Get the carrier list for the inventory.
     *
     * @return array
     */
    public function getCarrierListAttribute()
    {
        if (count($this->carriers)) return $this->carriers->pluck('id')->toArray();
    }

    /**
     * Get the packaging list for the inventory.
     *
     * @return array
     */
    public function getPackagingListAttribute()
    {
        if (count($this->packagings)) return $this->packagings->pluck('id')->toArray();
    }

    /**
     * Set the min_order_quantity for the inventory.
     */
    public function setMinOrderQuantityAttribute($value)
    {
        if ($value > 1)  $this->attributes['min_order_quantity'] = $value;
        else $this->attributes['min_order_quantity'] = 1;
    }

    /**
     * Set the alert_quantity for the inventory.
     */
    public function setAlertQuantityAttribute($value)
    {
        if ($value > 1) $this->attributes['alert_quantity'] = $value;
        else $this->attributes['alert_quantity'] = null;
    }

    /**
     * Set the offer_price for the inventory.
     */
    public function setOfferPriceAttribute($value)
    {
        if ($value > 0) $this->attributes['offer_price'] = $value;
        else $this->attributes['offer_price'] = null;
    }

    /**
     * Get the warehouse_id for the inventory.
     */
    public function setWarehouseIdAttribute($value)
    {
        if ($value > 0) $this->attributes['warehouse_id'] = $value;
        else $this->attributes['warehouse_id'] = null;
    }

    /**
     * Get the supplier_id for the inventory.
     */
    public function setSupplierIdAttribute($value)
    {
        if ($value > 0) $this->attributes['supplier_id'] = $value;
        else $this->attributes['supplier_id'] = null;
    }

    /**
     * Set carbon time formate.
     */
    public function setAvailableFromAttribute($value)
    {
        if(!$value) $this->attributes['available_from'] = date('Y-m-d');
        else $this->attributes['available_from'] = $value;
    }

    /**
     * Set offer_start carbon time formate.
     */
    public function setOfferStartAttribute($value)
    {
        if($value) $this->attributes['offer_start'] = Carbon::createFromFormat('Y-m-d h:i a', $value);
    }

    /**
     * Set offer_end carbon time formate.
     */
    public function setOfferEndAttribute($value)
    {
        if($value) $this->attributes['offer_end'] = Carbon::createFromFormat('Y-m-d h:i a', $value);
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
