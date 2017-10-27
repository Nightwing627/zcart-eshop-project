<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopRule extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shop_rules';

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

}
