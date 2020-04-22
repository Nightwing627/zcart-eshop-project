<?php

namespace App\Http\Controllers;

use View;
use Response;
use App\Product;
use App\Message;
use App\Customer;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function findProduct(Request $request)
    {
        $term = $request->input('q');

        $results = [];
        if(strlen($term) < 3)
            return Response::json($results);

        $query = Product::search($term)->where('active', 1);

        if(! $request->user()->shop->canUseSystemCatalog())
            $query->where('shop_id', $request->user()->merchantId());

        $products = $query->take(10)->get();

        $results = '';

        foreach ($products as $product){
            $view = View::make('admin.inventory._product_list', ['product' => $product])->render();
            $results .= $view;
        }

        $not_fond = '<p class="lead"><span class="indent50">' . trans('responses.no_product_found_for_inventory') . '</span></p>';

        return (bool) $results ? $results : $not_fond;
    }

    public function findCustomer(Request $request)
    {
        $term = $request->input('q');

        $results = [];
        if(strlen($term) < 3)
			return Response::json($results);

        $customers = Customer::search($term)->where('active', 1)->take(5)->get();

        foreach ($customers as $customer)
		    $results[] = ['text' => get_formated_cutomer_str($customer) , 'id' => $customer->id];

		return Response::json($results);
    }

    public function findMessage(Request $request)
    {
        $search_q = $request->input('q');

        $messages = Message::where('subject', 'LIKE', '%'.$search_q.'%')
                ->orWhere('message', 'LIKE', '%'.$search_q.'%')
                ->orWhereHas('customer', function ($query) use($search_q) {
                        $query->where('email', 'LIKE', '%'.$search_q.'%')
                            ->orWhere('nice_name', 'LIKE', '%'.$search_q.'%')
                            ->orWhere('name', 'LIKE', '%'.$search_q.'%');
                    })
                ->with('customer')->withCount('replies')
                ->paginate(config('system_settings.pagination'));

        return view('admin.message.index', compact('messages', 'search_q'));
    }
}
