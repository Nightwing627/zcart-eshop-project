<?php

namespace App\Http\Controllers\Storefront;

use Carbon\Carbon;
use App\Category;
use App\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $category = $request->input('in');
        $term = $request->input('search');

        $products = Inventory::search($term)->where('active', 1)->get();

        if($category != 'all_categories'){
            $category = Category::where('slug', $category)->active()->firstOrFail();
            $listings = $category->listings()->available()->get();
            $products = $products->intersect($listings);
        }

        $products = $products->where('stock_quantity', '>', 0)->where('available_from', '<=', Carbon::now())->paginate(16);

        $products->load(['feedbacks:rating,feedbackable_id,feedbackable_type', 'images:path,imageable_id,imageable_type']);

        return view('search_results', compact('products', 'category'));
    }

    /**
      * Generates pagination of collection in an array or collection.
      *
      * @param array|Collection      $collection
      * @param int   $perPage
      * @param int  $page
      * @param array $options
      *
      * @return LengthAwarePaginator
      */
    // public function paginate($collection, $perPage = 15, $page = null, $options = [])
    // {
    //     $collection = $collection instanceof Collection ? $collection : Collection::make($collection);
    //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    //     return new LengthAwarePaginator($collection->forPage($page, $perPage), $collection->count(), $perPage, $page, $options);
    // }
}
