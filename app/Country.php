<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * Get all of the states for the country.
     */
    public function states()
    {
        return $this->hasMany('App\State');
    }

    /**
     * Get all of the manufacturer for the country.
     */
    public function manufacturer()
    {
        return $this->hasMany('App\Manufacturer');
    }

    /**
     * Get the products for the country.
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'origin_country');
    }

    /**
     * Get all of the users for the country.
     */
    public function users()
    {
        return $this->hasManyThrough('App\User', 'App\Address');
        // return $this->hasManyThrough('App\User', 'App\Address', 'addressable_id', 'country_name');
    }

    /**
     * Get all of the customers for the country.
     */
    public function customers()
    {
        return $this->hasManyThrough('App\Customer', 'App\Address');
        // return $this->hasManyThrough('App\Customer', 'App\Address', 'addressable_id', 'country_name');
    }

    /**
     * Get the addresses the country.
    */
    public function addresses()
    {
        // return $this->belongsTo('App\Address', 'country_name' , 'name');
        return $this->hasMany('App\Address');
    }

    /**
     * Scope a query to only include active countries.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

}
