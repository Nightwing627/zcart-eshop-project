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

        $products = $products->where('stock_quantity', '>', 0)->where('available_from', '<=', Carbon::now());

        if(request()->has('free_shipping')){
            $products = $products->where('free_shipping', 1);
        }
        if(request()->has('new_arraivals')){
            $products = $products->where('created_at', '>', Carbon::now()->subDays(config('system.filter.new_arraival', 7)));
        }
        if(request()->has('has_offers')){
            $products = $products->where('offer_price', '>', 0)
            ->where('offer_start', '<', Carbon::now())
            ->where('offer_end', '>', Carbon::now());
        }

        if(request()->has('sort_by')){
            switch (request()->get('sort_by')) {
                case 'newest':
                    $products = $products->sortByDesc('created_at');
                    break;

                case 'oldest':
                    $products = $products->sortBy('created_at');
                    break;

                case 'price_acs':
                    $products = $products->sortBy('sale_price');
                    break;

                case 'price_desc':
                    $products = $products->sortByDesc('sale_price');
                    break;

                case 'best_match':
                default:
                    break;
            }
        }

        $products = $products->paginate(3);

        $products->load(['feedbacks:rating,feedbackable_id,feedbackable_type', 'images:path,imageable_id,imageable_type']);

        return view('search_results', compact('products', 'category'));
    }

}
