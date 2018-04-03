<?php

namespace App;

use App\Common\Imageable;
use App\Common\Addressable;
use Laravel\Cashier\Billable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\HasActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchant extends Authenticatable
{
    use Billable, SoftDeletes, Notifiable, Addressable, Imageable, HasActivity;

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
    protected static $logName = 'merchant';

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
        return $this->belongsToMany(Warehouse::class, 'user_warehouse', 'user_id', 'warehouse_id')->withTimestamps();
    }

    /**
     * Get the user incharges of the warehouses.
     */
    public function incharges()
    {
        return $this->hasMany(Warehouse::class, 'incharge');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'user_id');
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
        return $this->hasMany(Blog::class, 'user_id');
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
}