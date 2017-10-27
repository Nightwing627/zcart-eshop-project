<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'modules';

    /**
     * Get the permissions for the shop.
     */
    public function permissions()
    {
        return $this->hasMany('App\Permission');
    }

    /**
     * Scope a query to only include active modules.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    // /**
    //  * Get all of the users for the module.
    //  */
    // public function users()
    // {
    //     return $this->hasManyThrough('App\User', 'App\Role');
    // }


}
