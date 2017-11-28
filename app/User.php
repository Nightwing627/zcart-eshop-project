<?php

namespace App;

use App\Common\Addressable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, Addressable;

   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
                    'shop_id',
                    'role_id',
                    'name',
                    'nice_name',
                    'email',
                    'password',
                    'dob',
                    'description',
                    'sex',
                    'active',
                ];

    /**
     * Get all of the country for the country.
     */
    public function country()
    {
        return $this->hasManyThrough('App\Country', 'App\Address', 'addressable_id', 'country_name');
    }

    /**
     * Get the Roles associated with the user.
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * Get the shop associated with the user.
    */
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    /**
     * Get the shops the user own.
    */
    public function owns()
    {
        return $this->hasOne('App\Shop', 'owner_id');
    }

    /**
     * Get the Warehouses associated with the user.
     */
    public function warehouses()
    {
        return $this->belongsToMany('App\Warehouse')->withTimestamps();
    }

    /**
     * Get the user incharges of the warehouses.
     */
    public function incharges()
    {
        return $this->hasMany('App\Warehouse', 'incharge');
    }

    /**
     * User has many blog post
     */
    public function blogs()
    {
        return $this->hasMany('App\Blog');
    }

    /**
     * Get role list for the user.
     *
     * @return array
     */
    public function getRoleListAttribute()
    {
        if (count($this->roles)) return $this->roles->pluck('id')->toArray();
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

    /**
     * Get merchant id for the user.
     *
     * @return mix
     */
    public function merchantId()
    {
        return $this->shop_id;
    }

    /**
     * Check if the user is the super admin
     *
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->role_id === 1;
    }

    /**
     * Check if the user is from main platform or not
     *
     * @return bool
     */
    public function isFromPlatform()
    {
        return ! $this->isMerchant() && ! $this->merchantId();
    }

    /**
     * Check if the user is a Merchant
     *
     * @return bool
     */
    public function isMerchant()
    {
        return $this->role_id === 3;
    }

    /**
     * Check if the user is the super admin
     *
     * @return bool
     */
    public function scopeNotSuperAdmin($query)
    {
        return $query->where('role_id', '!=', 1);
    }

    /**
     * Scope a query to only include records from the users shop.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMerchant($query)
    {
        return $query->where('role_id', 3);
    }

    /**
     * Scope a query to only include records with lower privilege than the logged in user.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLevel($query)
    {
        return $query->whereHas('role', function($q)
        {
            return $q->where('level', '>', Auth::user()->role->level)->orWhere('level', Null);
        });
    }

    /**
     * Scope a query to only include records from the users shop.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithMerchant($query)
    {
        return $query->where('role_id', 3)->orWhere('shop_id', Auth::user()->merchantId());
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
