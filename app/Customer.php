<?php

namespace App;

use Hash;
use App\Common\Taggable;
use App\Common\Imageable;
use App\Common\Addressable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\HasActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomerResetPasswordNotification;

class Customer extends Authenticatable
{

    use SoftDeletes, Notifiable, Addressable, Taggable, Imageable, HasActivity;

   /**
     * The guard used by the model.
     *
     * @var string
     */
    protected $guard = 'customer';

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
     * The attributes that will be logged on activity logger.
     *
     * @var boolean
     */
    protected static $logFillable = true;

    /**
     * The only attributes that has been changed.
     *
     * @var boolean
     */
    protected static $logOnlyDirty = true;

    /**
     * The name that will be used when log this model. (optional)
     *
     * @var boolean
     */
    protected static $logName = 'customer';

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->email;
    }

    /**
     * Route notifications for the Nexmo channel.
     *
     * @return string
     */
    public function routeNotificationForNexmo()
    {
        return $this->primaryAddress->phone;
    }

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
        return $this->hasManyThrough(Country::class, Address::class, 'addressable_id', 'country_name');
    }

    /**
     * Get the user orders.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the user latest_orders.
     */
    public function latest_orders()
    {
        return $this->orders()->orderBy('created_at', 'desc')->limit(5);
    }

    /**
     * Get the user cart.
     */
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    /**
     * Get the coupons for the customer.
     */
    public function coupons()
    {
        return $this->belongsToMany(Coupon::class)->withTimestamps();
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
        return $this->hasMany(GiftCard::class);
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
        if(Hash::needsRehash($password))
            $this->attributes['password'] = bcrypt($password);
        else
            $this->attributes['password'] = $password;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPasswordNotification($token));
    }
}