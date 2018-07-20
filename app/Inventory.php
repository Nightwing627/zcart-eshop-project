<?php

namespace App;

use Carbon\Carbon;
use App\Common\Taggable;
use App\Common\Imageable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes, Taggable, Imageable;

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
                        'user_id',
                        'purchase_price',
                        'sale_price',
                        'offer_price',
                        'offer_start',
                        'offer_end',
                        'shipping_weight',
                        'available_from',
                        'min_order_quantity',
                        // 'alert_quantity',
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

    /**
     * Get the feedbacks for the product.
     */
    public function feedbacks()
    {
        return $this->belongsToMany(Feedback::class, 'order_items')
                    ->withPivot('item_description', 'quantity', 'unit_price', 'order_id')
                    ->withTimestamps();
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

    // /**
    //  * Set the alert_quantity for the inventory.
    //  */
    // public function setAlertQuantityAttribute($value)
    // {
    //     if ($value > 1) $this->attributes['alert_quantity'] = $value;
    //     else $this->attributes['alert_quantity'] = null;
    // }

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
        if($value) $this->attributes['available_from'] = Carbon::createFromFormat('Y-m-d h:i a', $value);
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

    public function isLowQtt()
    {
        $alert_quantity = config('shop_settings.alert_quantity') ?: 0;

        return $this->stock_quantity <= $alert_quantity;
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
