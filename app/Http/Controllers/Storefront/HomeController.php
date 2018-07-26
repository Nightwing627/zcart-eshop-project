<?php

namespace App\Http\Controllers\Storefront;

use App\Page;
use App\Shop;
use App\Banner;
use App\Slider;
use App\Product;
use App\Category;
use App\Inventory;
use App\Manufacturer;
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

        $recent = ListHelper::latest_available_products(10);
        $additional_items = ListHelper::random_products(10);

        // echo "<pre>"; print_r($trending->toArray()); echo "</pre>"; exit();
        return view('index', compact('banners', 'sliders', 'trending', 'weekly_popular', 'recent', 'additional_items'));
    }

    /**
     * Browse category based products
     *
     * @param  slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function browseCategory($slug)
    {
        $category = Category::where('slug', $slug)->active()->firstOrFail();

        // Take only available items
        // $products = $category->products()->active()->whereHas('inventories', function ($query) {
        //     $query->available();
        // })->withCount('feedbacks')->with(['inventories:product_id,sale_price', 'featuredImage', 'images'])->paginate(20);
        // echo "<pre>"; print_r($products->toArray()); echo "</pre>"; exit();

        $products = $category->items(['id','shop_id','slug','product_id','title','stock_quantity','condition','sale_price','offer_price','offer_start','offer_end']);
        // $products = $category->items(['id','shop_id','slug','product_id','title','stock_quantity','condition','sale_price','offer_price','offer_start','offer_end']);
        // ->sortBy('sale_price')->groupBy('product_id');

        echo "<pre>"; print_r($products->toArray()); echo "</pre>"; exit();

        return view('category', compact('category', 'products'));
    }

    /**
     * Open product page
     *
     * @param  slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function product($slug)
    {
        $product = Inventory::where('slug', $slug)->with('feedbacks.customer:id,name,nice_name')
                                                ->withCount('feedbacks')->firstOrFail();

        // Push product ID to session for the recently viewed items section
        session()->push('products.recently_viewed_items', $product->getKey());

        // TEST
        $related = ListHelper::related_products($product);

        return view('product', compact('product', 'related'));
    }

    /**
     * Open shop page
     *
     * @param  slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function shop($slug)
    {
        $shop = Shop::where('slug', $slug)->firstOrFail();

        $inventories = $shop->inventories->with('featuredImage', 'images')->paginate(20);

        return view('shop', compact('shop', 'inventories'));
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

        $products = $brand->products()->with('featuredImage', 'images')->paginate(20);

        return view('brand', compact('brand', 'products'));
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
}
