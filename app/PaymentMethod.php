<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payment_methods';

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
                    'name',
                    'company_name',
                    'website',
                    'help_doc_url',
                    'description',
                    'active',
                    ];

    /**
     * Get the shops for the inventory.
     */
    public function shops()
    {
        return $this->belongsToMany('App\Shop', 'shop_payment_methods')
                    ->withPivot('api_key', 'api_secret')
                    ->withTimestamps();
    }

    /**
     * Get the orders associated with the order status.
     */
    public function orders()
    {
        return $this->hasManyThrough('App\Order', 'App\Invoice');
    }

    /**
     * Get the invoices for the order.
     */
    public function invoices()
    {
        return $this->hasMany('App\Invoice');
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
