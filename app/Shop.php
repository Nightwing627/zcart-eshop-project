<?php

namespace App;

use App\Common\Addressable;
use App\Events\ShopCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes, Addressable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shops';

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
                    'owner_id',
                    'name',
                    'legal_name',
                    'email',
                    'currency',
                    'currency_id',
                    'bio',
                    'active',
                ];

    /**
     * Get the user that owns the shop.
     */
    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    /**
     * Get the staffs for the shop.
     */
    public function staffs()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Get the setting for the shop.
     */
    public function setting()
    {
        return $this->hasOne('App\Setting');
    }

    /**
     * Get the rules for the shop.
     */
    public function rules()
    {
        return $this->hasOne('App\ShopRule');
    }

    /**
     * Get the warehouses for the product.
     */
    public function warehouses()
    {
        return $this->hasMany('App\Warehouse');
    }

    /**
     * Get the carriers for the shop.
     */
    public function carriers()
    {
        return $this->hasMany('App\Carrier');
    }

    /**
     * Get the products for the shop.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * Get the orders for the shop.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    /**
     * Get the carts for the shop.
     */
    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    /**
     * Get the coupons for the customer.
     */
    public function coupons()
    {
        return $this->belongsToMany('App\Coupon')->withTimestamps();
    }

    /**
     * Get the user gift_cards.
     */
    public function gift_cards()
    {
        return $this->hasMany('App\GiftCard');
    }

    /**
     * Get the payment_methods for the inventory.
     */
    public function payment_methods()
    {
        return $this->belongsToMany('App\PaymentMethod', 'shop_payment_methods')
                    ->withPivot('api_key', 'api_secret')
                    ->withTimestamps();
    }

    /**
     * Get the invoices for the shop.
     */
    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    /**
     * Get the taxes for the shop.
     */
    public function taxes()
    {
        return $this->hasMany('App\Tax');
    }

    /**
     * Get the suppliers for the product.
     */
    public function suppliers()
    {
        return $this->hasMany('App\Supplier');
    }

    /**
     * Scope a query to only include active shops.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

}
