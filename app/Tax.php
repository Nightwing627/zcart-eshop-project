<?php

namespace App;

use App\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tax extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'taxes';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'deleted_at'];

    /**
     * Get the Country associated with the blog post.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * Get the State associated with the blog post.
     */
    public function state()
    {
        return $this->belongsTo('App\State');
    }

    /**
     * Get the Shop associated with the blog post.
     */
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    /**
     * Get the inventories for the supplier.
     */
    public function inventories()
    {
        return $this->hasMany('App\Inventory');
    }

    /**
     * Get the carts for the supplier.
     */
    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    /**
     * Get the orders for the supplier.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    /**
     * Creat new state and set the id if the given value is not available
     */
    public function setStateIdAttribute($value)
    {
        if (!is_numeric($value) and $value != NULL)
        {
            $state = State::create(['name' => $value, 'country_id' => \Request::input('country_id')]);
            $value = $state->id;
        }

        $this->attributes['state_id'] = $value;
    }

    /**
     * Scope a query to only include active users.
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
