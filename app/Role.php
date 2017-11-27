<?php

namespace App;

use Auth;
use App\Scopes\RoleScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

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
    protected $fillable = ['name', 'shop_id', 'description', 'public', 'level'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        if(Auth::check() && ! Auth::user()->isSuperAdmin() ){
            static::addGlobalScope(new RoleScope);
        }
    }

    /**
     * Get the users for the role.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Get the Permissions for the role.
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Permission')->withTimestamps();
    }

    /**
     * Check if the role is the super user
     *
     * @return bool
     */
    public function isSuperAdmin()
    {
         return $this->id === 1;
    }

    /**
     * Check if the role is the super user
     *
     * @return bool
     */
    public function isLowerPrivileged($role = Null)
    {
        if (!Auth::user()->role->level)
            return $this->level == Null;

        if ($role)
             return $role->level == Null || $role->level > Auth::user()->role->level;

         return $this->level == Null || $this->level > Auth::user()->role->level;
    }

    /**
     * Scope a query to only include records from the users shop.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLowerPrivileged($query)
    {
        return $query->where('level', Null)->orWhere('level', '>', Auth::user()->role->level);
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
