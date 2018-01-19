<?php

namespace App\Http\Controllers;

use Response;
use App\Customer;
use App\Message;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function findCustomer(Request $request)
    {
        $term = $request->input('q');

        $results = [];
        if(strlen($term) < 3)
			return Response::json($results);

        $customers = Customer::select('id','nice_name','name','email')
        		->where('email', 'LIKE', '%'.$term.'%')
				->orWhere('nice_name', 'LIKE', '%'.$term.'%')
				->orWhere('name', 'LIKE', '%'.$term.'%')
                ->take(5)->get();

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
