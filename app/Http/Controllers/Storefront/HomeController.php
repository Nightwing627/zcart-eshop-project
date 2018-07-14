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
        $banners = Banner::with('featuredImage', 'images')->orderBy('order', 'asc')->get()->groupBy('group_id')->toArray();
        $sliders = Slider::with('featuredImage', 'images')->orderBy('order', 'asc')->get()->toArray();

        $trending = Product::active()->whereHas('inventories', function ($query) {
            $query->available();
        })->inRandomOrder()->limit(20)->with(['inventories:product_id,sale_price', 'featuredImage', 'images'])->get();

        $recent = Product::active()->whereHas('inventories', function ($query) {
            $query->available();
        })->latest()->limit(10)->with(['inventories:product_id,sale_price', 'featuredImage', 'images'])->get();

        // $trending = Inventory::available()->inRandomOrder()->limit(20)->with('product')->get();
        // echo "<pre>"; print_r($trending->toArray()); echo "</pre>"; exit();
        return view('index', compact('banners', 'sliders', 'trending', 'recent'));
    }

    /**
     * Browse category based products
     *
     * @param  slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function browseCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        // Take only available items
        $products = $category->products()->active()->whereHas('inventories', function ($query) {
            $query->available();
        })->with(['inventories:product_id,sale_price', 'featuredImage', 'images'])->paginate(20);

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
        $product = Product::where('slug', $slug)->firstOrFail();

        // TEST
        $related = Product::active()->whereHas('inventories', function ($query) {
            $query->available();
        })->inRandomOrder()->limit(20)->with(['inventories:product_id,sale_price', 'featuredImage', 'images'])->paginate(20);

// echo "<pre>"; print_r($product->inventories); echo "</pre>"; exit();
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
