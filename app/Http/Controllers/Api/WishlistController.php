<?php

namespace App\Http\Controllers\Api;

use App\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WishlistResource;
use App\Http\Requests\Validations\DirectCheckoutRequest;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $wishlists = Wishlist::mine()->whereHas('inventory', function($q) {
            $q->available();
        })->with(['inventory', 'inventory.feedbacks:rating,feedbackable_id,feedbackable_type,updated_at,customer_id,comment', 'inventory.images:path,imageable_id,imageable_type'])->paginate(10);

        return WishlistResource::collection($wishlists);
    }
}
