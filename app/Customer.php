<?php

namespace App;

use App\Common\Taggable;
use App\Common\Addressable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{

    use SoftDeletes, Notifiable, Addressable, Taggable;

   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

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
                'nice_name',
                'email',
                'password',
                'dob',
                'bio',
                'sex',
                'description',
                'active'
            ];

    /**
     * Get all of the country for the country.
     */
    public function country()
    {
        return $this->hasManyThrough('App\Country', 'App\Address', 'addressable_id', 'country_name');
    }

    /**
     * Get the user orders.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    /**
     * Get the user cart.
     */
    public function cart()
    {
        return $this->hasOne('App\Cart');
    }

    /**
     * Get the coupons for the customer.
     */
    public function coupons()
    {
        return $this->belongsToMany('App\Coupon')->withTimestamps();
    }

    public function disputes()
    {
        return $this->hasMany(Dispute::class);
    }

    /**
     * Get the user gift_cards.
     */
    public function gift_cards()
    {
        return $this->hasMany('App\GiftCard');
    }

    /**
     * Get name the user.
     *
     * @return mix
     */
    public function getName()
    {
        return $this->nice_name ?: $this->name;
    }

    /**
     * Set password for the user.
     *
     * @return array
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

}
