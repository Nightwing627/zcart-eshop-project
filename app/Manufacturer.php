<?php

namespace App;

use App\Common\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
    use SoftDeletes, Taggable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'manufacturers';

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
    protected $fillable = ['shop_id', 'name', 'email', 'url', 'phone', 'bio', 'country_id', 'active'];

    /**
     * Get the country for the manufacturer.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * Get the products for the manufacturer.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
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
