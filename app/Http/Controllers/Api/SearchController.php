<?php

namespace App\Http\Controllers\Api;

use App\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SearchResource;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listings = Inventory::search($term)->where('active', 1)->get();
        return ListingResource::collection($listings);
    }

}
