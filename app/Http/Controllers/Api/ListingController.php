<?php

namespace App\Http\Controllers\Api;

use App\Inventory;
use App\Helpers\ListHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Http\Resources\ListingResource;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($list = 'latest')
    {
    	switch ($list) {
    		case 'trending':
        		$listings = ListHelper::popular_items(config('system.popular.period.trending', 2), config('system.popular.take.trending', 15));
    			break;

    		case 'popular':
		        $listings = ListHelper::popular_items(config('system.popular.period.weekly', 7), config('system.popular.take.weekly', 5));
    			break;

    		case 'random':
		        $listings = ListHelper::random_items(10);
    			break;

    		case 'latest':
    		default:
		        $listings = ListHelper::latest_available_items(10);
    			break;
    	}

        return ListingResource::collection($listings);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function item($slug)
    {
        $item = Inventory::where('slug', $slug)->available()->withCount('feedbacks')->firstOrFail();

        $item->load(['product' => function($q){
                $q->select('id', 'slug', 'manufacturer_id')
                ->withCount(['inventories' => function($query){
                    $query->available();
                }]);
            }, 'attributeValues' => function($q){
                $q->select('id', 'attribute_values.attribute_id', 'value', 'color', 'order')
                ->with('attribute:id,name,attribute_type_id,order');
            },
            'feedbacks.customer:id,nice_name,name',
            'images:path,imageable_id,imageable_type',
        ]);

        // $variants = ListHelper::variants_of_product($item, $item->shop_id);

        // $attr_pivots = \DB::table('attribute_inventory')->select('attribute_id','inventory_id','attribute_value_id')
        // ->whereIn('inventory_id', $variants->pluck('id'))->get();

        // $item_attrs = $attr_pivots->where('inventory_id', $item->id)->pluck('attribute_value_id')->toArray();

        // $attributes = \App\Attribute::select('id','name','attribute_type_id','order')
        // ->whereIn('id', $attr_pivots->pluck('attribute_id'))
        // ->with(['attributeValues' => function($query) use ($attr_pivots) {
        //     $query->whereIn('id', $attr_pivots->pluck('attribute_value_id'))->orderBy('order');
        // }])->orderBy('order')->get();

        // $variants = $variants->toJson(JSON_HEX_QUOT);

        // // TEST
        // $related = ListHelper::related_products($item);
        // $linked_items = ListHelper::linked_items($item);

        // $geoip = geoip(request()->ip()); // Set the location of the user

        return new ItemResource($item);
    }
}
