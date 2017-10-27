<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

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
        return $this->belongsTo('App\Shop');
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
