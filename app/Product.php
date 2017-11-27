<?php

namespace App;

use Auth;
use App\Common\Taggable;
use App\Scopes\MineScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, Taggable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that should be casted to boolean types.
     *
     * @var array
     */
    protected $casts = [
        'has_variant' => 'boolean',
        'requires_shipping' => 'boolean',
        'downloadable' => 'boolean',
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
                        'manufacturer_id',
                        'brand',
                        'name',
                        'model_number',
                        'mpn',
                        'gtin',
                        'gtin_type',
                        'description',
                        'min_price',
                        'max_price',
                        'origin_country',
                        'has_variant',
                        'requires_shipping',
                        'downloadable',
                        'slug',
                        'meta_title',
                        'meta_description',
                        'sale_count',
                        'active'
                    ];

    /**
     * Get the origin associated with the product.
     */
    public function origin()
    {
        return $this->belongsTo('App\Country', 'origin_country');
    }

    /**
     * Get the manufacturer associated with the product.
     */
    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }

    /**
     * Get the shop associated with the product.
     */
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    /**
     * Get the categories for the product.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    /**
     * Get the inventories for the product.
     */
    public function inventories()
    {
        return $this->hasMany('App\Inventory');
    }

    /**
     * Set the requires_shipping for the Product.
     */
    public function setHasVariantAttribute($value)
    {
        $this->attributes['has_variant'] = (bool) $value;
    }

    /**
     * Set the requires_shipping for the Product.
     */
    public function setRequiresShippingAttribute($value)
    {
        $this->attributes['requires_shipping'] = (bool) $value;
    }

    /**
     * Set the downloadable for the Product.
     */
    public function setDownloadableAttribute($value)
    {
        $this->attributes['downloadable'] = (bool) $value;
    }

    /**
     * Get the category list for the product.
     *
     * @return array
     */
    public function getCategoryListAttribute()
    {
        if (count($this->categories)) return $this->categories->pluck('id')->toArray();
    }

    /**
     * Get the formate decimal.
     *
     * @return array
     */
    public function getMinPriceAttribute($attribute)
    {
         return get_formated_decimal($attribute);
    }
    public function getMaxPriceAttribute($attribute)
    {
         return get_formated_decimal($attribute);
    }

    /**
     * Scope a query to only include active products.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $match)
    {
        return $query->where('gtin', $match)
                    ->orWhere('model_number', 'LIKE', '%'. $match .'%')
                    ->orWhere('name', 'LIKE', '%'. $match .'%');
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
     * Scope a query to only include active products.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

}
