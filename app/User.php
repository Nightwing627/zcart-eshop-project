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
        return $this->hasManyThrough(Country::class, Address::class, 'addressable_id', 'country_name');
    }

    /**
     * Get the Roles associated with the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the shop associated with the user.
    */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Get the shops the user own.
    */
    public function owns()
    {
        return $this->hasOne(Shop::class, 'owner_id');
    }

    /**
     * Get the Warehouses associated with the user.
     */
    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class)->withTimestamps();
    }

    /**
     * Get the user incharges of the warehouses.
     */
    public function incharges()
    {
        return $this->hasMany(Warehouse::class, 'incharge');
    }

    public function assignedTickets()
    {
        return $this->hasMany(Ticket::class, 'assigned_to');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function openTickets()
    {
        return $this->tickets()->where('status', '<', Ticket::STATUS_SOLVED);
    }

    public function solvedTickets()
    {
        return $this->tickets()->where('status', '=', Ticket::STATUS_SOLVED);
    }

    public function closedTickets()
    {
        return $this->tickets()->where('status', '=', Ticket::STATUS_CLOSED);
    }

    /**
     * User has many blog post
     */
    public function blogs()
    {
        return $this->hasMany(Blog::class);
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
     * Get name the user.
     *
     * @return mix
     */
    public function getName()
    {
        return $this->nice_name ?: $this->name;
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
        return $this->role_id === Role::SUPER_ADMIN;
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
     * Check if the user is from a Merchant or not
     *
     * @return bool
     */
    public function isFromMerchant()
    {
        return $this->isMerchant() || $this->merchantId();
    }

    /**
     * Check if the user is a Merchant
     *
     * @return bool
     */
    public function isMerchant()
    {
        return $this->role_id === Role::MERCHANT;
    }

    /**
     * Check if access level the user
     *
     * @return bool
     */
    public function accessLevel()
    {
        return $this->role->level ? $this->role->level + 1 : Null;
    }

    /**
     * Check if the user is the super admin
     *
     * @return bool
     */
    public function scopeNotSuperAdmin($query)
    {
        return $query->where('role_id', '!=', Role::SUPER_ADMIN);
    }

    /**
     * Scope a query to only include records from the users shop.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFromPlatform($query)
    {
        return $query->where('role_id', '!=', Role::MERCHANT)->where('shop_id', Null);
    }

    /**
     * Scope a query to only include records from the users shop.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMerchant($query)
    {
        return $query->where('role_id', Role::MERCHANT);
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
            if (Auth::user()->role->level)
                return $q->where('level', '>', Auth::user()->role->level)->orWhere('level', Null);

            return $q->whereNull('level');
        });
    }

    /**
     * Scope a query to also include merchant records.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithMerchant($query)
    {
        return $query->where('role_id', Role::MERCHANT)->orWhere('shop_id', Auth::user()->merchantId());
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
