<?php

namespace App\Http\Controllers\Storefront;

use DB;
use Carbon\Carbon;
use App\Page;
use App\Shop;
use App\Banner;
use App\Slider;
use App\Product;
use App\Category;
use App\Inventory;
use App\Manufacturer;
use App\CategoryGroup;
use App\Helpers\ListHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $banners = Banner::with('featuredImage:path', 'images:path')->orderBy('order', 'asc')->get()->groupBy('group_id')->toArray();
        $sliders = Slider::with('featuredImage:path', 'images:path')->orderBy('order', 'asc')->get()->toArray();

        $trending = ListHelper::popular_items(config('system.popular.period.trending', 2), config('system.popular.take.trending', 15));
        $weekly_popular = ListHelper::popular_items(config('system.popular.period.weekly', 7), config('system.popular.take.weekly', 5));

        $recent = ListHelper::latest_available_items(10);
        $additional_items = ListHelper::random_items(10);

        return view('index', compact('banners', 'sliders', 'trending', 'weekly_popular', 'recent', 'additional_items'));
    }

    /**
     * Browse category based products
     *
     * @param  slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function browseCategory(Request $request, $slug, $sortby = Null)
    {
        $category = Category::where('slug', $slug)->active()->firstOrFail();

        // Take only available items
        $all_products = $category->listings()->available();

        // Parameter for filter options
        $brands = $all_products->pluck('brand')->unique();
        $priceRange['min'] = floor($all_products->min('sale_price'));
        $priceRange['max'] = ceil($all_products->max('sale_price'));

        // Filter results
        $products = $all_products->filter($request->all())
            ->withCount(['feedbacks', 'orders' => function($query){
                $query->where('order_items.created_at', '>=', Carbon::now()->subHours(config('system.popular.hot_item.period', 24)));
            }])
            ->with(['feedbacks:rating,feedbackable_id,feedbackable_type', 'images:path,imageable_id,imageable_type'])
            ->paginate(config('system.view_listing_per_page', 16))->appends($request->except('page'));

            // echo "<pre>"; print_r($products->toArray()); echo "</pre>"; exit();

        return view('category', compact('category', 'products', 'brands', 'priceRange'));
    }

    /**
     * Open product page
     *
     * @param  slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function product($slug)
    {
        $item = Inventory::where('slug', $slug)
        ->with([
            'product' => function($q){
                $q->select('id', 'slug', 'description', 'manufacturer_id')->withCount('inventories');
            },
            'attributeValues' => function($q){
                $q->select('id', 'attribute_values.attribute_id', 'value', 'color', 'order')->with('attribute');
            },
            // 'attributeValues:id,attribute_id,value,color,order',
            'feedbacks.customer:id,nice_name,name',
        ])
        // ->with(['image:path,imageable_id,imageable_type', 'feedbacks.customer:id,name,nice_name'])
        ->withCount('feedbacks')->firstOrFail();
        // echo "<pre>"; print_r($item->toArray()); echo "</pre>"; exit();

        $this->update_recently_viewed_items($item); //update_recently_viewed_items

        $variants = ListHelper::variants_of_product($item, $item->shop_id);

        $attr_pivots = \DB::table('attribute_inventory')->select('attribute_id','inventory_id','attribute_value_id')
        ->whereIn('inventory_id', $variants->pluck('id'))->get();

        $item_attrs = $attr_pivots->where('inventory_id', $item->id)->pluck('attribute_value_id')->toArray();

        $attributes = \App\Attribute::select('id','name','attribute_type_id','order')
        ->whereIn('id', $attr_pivots->pluck('attribute_id'))
         ->with(['attributeValues' => function($query) use ($attr_pivots) {
             $query->whereIn('id', $attr_pivots->pluck('attribute_value_id'))->orderBy('order');
         }])->orderBy('order')->get();

        // TEST
        $related = ListHelper::related_products($item);
        $linked_items = ListHelper::linked_items($item);

        return view('product', compact('item', 'variants', 'attributes', 'item_attrs', 'related', 'linked_items'));
    }

    /**
     * Open product page
     *
     * @param  slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function quickViewItem($slug)
    {
        $item = Inventory::where('slug', $slug)
        ->with([
            'images:path,imageable_id,imageable_type',
            'product' => function($q){
                $q->select('id', 'slug', 'description')->withCount('inventories');
            },
            'attributeValues' => function($q){
                $q->select('id', 'attribute_values.attribute_id', 'value', 'color', 'order')->with('attribute');
            },
        ])
        ->withCount('feedbacks')->firstOrFail();

        $this->update_recently_viewed_items($item); //update_recently_viewed_items

        return view('modals.quickview', compact('item'))->render();
    }

    /**
     * Open shop page
     *
     * @param  slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function offers($slug)
    {
        $product = Product::where('slug', $slug)
        ->with([
            'inventories.attributeValues.attribute',
            'inventories.feedbacks:rating,feedbackable_id,feedbackable_type',
            'inventories.shop.feedbacks:rating,feedbackable_id,feedbackable_type'
        ])->firstOrFail();

        return view('offers', compact('product'));
    }

    /**
     * Open shop page
     *
     * @param  slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function shop($slug)
    {
        $shop = Shop::select('id','name','slug','description')->where('slug', $slug)->firstOrFail();

        $products = Inventory::where('shop_id', $shop->id)->filter(request()->all())
        ->with(['feedbacks:rating,feedbackable_id,feedbackable_type', 'images:path,imageable_id,imageable_type'])
        ->withCount(['orders' => function($q){
            $q->where('order_items.created_at', '>=', Carbon::now()->subHours(config('system.popular.hot_item.period', 24)));
        }])
        ->paginate(20);

        return view('shop', compact('shop', 'products'));
    }

    /**
     * Open brand page
     *
     * @param  slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function brand($slug)
    {
        $brand = Manufacturer::where('slug', $slug)->firstOrFail();

        $ids = Product::where('manufacturer_id', $brand->id)->pluck('id');

        $products = Inventory::whereIn('product_id', $ids)->filter(request()->all())
        ->with(['feedbacks:rating,feedbackable_id,feedbackable_type', 'images:path,imageable_id,imageable_type'])
        ->withCount(['orders' => function($q){
            $q->where('order_items.created_at', '>=', Carbon::now()->subHours(config('system.popular.hot_item.period', 24)));
        }])
        ->paginate(20);

        return view('brand', compact('brand', 'products'));
    }

    /**
     * Display the category list page.
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        return view('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function openPage(Page $page)
    {
    	return $page;
    }

    /**
     * Push product ID to session for the recently viewed items section
     *
     * @param  [type] $item [description]
     */
    private function update_recently_viewed_items($item)
    {
        $items = session()->get('products.recently_viewed_items', []);

        if( ! in_array($item->getKey(), $items) ){
            session()->push('products.recently_viewed_items', $item->getKey());
        }
        return;
    }
}
