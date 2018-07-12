<?php

namespace App\Http\Controllers\Storefront;

use App\Page;
use App\Banner;
use App\Slider;
use App\Product;
use App\Category;
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

        return view('index', compact('banners', 'sliders'));
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

        $products = $category->products()->with('featuredImage', 'images')->paginate(20);
        // $products = $category->products()->active()->has('inventories')->with('featuredImage', 'images')->paginate(20);

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
        $product = Product::where('slug', $slug)->with('manufacturer')->firstOrFail();
// echo "<pre>"; print_r($product->categories->first()->name); echo "</pre>"; exit();
        return view('product', compact('product'));
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
