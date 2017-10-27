<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'active'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the subGroups for the category.
     */
    public function subGroups()
    {
        return $this->belongsToMany('App\CategorySubGroup');
    }

    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    /**
     * Scope a query to only include active categories.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    /**
     * Get subGroups list for the category.
     *
     * @return array
     */
    public function getCatSubGrpsAttribute()
    {
        if (count($this->subGroups)) return $this->subGroups->pluck('id')->toArray();
    }

}
