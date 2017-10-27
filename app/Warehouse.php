<?php

namespace App;

use App\Common\Addressable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use SoftDeletes, Addressable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'warehouses';

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
                    'incharge',
                    'description',
                    'active',
                ];

    /**
     * Get the country for the warehouse.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * Get the manager of the warehouse.
     */
    public function manager()
    {
        return $this->belongsTo('App\User', 'incharge');
    }

    /**
     * Get the Users associated with the warehouse.
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    /**
     * Get staff list for the user.
     *
     * @return array
     */
    public function getUserListAttribute()
    {
        return $this->users->pluck('id')->toArray();
    }

    /**
     * Get the Shop associated with the blog post.
     */
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    /**
     * Get the Inventories for the warehouse.
     */
    public function inventories()
    {
        return $this->hasMany('App\Inventory');
    }

    /**
     * Get all of the products for the warehouse.
     */
    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\Inventory');
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
        return $query->where('shop_id', Auth::user()->shop_id);
    }
}
