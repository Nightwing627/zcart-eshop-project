<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';


    /**
     * Get the module associated with the permission.
     */
    public function module()
    {
        return $this->belongsTo('App\Module');
    }

    /**
     * Get the roles for the permission.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

}
