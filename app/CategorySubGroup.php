<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategorySubGroup extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'category_group_id', 'slug', 'description', 'active'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the categoryGroup that owns the SubGroup.
     */
    public function group()
    {
        return $this->belongsTo(CategoryGroup::class, 'category_group_id');
    }

    /**
     * Get the categories for the CategorySubGroup.
     */
    public function categories()
    {
        return $this->hasMany(Category::class, 'category_sub_group_id')->orderBy('name', 'asc');
        // return $this->belongsToMany(Category::class)->orderBy('name', 'asc')->withTimestamps();
    }

    public function listings()
    {
        return $this->hasManyDeep(
            Inventory::class,
            [Category::class, 'category_product', Product::class]
        );

        return $this->hasManyDeep('App\Inventory', ['App\Category', 'App\Product'])->withIntermediate('App\Category')->withIntermediate('App\Product');



        $items = Inventory::select('inventories.*','products.slug as product_slug','categories.slug as category_slug')
        ->where([
            ['inventories.active', '=', 1],
            ['categories.active', '=', 1],
            ['products.active', '=', 1]
        ])
        ->join('products', 'inventories.product_id', 'products.id')
        ->join('category_product', 'inventories.product_id', 'category_product.product_id')
        ->join('categories', 'category_product.category_id', 'categories.id')
        ->get();

        return $this->hasManyThrough(
            'App\Inventory',          // The model to access to
            'App\Pivots\SubGrpListings', // The intermediate table that connects the User with the Podcast.
            'category_id',                 // The column of the intermediate table that connects to this model by its ID.
            'product_id',              // The column of the intermediate table that connects the Podcast by its ID.
            'id',                      // The column that connects this model with the intermediate model table.
            'product_id'               // The column of the Audio Files table that ties it to the Podcast.
        );

        // return $this->hasMany(Inventory::class)->using('App\Pivots\SubGrpListings');
    }

    // /**
    //  * Get all listings for the category.
    //  */
    // public function getListingsAttribute()
    // {
    //     return \DB::table('inventories')
    //     ->join('category_product', 'inventories.product_id', '=', 'category_product.product_id')
    //     ->select('inventories.*', 'category_product.category_id')
    //     ->where('category_product.category_id', '=', $this->id)->get();

    //     // return $this->belongsToMany(Inventory::class, 'category_product', null, 'product_id', null, 'product_id');
    // }

    /**
     * Scope a query to only include active categorySubGroups.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
