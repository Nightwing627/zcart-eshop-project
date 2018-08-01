<?php

namespace App;

use Carbon\Carbon;
use App\Common\Taggable;
use App\Common\Imageable;
use App\Common\Feedbackable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes, Taggable, Imageable, Feedbackable;

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
     * The attributes that should be casted to boolean types.
     *
     * @var array
     */
    protected $casts = [
        'free_shipping' => 'boolean',
        'stuff_pick' => 'boolean',
        'active' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                        'shop_id',
                        'title',
                        'warehouse_id',
                        'product_id',
                        'supplier_id',
                        'sku',
                        'condition',
                        'condition_note',
                        'description',
                        'key_features',
                        'stock_quantity',
                        'damaged_quantity',
                        'user_id',
                        'purchase_price',
                        'sale_price',
                        'offer_price',
                        'offer_start',
                        'offer_end',
                        'shipping_weight',
                        'free_shipping',
                        'available_from',
                        'min_order_quantity',
                        // 'alert_quantity',
                        'linked_items',
                        'slug',
                        'meta_title',
                        'meta_description',
                        'stuff_pick',
                        'active'
                    ];

    /**
     * Get the shop of the inventory.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

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
                    ->withPivot('item_description', 'quantity', 'unit_price', 'feedback_id')
                    ->withTimestamps();
    }

    public function isLowQtt()
    {
        $alert_quantity = config('shop_settings.alert_quantity') ?: 0;

        return $this->stock_quantity <= $alert_quantity;
    }

    /**
     * Check if the item hase a valid offer price.
     */
    public function hasOffer()
    {
        if(
            ($this->offer_price > 0) &&
            ($this->offer_price < $this->sale_price) &&
            ($this->offer_start < \Carbon\Carbon::now()) &&
            ($this->offer_end > \Carbon\Carbon::now())
        )
            return TRUE;

        return FALSE;
    }

    public function currnt_sale_price()
    {
        if($this->hasOffer())
            return $this->offer_price;

        return $this->sale_price;
    }

    /**
     * Setters
     */
    public function setMinOrderQuantityAttribute($value)
    {
        if ($value > 1)  $this->attributes['min_order_quantity'] = $value;
        else $this->attributes['min_order_quantity'] = 1;
    }
    public function setOfferPriceAttribute($value)
    {
        if ($value > 0) $this->attributes['offer_price'] = $value;
        else $this->attributes['offer_price'] = null;
    }
    public function setWarehouseIdAttribute($value)
    {
        if ($value > 0) $this->attributes['warehouse_id'] = $value;
        else $this->attributes['warehouse_id'] = null;
    }
    public function setSupplierIdAttribute($value)
    {
        if ($value > 0) $this->attributes['supplier_id'] = $value;
        else $this->attributes['supplier_id'] = null;
    }
    public function setAvailableFromAttribute($value)
    {
        if($value) $this->attributes['available_from'] = Carbon::createFromFormat('Y-m-d h:i a', $value);
    }
    public function setOfferStartAttribute($value)
    {
        if($value) $this->attributes['offer_start'] = Carbon::createFromFormat('Y-m-d h:i a', $value);
    }
    public function setOfferEndAttribute($value)
    {
        if($value) $this->attributes['offer_end'] = Carbon::createFromFormat('Y-m-d h:i a', $value);
    }
    public function setFreeShippingAttribute($value)
    {
        $this->attributes['free_shipping'] = (bool) $value;
    }
    public function setKeyFeaturesAttribute($value)
    {
        $value = array_filter($value, function($item) { return !empty($item[0]); });

        $this->attributes['key_features'] = serialize($value);
    }
    public function setLinkedItemsAttribute($value)
    {
        $this->attributes['linked_items'] = serialize($value);
    }

    // /**
    //  * Set the alert_quantity for the inventory.
    //  */
    // public function setAlertQuantityAttribute($value)
    // {
    //     if ($value > 1) $this->attributes['alert_quantity'] = $value;
    //     else $this->attributes['alert_quantity'] = null;
    // }

    /**
     * Getters
     */
    public function getPackagingListAttribute()
    {
        if (count($this->packagings)) return $this->packagings->pluck('id')->toArray();
    }
    public function getKeyFeaturesAttribute($value)
    {
        return unserialize($value);
    }
    public function getLinkedItemsAttribute($value)
    {
        return unserialize($value);
    }

    /**
     * Scope a query to only include available for sale .
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query)
    {
        return $query->where('active', 1)
        ->where('stock_quantity', '>', 0)
        ->where('available_from', '<=', Carbon::now());
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
     * Scope a query to only include low qtt items.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLowQtt($query)
    {
        $alert_quantity = config('shop_settings.alert_quantity') ?: 0;

        return $query->where('stock_quantity', '<=', $alert_quantity);
    }

    /**
     * Scope a query to only include out of stock items.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStockOut($query)
    {
        return $query->where('stock_quantity', '<=', 0);
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
